<?php

namespace OpenRailDataExamples\NetworkRail\AllTrainMovements;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\TrainMovementsEvent;


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

    /**
     * $event variable contains two methods:
     *
     * 1) getMovementType()
     *    - This returns something like "cancellation" for a cancellation event, etc.
     *
     * 2) getMovement()
     *    - This returns the movement object, which will be different depending on
     *      what the movement type is.
     *
     * For example, if the movement type is a train activation, then:
     *  - $event->getMovementType == TrainMovementsEvent::TYPE_ACTIVATION
     *  - $event->getMovement() returns an object of type Events\TrainMovements\ActivationEvent
     *
     */

    echo "Movement is of type: " . $event->getMovementType() . PHP_EOL;

  }
}
