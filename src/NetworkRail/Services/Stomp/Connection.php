<?php

namespace OpenRailData\NetworkRail\Services\Stomp;

use OpenRailData\Exceptions\ConnectionErrorException;
use OpenRailData\NetworkRail\Services\Stomp\Topics\AbstractTopic;
use OpenRailData\Resources\EventDispatcher;

/**
 * Class Connection
 *
 * @package OpenRailData\NetworkRail\Services\Stomp
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class Connection
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
     * @var Topics\AbstractTopic[]
     */
    private $eventTopics;

    /**
     * @var Topics\AbstractTopic[]
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
     * @param \OpenRailData\NetworkRail\Services\Stomp\Topic\AbstractTopic
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

        $stompTopic = "/topic/" . $topic->getTopic();
        $this->eventTopics[$stompTopic] = $topic;

        $this->stomp->subscribe($stompTopic);

        // Once the topic has been subscribed to, we can handle the event
        // listener
        $topic->listen();
    }

    public function listen()
    {
        $d = EventDispatcher::get();

        foreach ($this->loop() as $event)
        {
            $d->dispatch($event->getEventKey(), $event);
        }
    }

    public function loop()
    {
        $d = EventDispatcher::get();

        if (!$this->stomp) {
            $this->connect();
        }

        while (true)
        {
            if ($this->stomp->hasFrame()){
                $msg = $this->stomp->readFrame();

                $destination = $msg->headers['destination'];

                /** @var Topics\AbstractTopic $topic */
                $topic = $this->eventTopics[$destination];

                //$factory = "\\OpenRailData\\NetworkRail\\Services\\Stomp\\Events\\" . $topic->getFactory() . "\\Factory";
              
                // Save events locally so we can ack the message.
                $events = [];

                foreach (json_decode($msg->body) as $raw) {
                    $events[] = $raw;
                }
                $this->stomp->ack($msg);

                foreach ($events as $event) {
                    $d->dispatch("raw" . $topic->getEventName(), new StompEvent($event));
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