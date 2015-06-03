<?php

namespace OpenRailDataExamples\NetworkRail\RtppmEvents;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\RtppmEvent;


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

  public function onEventReceived(RtppmEvent $event)
  {
    echo "Received event. National page total 'on time' count: ";
    echo $event->getNationalPage()->getPerformance()->getOnTimeCount() . PHP_EOL;
  }
}
