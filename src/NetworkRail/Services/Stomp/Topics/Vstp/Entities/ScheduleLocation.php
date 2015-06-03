<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Vstp\Entities;

/**
 * Class ScheduleLocation
 *
 * The location object that fills the "Schedule Locations" array
 * of the VSTP Segment.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Vstp\Entities
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class ScheduleLocation
{
    /**
     * @var string
     */
    private $scheduledArrivalTime;

    /**
     * @var string
     */
    private $scheduledDepartureTime;

    /**
     * @var string
     */
    private $scheduledPassTime;

    /**
     * @var string
     */
    private $publicArrivalTime;

    /**
     * @var string
     */
    private $publicDepartureTime;

    /**
     * @var string
     */
    private $cifPlatform;

    /**
     * @var string
     */
    private $cifLine;

    /**
     * @var string
     */
    private $cifPath;

    /**
     * @var string
     */
    private $cifActivity;

    /**
     * @var string
     */
    private $cifEngineeringAllowance;

    /**
     * @var string
     */
    private $cifPathingAllowance;

    /**
     * @var string
     */
    private $cifPerformanceAllowance;

    /**
     * @var string
     */
    private $tiplocId;

    final function __construct($data)
    {

        $this->setScheduledArrivalTime($data->scheduled_arrival_time)
            ->setScheduledDepartureTime($data->scheduled_departure_time)
            ->setScheduledPassTime($data->scheduled_pass_time)
            ->setPublicArrivalTime($data->public_arrival_time)
            ->setPublicDepartureTime($data->public_departure_time)
            ->setCifPlatform($data->CIF_platform)
            ->setCifLine($data->CIF_line)
            ->setCifPath($data->CIF_path)
            ->setCifActivity($data->CIF_activity)
            ->setCifEngineeringAllowance($data->CIF_engineering_allowance)
            ->setCifPathingAllowance($data->CIF_pathing_allowance)
            ->setCifPerformanceAllowance($data->CIF_performance_allowance)
            ->setTiplocId($data->location->tiploc->tiploc_id);

    }

    /**
     * @return string
     */
    public function getScheduledArrivalTime()
    {
        return $this->scheduledArrivalTime;
    }

    /**
     * @param string $scheduledArrivalTime
     */
    public function setScheduledArrivalTime($scheduledArrivalTime)
    {
        $this->scheduledArrivalTime = $scheduledArrivalTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduledDepartureTime()
    {
        return $this->scheduledDepartureTime;
    }

    /**
     * @param string $scheduledDepartureTime
     */
    public function setScheduledDepartureTime($scheduledDepartureTime)
    {
        $this->scheduledDepartureTime = $scheduledDepartureTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduledPassTime()
    {
        return $this->scheduledPassTime;
    }

    /**
     * @param string $scheduledPassTime
     */
    public function setScheduledPassTime($scheduledPassTime)
    {
        $this->scheduledPassTime = $scheduledPassTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicArrivalTime()
    {
        return $this->publicArrivalTime;
    }

    /**
     * @param string $publicArrivalTime
     */
    public function setPublicArrivalTime($publicArrivalTime)
    {
        $this->publicArrivalTime = $publicArrivalTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicDepartureTime()
    {
        return $this->publicDepartureTime;
    }

    /**
     * @param string $publicDepartureTime
     */
    public function setPublicDepartureTime($publicDepartureTime)
    {
        $this->publicDepartureTime = $publicDepartureTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifPlatform()
    {
        return $this->cifPlatform;
    }

    /**
     * @param string $cifPlatform
     */
    public function setCifPlatform($cifPlatform)
    {
        $this->cifPlatform = $cifPlatform;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifLine()
    {
        return $this->cifLine;
    }

    /**
     * @param string $cifLine
     */
    public function setCifLine($cifLine)
    {
        $this->cifLine = $cifLine;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifPath()
    {
        return $this->cifPath;
    }

    /**
     * @param string $cifPath
     */
    public function setCifPath($cifPath)
    {
        $this->cifPath = $cifPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifActivity()
    {
        return $this->cifActivity;
    }

    /**
     * @param string $cifActivity
     */
    public function setCifActivity($cifActivity)
    {
        $this->cifActivity = $cifActivity;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifEngineeringAllowance()
    {
        return $this->cifEngineeringAllowance;
    }

    /**
     * @param string $cifEngineeringAllowance
     */
    public function setCifEngineeringAllowance($cifEngineeringAllowance)
    {
        $this->cifEngineeringAllowance = $cifEngineeringAllowance;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifPathingAllowance()
    {
        return $this->cifPathingAllowance;
    }

    /**
     * @param string $cifPathingAllowance
     */
    public function setCifPathingAllowance($cifPathingAllowance)
    {
        $this->cifPathingAllowance = $cifPathingAllowance;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifPerformanceAllowance()
    {
        return $this->cifPerformanceAllowance;
    }

    /**
     * @param string $cifPerformanceAllowance
     */
    public function setCifPerformanceAllowance($cifPerformanceAllowance)
    {
        $this->cifPerformanceAllowance = $cifPerformanceAllowance;
        return $this;
    }

    /**
     * @return string
     */
    public function getTiplocId()
    {
        return $this->tiplocId;
    }

    /**
     * @param string $tiplocId
     */
    public function setTiplocId($tiplocId)
    {
        $this->tiplocId = $tiplocId;
        return $this;
    }



}