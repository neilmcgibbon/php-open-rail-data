<?php


namespace OpenRailData\NetworkRail\Services\Stomp\Topics;
use OpenRailData\NetworkRail\Services\Stomp\StompEvent;
use OpenRailData\Resources\EventDispatcher;

/**
 * Class AbstractTopic
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
abstract class AbstractTopic {

    /**
     * Service provider constants
     */
    const PROVIDER_NETWORK_RAIL = "networkRail";
    const PROVIDER_NATIONAL_RAIL = "nationalRail";

    /**
     * Communications type constants
     */
    const COMMS_TYPE_REALTIME = "realtime";
    const COMMS_TYPE_STATIC = "static";

    /**
     * The topic queue name, used for Stomp subscription
     *
     * @var string
     */
    protected $topic;

    /**
     * The topic event, used in event dispatchers/listeners
     *
     * @var string
     */
    protected $event;

    /**
     * The class used to create the event object
     *
     * @var string
     */
    protected $factory;


    /**
     * Get the topic name
     *
     * @return string The Stomp (ActiveMQ) topic identifier
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set the topic name
     *
     * @param string $topic The Stomp (ActiveMQ) topic identifier
     *
     * @return $this
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }

    /**
     * Get the class name that will create the event object
     *
     * @return string The class name of the event object
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * Set the class name for the event object
     *
     * @param string $factory The class name of the event object
     *
     * @return $this
     */
    public function setFactory($factory)
    {
        $this->factory = $factory;
        return $this;
    }

    public function addListener($listener)
    {
        EventDispatcher::get()->addListener($this->getEventName(), [$listener, 'onEventReceived']);
    }

    public function listen()
    {
        EventDispatcher::get()->addListener(
            "raw". $this->getEventName(),
            [$this, 'onStompEvent']
        );
    }

    /**
     * Get the event name used for event listeners
     *
     * @return string
     */
    abstract public function getEventName();

    abstract public function onStompEvent(StompEvent $data);


}