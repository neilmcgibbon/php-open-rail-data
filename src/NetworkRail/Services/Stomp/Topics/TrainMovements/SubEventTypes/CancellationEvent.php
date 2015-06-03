<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes;

/**
 * Class CancellationEvent
 *
 * This is a train cancellation event. The following is taken from the Open Rail data
 * documentation wiki:
 *
 * "A cancellation message is sent when the train does not, or will not, complete its
 * scheduled journey.
 *
 * A train may be cancelled in one of four ways:
 * - At activation time ("ON CALL"), usually where the applicable schedule has a STP
 *   indicator of "C" - see Planned Cancellations. Trains may be cancelled for other
 *   reasons before train has been activated, and when activation occurs, the train will
 *   be immediately cancelled with the appropriate reason code
 * - At the train's planned origin ("AT ORIGIN")
 * - En-route ("EN ROUTE")
 * - Off-route ("OUT OF PLAN")
 *
 * As with all other messages, cancellation messages will only be received for train
 * schedules which have already been activated."
 *
 * @see http://nrodwiki.rockshore.net/index.php/Train_Cancellation
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class CancellationEvent
{

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
    private $origLocStanox;

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
    private $canxTimestamp;

    /**
     *
     * @var string
     */
    private $canxReasonCode;

    /**
     *
     * @var string
     */
    private $trainId;

    /**
     *
     * @var string
     */
    private $origLocTimestamp;

    /**
     *
     * @var string
     */
    private $canxType;


    /**
     * @return string
     */
    public function getTrainFileAddress()
    {
        return $this->trainFileAddress;
    }

    /**
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
     * @return string
     */
    public function getTrainServiceCode()
    {
        return $this->trainServiceCode;
    }

    /**
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
     * @return string
     */
    public function getOrigLocStanox()
    {
        return $this->origLocStanox;
    }

    /**
     * @param string $origLocStanox
     *
     * @return $this
     */
    public function setOrigLocStanox($origLocStanox)
    {
        $this->origLocStanox = $origLocStanox;
        return $this;
    }

    /**
     * @return string
     */
    public function getTocId()
    {
        return $this->tocId;
    }

    /**
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
     * @return string
     */
    public function getDepTimestamp()
    {
        return $this->depTimestamp;
    }

    /**
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
     * @return string
     */
    public function getDivisionCode()
    {
        return $this->divisionCode;
    }

    /**
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
     * @return string
     */
    public function getLocStanox()
    {
        return $this->locStanox;
    }

    /**
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
     * @return string
     */
    public function getCanxTimestamp()
    {
        return $this->canxTimestamp;
    }

    /**
     * @param string $canxTimestamp
     *
     * @return $this
     */
    public function setCanxTimestamp($canxTimestamp)
    {
        $this->canxTimestamp = $canxTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getCanxReasonCode()
    {
        return $this->canxReasonCode;
    }

    /**
     * @param string $canxReasonCode
     *
     * @return $this
     */
    public function setCanxReasonCode($canxReasonCode)
    {
        $this->canxReasonCode = $canxReasonCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrainId()
    {
        return $this->trainId;
    }

    /**
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
     * @return string
     */
    public function getOrigLocTimestamp()
    {
        return $this->origLocTimestamp;
    }

    /**
     * @param string $origLocTimestamp
     *
     * @return $this
     */
    public function setOrigLocTimestamp($origLocTimestamp)
    {
        $this->origLocTimestamp = $origLocTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getCanxType()
    {
        return $this->canxType;
    }

    /**
     * @param string $canxType
     *
     * @return $this
     */
    public function setCanxType($canxType)
    {
        $this->canxType = $canxType;
        return $this;
    }

}