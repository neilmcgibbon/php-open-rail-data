<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes;

/**
 * Class ChangeOfIdentityEvent
 *
 * This is a change of identity event. The following is taken from the Open Rail data
 * documentation wiki:
 *
 * "NOTE - Change of Identity messages are only sent for freight trains.
 *
 * One or more Change of Identity messages may be sent for a freight train, after
 * activation, where the class of the train is to change. This will happen if the train
 * will run without wagons (i.e. a Class 6 service runs as a Class 0), or if the train
 * is carrying a wagon with a defect and must run at a slower speed."
 *
 * @see http://nrodwiki.rockshore.net/index.php/Change_of_Identity
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class ChangeOfIdentityEvent
{

    /**
     *
     * @var string
     */
    private $currentTrainId;

    /**
     *
     * @var string
     */
    private $revisedTrainId;

    /**
     *
     * @var string
     */
    private $trainFileAddress;

    /**
     *
     * @var string
     */
    private $trainServiceCode;

    /**
     *
     * @var string
     */
    private $trainId;

    /**
     *
     * @var string
     */
    private $eventTimestamp;

    /**
     *
     * @return string
     */
    public function getCurrentTrainId()
    {
        return $this->currentTrainId;
    }

    /**
     *
     * @param string $currentTrainId
     *
     * @return $this
     */
    public function setCurrentTrainId($currentTrainId)
    {
        $this->currentTrainId = $currentTrainId;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getRevisedTrainId()
    {
        return $this->revisedTrainId;
    }

    /**
     *
     * @param string $revisedTrainId
     *
     * @return $this
     */
    public function setRevisedTrainId($revisedTrainId)
    {
        $this->revisedTrainId = $revisedTrainId;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getTrainFileAddress()
    {
        return $this->trainFileAddress;
    }

    /**
     *
     * @param string $trainFileAddress
     *
     * @return $this
     */
    public function setTrainFileAddress($trainFileAddress)
    {
        $this->trainFileAddress = $trainFileAddress;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getTrainServiceCode()
    {
        return $this->trainServiceCode;
    }

    /**
     *
     * @param string $trainServiceCode
     *
     * @return $this
     */
    public function setTrainServiceCode($trainServiceCode)
    {
        $this->trainServiceCode = $trainServiceCode;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getTrainId()
    {
        return $this->trainId;
    }

    /**
     *
     * @param string $trainId
     *
     * @return $this
     */
    public function setTrainId($trainId)
    {
        $this->trainId = $trainId;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getEventTimestamp()
    {
        return $this->eventTimestamp;
    }

    /**
     *
     * @param string $eventTimestamp
     *
     * @return $this
     */
    public function setEventTimestamp($eventTimestamp)
    {
        $this->eventTimestamp = $eventTimestamp;
        return $this;
    }

}