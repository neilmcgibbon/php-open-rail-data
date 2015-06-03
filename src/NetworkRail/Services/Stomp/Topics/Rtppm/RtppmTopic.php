<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm;

use OpenRailData\NetworkRail\Services\Stomp\StompEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\AbstractTopic;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\RtppmEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TopicEventNames;
use OpenRailData\Resources\EventDispatcher;

/**
 * Class Rtppm
 *
 * This Network Rail topic captures events from the Real Time Public
 * Performance Measure queue.
 *
 * @see http://nrodwiki.rockshore.net/index.php/RTPPM
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class RtppmTopic extends AbstractTopic
{

    final function __construct()
    {
        $this->setTopic("RTPPM_ALL");
    }

    public function getEventName()
    {
        return TopicEventNames::RTPPM;
    }

    public function onStompEvent(StompEvent $event)
    {

        $d = EventDispatcher::get();

        $event = new RtppmEvent($event->getData());

        $d->dispatch(TopicEventNames::RTPPM, $event);

    }



}