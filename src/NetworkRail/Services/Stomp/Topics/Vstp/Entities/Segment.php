<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Vstp\Entities;

/**
 * Class Segment
 *
 * The schedule segment object that fills the "Schedule Segment" array
 * of the VSTP root object.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Vstp\Entities
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class Segment
{

    /**
     * @var string
     */
    private $signallingId;

    /**
     * @var string
     */
    private $uicCode;

    /**
     * @var string
     */
    private $atocCode;

    /**
     * @var string
     */
    private $cifTrainCategory;

    /**
     * @var string
     */
    private $cifHeadcode;

    /**
     * @var string
     */
    private $cifCourseIndicator;

    /**
     * @var string
     */
    private $cifTrainServiceCode;

    /**
     * @var string
     */
    private $cifBusinessSector;

    /**
     * @var string
     */
    private $cifPowerType;

    /**
     * @var string
     */
    private $cifTimingLoad;

    /**
     * @var string
     */
    private $cifSpeed;

    /**
     * @var string
     */
    private $cifOperatingCharacteristics;

    /**
     * @var string
     */
    private $cifTrainClass;

    /**
     * @var string
     */
    private $cifSleepers;

    /**
     * @var string
     */
    private $cifReservations;

    /**
     * @var string
     */
    private $cifConnectionIndicator;

    /**
     * @var string
     */
    private $cifCateringCode;

    /**
     * @var string
     */
    private $cifServiceBranding;

    /**
     * @var string
     */
    private $cifTractionClass;

    /**
     * @var ScheduleLocation[]
     */
    private $scheduleLocations;

    final function __construct($data)
    {
        $this->setSignallingId($data->signalling_id)
            ->setUicCode($data->uic_code)
            ->setAtocCode($data->atoc_code)
            ->setCifTrainCategory($data->CIF_train_category)
            ->setCifHeadcode($data->CIF_headcode)
            ->setCifCourseIndicator($data->CIF_course_indicator)
            ->setCifTrainServiceCode($data->CIF_train_service_code)
            ->setCifBusinessSector($data->CIF_business_sector)
            ->setCifPowerType($data->CIF_power_type)
            ->setCifTimingLoad($data->CIF_timing_load)
            ->setCifSpeed($data->CIF_speed)
            ->setCifOperatingCharacteristics($data->CIF_operating_characteristics)
            ->setCifTrainClass($data->CIF_train_class)
            ->setCifSleepers($data->CIF_sleepers)
            ->setCifReservations($data->CIF_reservations)
            ->setCifConnectionIndicator($data->CIF_connection_indicator)
            ->setCifCateringCode($data->CIF_catering_code)
            ->setCifServiceBranding($data->CIF_service_branding)
            ->setCifTractionClass($data->CIF_traction_class);

        $scheduleLocations = [];
        foreach ($data->schedule_location as $location) {
            $scheduleLocations[] = new ScheduleLocation($location);
        }
        $this->setScheduleLocations($scheduleLocations);
    }

    /**
     * @return string
     */
    public function getSignallingId()
    {
        return $this->signallingId;
    }

    /**
     * @param string $signallingId
     */
    public function setSignallingId($signallingId)
    {
        $this->signallingId = $signallingId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUicCode()
    {
        return $this->uicCode;
    }

    /**
     * @param string $uicCode
     */
    public function setUicCode($uicCode)
    {
        $this->uicCode = $uicCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getAtocCode()
    {
        return $this->atocCode;
    }

    /**
     * @param string $atocCode
     */
    public function setAtocCode($atocCode)
    {
        $this->atocCode = $atocCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifTrainCategory()
    {
        return $this->cifTrainCategory;
    }

    /**
     * @param string $cifTrainCategory
     */
    public function setCifTrainCategory($cifTrainCategory)
    {
        $this->cifTrainCategory = $cifTrainCategory;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifHeadcode()
    {
        return $this->cifHeadcode;
    }

    /**
     * @param string $cifHeadcode
     */
    public function setCifHeadcode($cifHeadcode)
    {
        $this->cifHeadcode = $cifHeadcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifCourseIndicator()
    {
        return $this->cifCourseIndicator;
    }

    /**
     * @param string $cifCourseIndicator
     */
    public function setCifCourseIndicator($cifCourseIndicator)
    {
        $this->cifCourseIndicator = $cifCourseIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifTrainServiceCode()
    {
        return $this->cifTrainServiceCode;
    }

    /**
     * @param string $cifTrainServiceCode
     */
    public function setCifTrainServiceCode($cifTrainServiceCode)
    {
        $this->cifTrainServiceCode = $cifTrainServiceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifBusinessSector()
    {
        return $this->cifBusinessSector;
    }

    /**
     * @param string $cifBusinessSector
     */
    public function setCifBusinessSector($cifBusinessSector)
    {
        $this->cifBusinessSector = $cifBusinessSector;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifPowerType()
    {
        return $this->cifPowerType;
    }

    /**
     * @param string $cifPowerType
     */
    public function setCifPowerType($cifPowerType)
    {
        $this->cifPowerType = $cifPowerType;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifTimingLoad()
    {
        return $this->cifTimingLoad;
    }

    /**
     * @param string $cifTimingLoad
     */
    public function setCifTimingLoad($cifTimingLoad)
    {
        $this->cifTimingLoad = $cifTimingLoad;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifSpeed()
    {
        return $this->cifSpeed;
    }

    /**
     * @param string $cifSpeed
     */
    public function setCifSpeed($cifSpeed)
    {
        $this->cifSpeed = $cifSpeed;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifOperatingCharacteristics()
    {
        return $this->cifOperatingCharacteristics;
    }

    /**
     * @param string $cifOperatingCharacteristics
     */
    public function setCifOperatingCharacteristics($cifOperatingCharacteristics)
    {
        $this->cifOperatingCharacteristics = $cifOperatingCharacteristics;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifTrainClass()
    {
        return $this->cifTrainClass;
    }

    /**
     * @param string $cifTrainClass
     */
    public function setCifTrainClass($cifTrainClass)
    {
        $this->cifTrainClass = $cifTrainClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifSleepers()
    {
        return $this->cifSleepers;
    }

    /**
     * @param string $cifSleepers
     */
    public function setCifSleepers($cifSleepers)
    {
        $this->cifSleepers = $cifSleepers;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifReservations()
    {
        return $this->cifReservations;
    }

    /**
     * @param string $cifReservations
     */
    public function setCifReservations($cifReservations)
    {
        $this->cifReservations = $cifReservations;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifConnectionIndicator()
    {
        return $this->cifConnectionIndicator;
    }

    /**
     * @param string $cifConnectionIndicator
     */
    public function setCifConnectionIndicator($cifConnectionIndicator)
    {
        $this->cifConnectionIndicator = $cifConnectionIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifCateringCode()
    {
        return $this->cifCateringCode;
    }

    /**
     * @param string $cifCateringCode
     */
    public function setCifCateringCode($cifCateringCode)
    {
        $this->cifCateringCode = $cifCateringCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifServiceBranding()
    {
        return $this->cifServiceBranding;
    }

    /**
     * @param string $cifServiceBranding
     */
    public function setCifServiceBranding($cifServiceBranding)
    {
        $this->cifServiceBranding = $cifServiceBranding;
        return $this;
    }

    /**
     * @return string
     */
    public function getCifTractionClass()
    {
        return $this->cifTractionClass;
    }

    /**
     * @param string $cifTractionClass
     */
    public function setCifTractionClass($cifTractionClass)
    {
        $this->cifTractionClass = $cifTractionClass;
        return $this;
    }

    /**
     * @return ScheduleLocation
     */
    public function getScheduleLocations()
    {
        return $this->scheduleLocations;
    }

    /**
     * @param ScheduleLocation $scheduleLocations
     */
    public function setScheduleLocations($scheduleLocations)
    {
        $this->scheduleLocations = $scheduleLocations;
        return $this;
    }





}