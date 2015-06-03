<?php

namespace OpenRailData\Services\NetworkRail;

use OpenRailData\Exceptions\ConnectionError;
use OpenRailData\Exceptions\ConnectionErrorException;
use OpenRailData\Exceptions\IncompatibleTopicException;
use OpenRailData\Topics\AbstractTopic;

/**
 * Class Stomp
 *
 * @package OpenRailData\Services\NetworkRail
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class Stomp
{

    const SCHEME = "tcp";
    const HOST = "datafeeds.networkrail.co.uk";
    const PORT = 61618;

    /**
     * @var \Stomp
     */
    private $stomp;

    /**
     * @var string Network Rail username
     */
    private $username;

    /**
     * @var string Network Rail password
     */
    private $password;

    /**
     * @var []
     */
    private $eventFactories;

    /**
     * @var AbstractTopic[]
     */
    private $queuedTopics = [];

    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Open a connection to the ActiveMQ queue.
     *
     * If there are queued subscriptions then these will be subscribed
     * to once the connection is opened.
     *
     * @throws ConnectionErrorException
     * @throws IncompatibleTopicException
     */
    private function connect()
    {
        // Create DSN
        $uri = vsprintf("%s://%s:%d", [
            self::SCHEME,
            self::HOST,
            self::PORT,
        ]);

        // This will be populated with various exceptions that can happen when connecting.
        $connectionError = false;

        // Attempt to open a connection to Stomp server. Don't bail on exceptions.
        try {
            $this->stomp = new \Stomp($uri, $this->username, $this->password);
        } catch (\Exception $e) {
            $connectionError = $e->getMessage();
        }

        // If connection could not be opened, then bail with our ConnectionError exception.
        // The passed argument is the message of the Stomp/PHP exception thrown earlier, if it exists.
        if (!$this->stomp) {
            throw new ConnectionErrorException($connectionError);
        }

        // If there are queued topics, then add them now that we have an open connection.
        if (!empty($this->queuedTopics)) {
            foreach ($this->queuedTopics as $topic) {
                $this->addTopic($topic);
            }

            $this->queuedTopics = [];
        }
    }

    /**
     * Subscribe to an ActiveMQ topic.
     *
     * This can be done before the connection starts (topic will be queued for
     * addition) or when the connection is open (topic will be subscribed to
     * the open connection immediately).
     *
     * @param \OpenRailData\Topics\AbstractTopic $topic
     */
    public function addTopic(AbstractTopic $topic)
    {
        /**
         * If the stomp connection is not yet open, then queue the topic
         * for adding later.
         */
        if (!$this->stomp) {
            $this->enqueueTopic($topic);
            return;
        }

        /**
         * Sanity checks.  Make sure the topic is a Network Rail / Stomp topic.
         */
        if ($topic->getCommunicationType() !== AbstractTopic::COMMS_TYPE_REALTIME) {
            throw new IncompatibleTopicException(sprintf("Topic %s is not a realtime topic and is not supported by this connection type.", $topic->getTopic()));
        }

        if ($topic->getServiceProvider() !== AbstractTopic::PROVIDER_NETWORK_RAIL) {
            throw new IncompatibleTopicException(sprintf("Topic %s is not a network rail topic.", $topic->getTopic()));
        }

        $stompTopic = "/topic/" . $topic->getTopic();
        $this->eventFactories[$stompTopic] = $topic->getFactory();

        $this->stomp->subscribe($stompTopic);

    }

    public function events()
    {
        if (!$this->stomp) {
            $this->connect();
        }

        while (true)
        {
            if ($this->stomp->hasFrame()){
                $msg = $this->stomp->readFrame();

                $destination = $msg->headers['destination'];

                $factory = "\\OpenRailData\\Events\\" . $this->eventFactories[$destination]. "\\Factory";

                // Save events locally so we can ack the message.
                $events = [];

                foreach (json_decode($msg->body) as $rawEevent) {
                    $events[] = $factory::create($rawEevent);
                }
                $this->stomp->ack($msg);

                foreach ($events as $event) {
                    yield $event;
                }
            }
        }
    }

    /**
     * Queue a topic for subscribing later.
     *
     * @param AbstractTopic $topic
     */
    private function enqueueTopic(AbstractTopic $topic)
    {
        $this->queuedTopics[] = $topic;
    }


}