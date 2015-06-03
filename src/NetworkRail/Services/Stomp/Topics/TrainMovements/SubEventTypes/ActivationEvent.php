<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes;

/**
 * Class ActivationEvent
 *
 * This is a train activation event. The following is taken from the Open Rail data
 * documentation wiki:
 *
 * "An activation message is produced when a train entity is created from a
 * schedule entity by the TRUST system. The train entity refers to a single
 * run of a train on a specific day whereas the schedule entity is potentially
 * valid for several months at a time. Within TRUST, this process is known as
 * Train Call.
 *
 * Most trains are called automatically (auto-call) before the train is due to
 * run, either 1 or 2 hours depending on the train's class. The TRUST mainframe
 * runs an internal process every 30 seconds throughout the day, causing
 * potentially two lots of train activation messages to be received every minute.
 *
 * Schedules which is Runs as required, or Runs to terminals/yards as required
 * (flagged with Q or Y in the schedule) are usually called manually - the train
 * operator will submit a message to the TRUST system and this will then cause
 * the schedule to be activated for that day (a process is known as manual call.)
 *
 * Any train may be manually called some hours in advance if the train is to be
 * cancelled (e.g. a cancellation of a 6pm service which is decided at 8am will
 * result in an auto-call train being manually called and then cancelled)."
 *
 * @see http://nrodwiki.rockshore.net/index.php/Train_Activation
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\SubEventTypes
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class ActivationEvent
{

    /**
     *
     * @var string
     */
    private $scheduleSource;

    /**
     *
     * @var string
     */
    private $trainFileAddress;

    /**
     *
     * @var string
     */
    private $scheduleEndDate;

    /**
     *
     * @var string
     */
    private $trainId;

    /**
     *
     * @var string
     */
    private $tpOriginTimestamp;

    /**
     *
     * @var string
     */
    private $creationTimestamp;

    /**
     *
     * @var string
     */
    private $tpOriginStanox;

    /**
     *
     * @var string
     */
    private $originDepTimestamp;

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
    private $d1266RecordNumber;

    /**
     *
     * @var string
     */
    private $trainCallType;

    /**
     *
     * @var string
     */
    private $trainUid;

    /**
     *
     * @var string
     */
    private $trainCallMode;

    /**
     *
     * @var string
     */
    private $scheduleType;

    /**
     *
     * @var string
     */
    private $schedOriginStanox;

    /**
     *
     * @var string
     */
    private $scheduleWttId;

    /**
     *
     * @var string
     */
    private $scheduleStartDate;

    /**
     * @return string
     */
    public function getScheduleSource()
    {
        return $this->scheduleSource;
    }

    /**
     * @param string $scheduleSource
     *
     * @return $this
     */
    public function setScheduleSource($scheduleSource)
    {
        $this->scheduleSource = $scheduleSource;
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
    public function getScheduleEndDate()
    {
        return $this->scheduleEndDate;
    }

    /**
     * @param $scheduleEndDate
     *
     * @return $this
     */
    public function setScheduleEndDate($scheduleEndDate)
    {
        $this->scheduleEndDate = $scheduleEndDate;
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
     * @param $trainId
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
    public function getTpOriginTimestamp()
    {
        return $this->tpOriginTimestamp;
    }

    /**
     * @param $tpOriginTimestamp
     *
     * @return $this
     */
    public function setTpOriginTimestamp($tpOriginTimestamp)
    {
        $this->tpOriginTimestamp = $tpOriginTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreationTimestamp()
    {
        return $this->creationTimestamp;
    }

    /**
     * @param $creationTimestamp
     *
     * @return $this
     */
    public function setCreationTimestamp($creationTimestamp)
    {
        $this->creationTimestamp = $creationTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getTpOriginStanox()
    {
        return $this->tpOriginStanox;
    }

    /**
     * @param $tpOriginStanox
     *
     * @return $this
     */
    public function setTpOriginStanox($tpOriginStanox)
    {
        $this->tpOriginStanox = $tpOriginStanox;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginDepTimestamp()
    {
        return $this->originDepTimestamp;
    }

    /**
     * @param $originDepTimestamp
     *
     * @return $this
     */
    public function setOriginDepTimestamp($originDepTimestamp)
    {
        $this->originDepTimestamp = $originDepTimestamp;
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
     * @param $trainServiceCode
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
     * @param $tocId
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
    public function getD1266RecordNumber()
    {
        return $this->d1266RecordNumber;
    }

    /**
     * @param $d1266RecordNumber
     *
     * @return $this
     */
    public function setD1266RecordNumber($d1266RecordNumber)
    {
        $this->d1266RecordNumber = $d1266RecordNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrainCallType()
    {
        return $this->trainCallType;
    }

    /**
     * @param $trainCallType
     *
     * @return $this
     */
    public function setTrainCallType($trainCallType)
    {
        $this->trainCallType = $trainCallType;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrainUid()
    {
        return $this->trainUid;
    }

    /**
     * @param $trainUid
     *
     * @return $this
     */
    public function setTrainUid($trainUid)
    {
        $this->trainUid = $trainUid;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrainCallMode()
    {
        return $this->trainCallMode;
    }

    /**
     * @param $trainCallMode
     *
     * @return $this
     */
    public function setTrainCallMode($trainCallMode)
    {
        $this->trainCallMode = $trainCallMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduleType()
    {
        return $this->scheduleType;
    }

    /**
     * @param $scheduleType
     *
     * @return $this
     */
    public function setScheduleType($scheduleType)
    {
        $this->scheduleType = $scheduleType;
        return $this;
    }

    /**
     * @return string
     */
    public function getSchedOriginStanox()
    {
        return $this->schedOriginStanox;
    }

    /**
     * @param $schedOriginStanox
     *
     * @return $this
     */
    public function setSchedOriginStanox($schedOriginStanox)
    {
        $this->schedOriginStanox = $schedOriginStanox;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduleWttId()
    {
        return $this->scheduleWttId;
    }

    /**
     * @param $scheduleWttId
     *
     * @return $this
     */
    public function setScheduleWttId($scheduleWttId)
    {
        $this->scheduleWttId = $scheduleWttId;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduleStartDate()
    {
        return $this->scheduleStartDate;
    }

    /**
     * @param $scheduleStartDate
     *
     * @return $this
     */
    public function setScheduleStartDate($scheduleStartDate)
    {
        $this->scheduleStartDate = $scheduleStartDate;
        return $this;
    }


}