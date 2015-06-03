<?php

namespace OpenRailDataExamples\NetworkRail\VstpEvents;

use OpenRailData\NetworkRail\Services\Stomp\Topics\Vstp\VstpEvent;


/**
 * This is our event listener class.
 *
 * It is a class that you should create which implements at least one method,
 * "onEventReceived".  Each time an event is received on it, it will fire this
 * method.
 *
 */
class ExampleEventListener
{

    public function onEventReceived(VstpEvent $event)
    {
        var_dump($event->getScheduleId());
    }
}
