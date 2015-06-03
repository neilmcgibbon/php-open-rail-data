<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Vstp;
use OpenRailData\NetworkRail\Services\Stomp\OpenRailDataEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Vstp\Entities\Segment;

/**
 * Class VstpEvent
 *
 * A VSTP schedule event is defined in the documentation as "The VSTP
 * (Very Short Term Planning) feed provides train schedules which are
 * due to run in the next 48 hours that aren't included in the SCHEDULE
 * feed."
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Vstp
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class VstpEvent extends OpenRailDataEvent
{

    /**
     * @var string
     */
    private $scheduleId;

    /**
     * @var string
     */
    private $transactionType;

    /**
     * @var string
     */
    private $scheduleStartDate;

    /**
     * @var string
     */
    private $scheduleEndDate;

    /**
     * @var string
     */
    private $scheduleDaysRuns;

    /**
     * @var string
     */
    private $applicableTimetable;

    /**
     * @var string
     */
    private $cifBankHolidayRunning;

    /**
     * @var string
     */
    private $cifTrainUid;

    /**
     * @var string
     */
    private $trainStatus;

    /**
     * @var string
     */
    private $cifStopIndicator;

    /**
     * @var Segment[]
     */
    private $scheduleSegments;

    final function __construct($data)
    {
        // Set the base data.
        $this->setScheduleId($data->schedule->schedule_id)
            ->setApplicableTimetable($data->schedule->applicable_timetable)
            ->setScheduleDaysRuns($data->schedule->schedule_days_runs)
            ->setCifBankHolidayRunning($data->schedule->CIF_bank_holiday_running)
            ->setCifStopIndicator($data->schedule->CIF_stp_indicator)
            ->setCifTrainUid($data->schedule->CIF_train_uid)
            ->setScheduleStartDate($data->schedule->schedule_start_date)
            ->setScheduleEndDate($data->schedule->schedule_end_date)
            ->setTrainStatus($data->schedule->train_status)
            ->setTransactionType($data->schedule->transaction_type);

        $segments = [];
        foreach ($data->schedule->schedule_segment as $segment) {
            $segments[] = new Segment($segment);
        }
        $this->setScheduleSegments($segments);
    }

    /**
     * @return string
     */
    public function getScheduleId()
    {
        return $this->scheduleId;
    }

    /**
     * @param string $scheduleId
     */
    public function setScheduleId($scheduleId)
    {
        $this->scheduleId = $scheduleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @param string $transactionType
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
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
     * @param string $scheduleStartDate
     */
    public function setScheduleStartDate($scheduleStartDate)
    {
        $this->scheduleStartDate = $scheduleStartDate;
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
     * @param string $scheduleEndDate
     */
    public function setScheduleEndDate($scheduleEndDate)
    {
        $this->scheduleEndDate = $scheduleEndDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduleDaysRuns()
    {
        return $this->scheduleDaysRuns;
    }

    /**
     * @param string $scheduleDaysRuns
     */
    public function setScheduleDaysRuns($scheduleDaysRuns)
    {
        $this->scheduleDaysRuns = $scheduleDaysRuns;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicableTimetable()
    {
        return $this->applicableTimetable;
    }

    /**
     * @param string $applicableTimetable
     */
    public function setApplicableTimetable($applicableTimetable)
    {
        $this->applicableTimetable = $applicableTimetable;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifBankHolidayRunning()
    {
        return $this->cifBankHolidayRunning;
    }

    /**
     * @param string $cifBankHolidayRunning
     */
    public function setCifBankHolidayRunning($cifBankHolidayRunning)
    {
        $this->cifBankHolidayRunning = $cifBankHolidayRunning;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifTrainUid()
    {
        return $this->cifTrainUid;
    }

    /**
     * @param string $cifTrainUid
     */
    public function setCifTrainUid($cifTrainUid)
    {
        $this->cifTrainUid = $cifTrainUid;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrainStatus()
    {
        return $this->trainStatus;
    }

    /**
     * @param string $trainStatus
     */
    public function setTrainStatus($trainStatus)
    {
        $this->trainStatus = $trainStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifStopIndicator()
    {
        return $this->cifStopIndicator;
    }

    /**
     * @param string $cifStopIndicator
     */
    public function setCifStopIndicator($cifStopIndicator)
    {
        $this->cifStopIndicator = $cifStopIndicator;
        return $this;
    }

    /**
     * @return Segment[]
     */
    public function getScheduleSegments()
    {
        return $this->scheduleSegments;
    }

    /**
     * @param Segment[] $scheduleSegments
     */
    public function setScheduleSegments($scheduleSegments)
    {
        $this->scheduleSegments = $scheduleSegments;
        return $this;
    }


}