<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes;
/**
 * Class ReinstatementEvent
 *
 * This is a train reinstatementEvent event. The following is taken from the Open Rail data
 * documentation wiki:
 *
 * "When trains are cancelled, but then reinstated, a reinstatement message message is sent.
 * This contains details of the cancellation - the location to which it applies, the type of
 * cancellation, and the reason code.
 *
 * As with all other messages, cancellation messages will only be received for train schedules
 * which have already been activated."
 *
 * @see http://nrodwiki.rockshore.net/index.php/Train_Reinstatement
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class ReinstatementEvent
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
     * @var string
     */
    private $reinstatementTimestamp;

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

    /**
     *
     * @return string
     */
    public function getReinstatementTimestamp()
    {
        return $this->reinstatementTimestamp;
    }

    /**
     *
     * @param string $reinstatementTimestamp
     *
     * @return $this
     */
    public function setReinstatementTimestamp($reinstatementTimestamp)
    {
        $this->reinstatementTimestamp = $reinstatementTimestamp;
        return $this;
    }

}