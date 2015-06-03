<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes;

/**
 * Class ChangeOfIdentityEvent
 *
 * This is a change of origin event. The following is taken from the Open Rail data
 * documentation wiki:
 *
 * "When a train is due to start from a location other than the first location in the
 * schedule, a change of origin message will be sent.
 *
 * Trains may start from alternate locations for two reasons:
 * - When the previous working is terminated short of its destination and the return
 *   working will start from that location
 * - When the train starts from, for example, Doncaster North Yard rather than the
 * schedule location of Doncaster South Yard"
 *
 * @see http://nrodwiki.rockshore.net/index.php/Change_of_Origin
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class ChangeOfOriginEvent
{

    /**
     *
     * @var string
     */
    private $reasonCode;

    /**
     *
     * @var string
     */
    private $currentTrainId;

    /**
     *
     * @var string
     */
    private $originalLocTimestamp;

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
    private $tocId;

    /**
     *
     * @var string
     */
    private $depTimestamp;

    /**
     *
     * @var string
     */
    private $cooTimestamp;

    /**
     *
     * @var string
     */
    private $divisionCode;

    /**
     *
     * @var string
     */
    private $locStanox;

    /**
     *
     * @var string
     */
    private $trainId;

    /**
     *
     * @var string
     */
    private $originalLocStanox;

    /**
     *
     * @return string
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     *
     * @param string $reasonCode
     *
     * @return $this
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
        return $this;
    }

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
    public function getOriginalLocTimestamp()
    {
        return $this->originalLocTimestamp;
    }

    /**
     *
     * @param string $originalLocTimestamp
     *
     * @return $this
     */
    public function setOriginalLocTimestamp($originalLocTimestamp)
    {
        $this->originalLocTimestamp = $originalLocTimestamp;
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
    public function getTocId()
    {
        return $this->tocId;
    }

    /**
     *
     * @param string $tocId
     *
     * @return $this
     */
    public function setTocId($tocId)
    {
        $this->tocId = $tocId;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDepTimestamp()
    {
        return $this->depTimestamp;
    }

    /**
     *
     * @param string $depTimestamp
     *
     * @return $this
     */
    public function setDepTimestamp($depTimestamp)
    {
        $this->depTimestamp = $depTimestamp;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getCooTimestamp()
    {
        return $this->cooTimestamp;
    }

    /**
     *
     * @param string $cooTimestamp
     *
     * @return $this
     */
    public function setCooTimestamp($cooTimestamp)
    {
        $this->cooTimestamp = $cooTimestamp;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDivisionCode()
    {
        return $this->divisionCode;
    }

    /**
     *
     * @param string $divisionCode
     *
     * @return $this
     */
    public function setDivisionCode($divisionCode)
    {
        $this->divisionCode = $divisionCode;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getLocStanox()
    {
        return $this->locStanox;
    }

    /**
     *
     * @param string $locStanox
     *
     * @return $this
     */
    public function setLocStanox($locStanox)
    {
        $this->locStanox = $locStanox;
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
    public function getOriginalLocStanox()
    {
        return $this->originalLocStanox;
    }

    /**
     *
     * @param string $originalLocStanox
     *
     * @return $this
     */
    public function setOriginalLocStanox($originalLocStanox)
    {
        $this->originalLocStanox = $originalLocStanox;
        return $this;
    }

}