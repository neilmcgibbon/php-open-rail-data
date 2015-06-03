<?php

namespace OpenRailDataExamples\NetworkRail\CancellationEventForOneBusiness;

use \OpenRailData\NetworkRail\Services\Stomp\Events\TrainMovements\TrainMovementsEvent;
use OpenRailData\NetworkRail\Services\Stomp\Events\TrainMovements\CancellationEvent;

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

  public function onEventReceived(TrainMovementsEvent $event)
  {

    // The example brief stated that we only want to process cancellation events,
    // so we discard any other train movement event types.
    if ($event->getMovementType() !== TrainMovementsEvent::TYPE_CANCELLATION) {
      return;
    }

    // If we are here, then $event contains a CancellationEvent.

    /* @var $cancellationEvent CancellationEvent */
    $cancellation = $event->getMovement();

    // Now we can do our processing, e.g. get the cancellation reason code...
    echo "Cancellation reason code: ".  $cancellation->getCanxReasonCode() . PHP_EOL;

  }
}
