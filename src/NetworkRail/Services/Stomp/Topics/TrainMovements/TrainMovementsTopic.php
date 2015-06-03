<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements;

use OpenRailData\NetworkRail\Services\Stomp\Topics\AbstractTopic;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TopicEventNames;
use OpenRailData\NetworkRail\Services\Stomp\StompEvent;
use OpenRailData\Resources\EventDispatcher;

/**
 * Class AllBusinesses
 *
 * This Network Rail topic captures movement events for all businesses in the
 * Network Rail "TRUST" system, including cancellations, reinstatements, etc.
 * To subscribe to data for just one business, please use the ForBusiness()
 * topic class instead.
 *
 * @see http://nrodwiki.rockshore.net/index.php/Train_Movements
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
abstract class TrainMovementsTopic extends AbstractTopic
{

    public function getEventName()
    {
        return TopicEventNames::TRAIN_MOVEMENTS;
    }

    public function onStompEvent(StompEvent $event)
    {
        $d = EventDispatcher::get();

        // If there is no header property, then this Stomp message is
        // not valid, we can't process it.
        if (!is_object($event->getData()) || !property_exists($event->getData(), "header")) {
            // @todo Log this...
            return false;
        }

        // The event that will be returned.
        $ordEvent = new TrainMovementsEvent($event->getData());

        $d->dispatch(TopicEventNames::TRAIN_MOVEMENTS, $ordEvent);


    }

}