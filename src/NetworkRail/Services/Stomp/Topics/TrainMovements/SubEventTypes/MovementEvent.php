<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes;

/**
 * Class MovementEvent
 *
 * This is a train movement event. The following is taken from the Open Rail data
 * documentation wiki:
 *
 * "A train movement message is sent whenever a train arrives, passes or departs a
 * location monitored by TRUST. It records the time at which the event happens.
 *
 * Reports may be automatically generated, or manually entered."
 *
 * @see http://nrodwiki.rockshore.net/index.php/Train_Movement
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class MovementEvent
{

    /**
     *
     * @var string
     */
    private $eventType;

    /**
     *
     * @var string
     */
    private $gbttTimestamp;

    /**
     *
     * @var string
     */
    private $originalLocStanox;

    /**
     *
     * @var string
     */
    private $plannedTimestamp;

    /**
     *
     * @var string
     */
    private $timetableVariation;

    /**
     *
     * @var string
     */
    private $originalLocTimestamp;

    /**
     *
     * @var string
     */
    private $currentTrainId;

    /**
     *
     * @var bool
     */
    private $delayMonitoringPoint;

    /**
     *
     * @var string
     */
    private $nextReportRunTime;

    /**
     *
     * @var string
     */
    private $reportingStanox;

    /**
     *
     * @var string
     */
    private $actualTimestamp;

    /**
     *
     * @var bool
     */
    private $correctionInd;

    /**
     *
     * @var string
     */
    private $eventSource;

    /**
     *
     * @var string
     */
    private $trainFileAddress;

    /**
     *
     * @var string
     */
    private $platform;

    /**
     *
     * @var string
     */
    private $divisionCode;

    /**
     *
     * @var bool
     */
    private $trainTerminated;

    /**
     *
     * @var string
     */
    private $trainId;

    /**
     *
     * @var bool
     */
    private $offrouteInd;

    /**
     *
     * @var string
     */
    private $variationStatus;

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
    private $locStanox;

    /**
     *
     * @var bool
     */
    private $autoExpected;

    /**
     *
     * @var string
     */
    private $directionInd;

    /**
     *
     * @var string
     */
    private $route;

    /**
     *
     * @var string
     */
    private $plannedEventType;

    /**
     *
     * @var string
     */
    private $nextReportStanox;

    /**
     *
     * @var string
     */
    private $lineInd;

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     *
     * @return $this
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
        return $this;
    }

    /**
     * @return string
     */
    public function getGbttTimestamp()
    {
        return $this->gbttTimestamp;
    }

    /**
     * @param string $gbttTimestamp
     *
     * @return $this
     */
    public function setGbttTimestamp($gbttTimestamp)
    {
        $this->gbttTimestamp = $gbttTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalLocStanox()
    {
        return $this->originalLocStanox;
    }

    /**
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
     * @return string
     */
    public function getPlannedTimestamp()
    {
        return $this->plannedTimestamp;
    }

    /**
     * @param string $plannedTimestamp
     *
     * @return $this
     */
    public function setPlannedTimestamp($plannedTimestamp)
    {
        $this->plannedTimestamp = $plannedTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimetableVariation()
    {
        return $this->timetableVariation;
    }

    /**
     * @param string $timetableVariation
     *
     * @return $this
     */
    public function setTimetableVariation($timetableVariation)
    {
        $this->timetableVariation = $timetableVariation;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalLocTimestamp()
    {
        return $this->originalLocTimestamp;
    }

    /**
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
     * @return string
     */
    public function getCurrentTrainId()
    {
        return $this->currentTrainId;
    }

    /**
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
     * @return bool
     */
    public function getDelayMonitoringPoint()
    {
        return $this->delayMonitoringPoint;
    }

    /**
     * @param mixed $delayMonitoringPoint
     *
     * @return $this
     */
    public function setDelayMonitoringPoint($delayMonitoringPoint)
    {
        $this->delayMonitoringPoint = ($delayMonitoringPoint === "true" || $delayMonitoringPoint === true);
        return $this;
    }

    /**
     * @return string
     */
    public function getNextReportRunTime()
    {
        return $this->nextReportRunTime;
    }

    /**
     * @param string $nextReportRunTime
     *
     * @return $this
     */
    public function setNextReportRunTime($nextReportRunTime)
    {
        $this->nextReportRunTime = $nextReportRunTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportingStanox()
    {
        return $this->reportingStanox;
    }

    /**
     * @param string $reportingStanox
     *
     * @return $this
     */
    public function setReportingStanox($reportingStanox)
    {
        $this->reportingStanox = $reportingStanox;
        return $this;
    }

    /**
     * @return string
     */
    public function getActualTimestamp()
    {
        return $this->actualTimestamp;
    }

    /**
     * @param string $actualTimestamp
     *
     * @return $this
     */
    public function setActualTimestamp($actualTimestamp)
    {
        $this->actualTimestamp = $actualTimestamp;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCorrectionInd()
    {
        return $this->correctionInd;
    }

    /**
     * @param mixed $correctionInd
     *
     * @return $this
     */
    public function setCorrectionInd($correctionInd)
    {
        $this->correctionInd = ($correctionInd === "true" || $correctionInd === true);
        return $this;
    }

    /**
     * @return string
     */
    public function getEventSource()
    {
        return $this->eventSource;
    }

    /**
     * @param string $eventSource
     *
     * @return $this
     */
    public function setEventSource($eventSource)
    {
        $this->eventSource = $eventSource;
        return $this;
    }

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
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     *
     * @return $this
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
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
     * @return bool
     */
    public function getTrainTerminated()
    {
        return $this->trainTerminated;
    }

    /**
     * @param mixed $trainTerminated
     *
     * @return $this
     */
    public function setTrainTerminated($trainTerminated)
    {
        $this->trainTerminated = ($trainTerminated === "true" || $trainTerminated == true);
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
     * @return bool
     */
    public function getOffrouteInd()
    {
        return $this->offrouteInd;
    }

    /**
     * @param mixed $offrouteInd
     *
     * @return $this
     */
    public function setOffrouteInd($offrouteInd)
    {
        $this->offrouteInd = ($offrouteInd === "true" || $offrouteInd === true);
        return $this;
    }

    /**
     * @return string
     */
    public function getVariationStatus()
    {
        return $this->variationStatus;
    }

    /**
     * @param string $variationStatus
     *
     * @return $this
     */
    public function setVariationStatus($variationStatus)
    {
        $this->variationStatus = $variationStatus;
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
     * @return bool
     */
    public function getAutoExpected()
    {
        return $this->autoExpected;
    }

    /**
     * @param mixed $autoExpected
     *
     * @return $this
     */
    public function setAutoExpected($autoExpected)
    {
        $this->autoExpected = ($autoExpected === "true" || $autoExpected === true);
        return $this;
    }

    /**
     * @return string
     */
    public function getDirectionInd()
    {
        return $this->directionInd;
    }

    /**
     * @param string $directionInd
     *
     * @return $this
     */
    public function setDirectionInd($directionInd)
    {
        $this->directionInd = $directionInd;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     *
     * @return $this
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlannedEventType()
    {
        return $this->plannedEventType;
    }

    /**
     * @param string $plannedEventType
     *
     * @return $this
     */
    public function setPlannedEventType($plannedEventType)
    {
        $this->plannedEventType = $plannedEventType;
        return $this;
    }

    /**
     * @return string
     */
    public function getNextReportStanox()
    {
        return $this->nextReportStanox;
    }

    /**
     * @param string $nextReportStanox
     *
     * @return $this
     */
    public function setNextReportStanox($nextReportStanox)
    {
        $this->nextReportStanox = $nextReportStanox;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineInd()
    {
        return $this->lineInd;
    }

    /**
     * @param string $lineInd
     *
     * @return $this
     */
    public function setLineInd($lineInd)
    {
        $this->lineInd = $lineInd;
        return $this;
    }

}