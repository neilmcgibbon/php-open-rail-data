<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainDescriber;

use OpenRailData\NetworkRail\Services\Stomp\Topics\TopicEventNames;
use OpenRailData\NetworkRail\Services\Stomp\StompEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\AbstractTopic;
use OpenRailData\Resources\EventDispatcher;


/**
 * Class
 *
 * This Network Rail topic captures TD [Train Describer] events for
 * all areas.
 *
 * @see http://nrodwiki.rockshore.net/index.php/TD
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Td
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class TrainDescriberTopic extends AbstractTopic
{

    final function __construct()
    {
        $this->setTopic("TD_ALL_SIG_AREA");
    }

    public function getEventName()
    {
        return TopicEventNames::TRAIN_DESCRIBER;
    }

    public function onStompEvent(StompEvent $event)
    {
        $d = EventDispatcher::get();

        // If the object does not have exactly one property then
        // it's invalid.
        if (!is_object($event->getData()) || count($event->getData()) !== 1) {
            // @todo Log this...
            return false;
        }

        // The event that will be dispatched
        $ordEvent = null;

        // We foreach over the single property object, because we don't
        // know the name of the property...
        foreach ($event->getData() as $k=>$v) {
            switch ($k) {
                case "CA_MSG":
                case "CB_MSG":
                case "CC_MSG":
                case "CT_MSG":
                    $ordEvent = new CClassEvent($v);
                    break;

                case "SF_MSG":
                case "SG_MSG":
                case "SH_MSG":
                    $ordEvent = new SClassEvent($v);
                    break;

                default:
                    // Unknown message type.
                    // @todo Log this error.
                    break;
            }
        }

        $d->dispatch(TopicEventNames::TRAIN_DESCRIBER, $ordEvent);

    }

}