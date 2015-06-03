<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Vstp;
use OpenRailData\NetworkRail\Services\Stomp\StompEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\AbstractTopic;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TopicEventNames;
use OpenRailData\Resources\EventDispatcher;

/**
 * Class AllSchedules
 *
 * This Network Rail topic captures VSTP [Very Short Term Planning] events for
 * all schedules
 *
 * @see http://nrodwiki.rockshore.net/index.php/VSTP
 * @package OpenRailData\Topics\NetworkRail\Vstp
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class VstpTopic extends AbstractTopic
{

    final function __construct()
    {
        $this->setTopic("VSTP_ALL");
    }

    public function getEventName()
    {
        return TopicEventNames::VSTP;
    }

    public function onStompEvent(StompEvent $event)
    {

        $d = EventDispatcher::get();

        $ordEvent = new VstpEvent($event->getData());

        $d->dispatch(TopicEventNames::VSTP, $ordEvent);
    }

}