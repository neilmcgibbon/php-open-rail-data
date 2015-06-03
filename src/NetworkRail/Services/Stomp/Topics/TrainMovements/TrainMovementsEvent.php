<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements;
use OpenRailData\NetworkRail\Services\Stomp\OpenRailDataEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes\ActivationEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes\CancellationEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes\MovementEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes\ReinstatementEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes\ChangeOfOriginEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes\ChangeOfIdentityEvent;
use OpenRailData\Exceptions\UnknownPropertyException;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TopicEventNames;

/**
 * Class TrainMovementsEvent
 *
 * All Network Rail "Train Movements" events extend this abstract class.
 * The constructor is final and sets the child class properties from the
 * JSON payload in the Stomp message.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class TrainMovementsEvent extends OpenRailDataEvent
{

    /**
     * Movement types.
     */
    const TYPE_ACTIVATION = "activation";
    const TYPE_CANCELLATION = "cancellation";
    const TYPE_MOVEMENT = "movement";
    const TYPE_UNIDENTIFIED_TRAIN = "unidentified_train";
    const TYPE_REINSTATEMENT = "reinstatement";
    const TYPE_CHANGE_OF_ORIGIN = "change_of_location";
    const TYPE_CHANGE_OF_IDENTITY = "change_of_identity";
    const TYPE_CHANGE_OF_LOCATION = "change_of_location";

    /**
     * @var string
     */
    private $movementType;

    /**
     * @var mixed
     */
    private $movement;

    final function  __construct($data)
    {

        switch ($data->header->msg_type)
        {
            // A train "activation" message.
            case "0001":
                $this->movement = new ActivationEvent($data);
                $this->movementType = self::TYPE_ACTIVATION;
                break;

            // A train "cancellation" message.
            case "0002":
                $this->movement = new CancellationEvent($data);
                $this->movementType = self::TYPE_CANCELLATION;
                break;

            // A train "movement" message.
            case "0003":
                $this->movement = new MovementEvent($data);
                $this->movementType = self::TYPE_MOVEMENT;
                break;

            // An "unidentified train" message Not used in production, so no
            // event created.
            case "0004":
                $this->movementType = self::TYPE_UNIDENTIFIED_TRAIN;
                break;

            // A train "reinstatement" message.
            case "0005":
                $this->movement = new ReinstatementEvent($data);
                $this->movementType = self::TYPE_REINSTATEMENT;
                break;

            // A "change of origin" message.
            case "0006":
                $this->movement = new ChangeOfOriginEvent($data);
                $this->movementType = self::TYPE_CHANGE_OF_ORIGIN;
                break;

            // A "change of identity" message, used for freight services.
            case "0007":
                $this->movement = new ChangeOfIdentityEvent($data);
                $this->movementType = self::TYPE_CHANGE_OF_IDENTITY;
                break;

            // A "change of location" message. Not used in production, so
            // no event will be created.
            case "0008":
                //
                $this->movementType = self::TYPE_CHANGE_OF_LOCATION;
                break;

            // If the message type is not one of the above, we are not
            // expecting it. Rather than throw an exception, we just log
            // the error.
            default:
                // @todo Log this error.
                break;
        }

        if (!$this->movement)
        {
            return;
        }

        foreach ($data->body as $k => $v) {

            // If json property is empty string, then leave instance property as null.
            if ($v == "") {
                continue;
            }

            // Convert keys like "event_type" to "eventType"
            $ccProperty = lcfirst(str_replace(" ", "", ucwords(str_replace("_", " ", $k))));

            // If the property is not recognised then bail out.
            // @todo bailing out should be optional, e.g log the error and continue.
            if (!property_exists($this->movement, $ccProperty)) {
                throw new UnknownPropertyException($k, $ccProperty, get_class($this));
            }

            // Set the object property to the json property's value.
            $this->movement->{"set" . ucfirst($ccProperty)}($v);
        }
    }

    /**
     * @return mixed
     */
    public function getMovement()
    {
        return $this->movement;
    }

    /**
     * @return string
     */
    public function getMovementType()
    {
        return $this->movementType;
    }

}