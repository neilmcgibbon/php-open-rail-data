<?php

namespace OpenRailData\Services\NetworkRail;
use OpenRailData\Exceptions\SingletonStaticTopicException;
use OpenRailData\Topics\AbstractTopic;
use OpenRailData\Exceptions\IncompatibleTopicException;
use OpenRailData\Topics\CurlTopic;

/**
 * Class Curl
 *
 * @package OpenRailData\Services\NetworkRail
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class Curl
{

    const SCHEME = "https";
    const HOST = "datafeeds.networkrail.co.uk";
    const AUTHENTICATION_URL = "datafeeds.networkrail.co.uk/ntrod/j_spring_security_check";

    /**
     * @var string Network Rail username
     */
    private $username;

    /**
     * @var string Network Rail password
     */
    private $password;

    /**
     * @var AbstractTopic
     */
    private $topic;

    /**
     * @var string
     */
    private $uri;

    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Set the static topic
     *
     * As this is a static resource connection, only one topic (resource)
     * is allowed.
     *
     * @param \OpenRailData\Topics\CurlTopic $topic
     */
    public function addTopic(CurlTopic $topic)
    {
        if ($this->topic) {
            throw new SingletonStaticTopicException();
        }

        /**
         * Sanity checks.  Make sure the topic is a Network Rail / Stomp topic.
         */
        if ($topic->getCommunicationType() !== AbstractTopic::COMMS_TYPE_STATIC) {
            throw new IncompatibleTopicException(sprintf("Topic %s is not a static topic and is not supported by this connection type.", $topic->getTopic()));
        }

        if ($topic->getServiceProvider() !== AbstractTopic::PROVIDER_NETWORK_RAIL) {
            throw new IncompatibleTopicException(sprintf("Topic %s is not a network rail topic.", $topic->getTopic()));
        }

        $this->topic = $topic;

        $this->uri = $topic->getUri();

    }

    public function events()
    {
        $message = [];
        $dsn = vsprintf("%s://%s/%s", [
            self::SCHEME,
            self::HOST,
            $this->uri,
        ]);

        $outputFileName = "/tmp/" . uniqid();

        // Do reuuest.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $dsn);
        curl_setopt($ch, CURLOPT_USERPWD, $this->username . ':' . $this->password);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'ntrod.txt');
        curl_setopt($ch, CURLOPT_FILE, fopen($outputFileName, "w"));
        curl_exec($ch);
        curl_close($ch);

        $factory = "\\OpenRailData\\Events\\" . $this->topic->getFactory(). "\\Factory";

        $staticEventsCollection = $factory::create($outputFileName);

        foreach ($staticEventsCollection->getEvents() as $event) {
            yield $event;
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