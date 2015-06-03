<?php

namespace OpenRailDataExamples\NetworkRail\TdEvents;

use OpenRailData\NetworkRail\Services\Stomp\Topics\TrainDescriber\TrainDescriberEvent;


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

    public function onEventReceived(TrainDescriberEvent $event)
    {
        var_dump($event->getDescriberType());
    }
}
