<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance;

/**
 * Class Performance
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance
 */
class Performance
{
    /**
     * @var int
     */
    private $totalCount;

    /**
     * @var int
     */
    private $onTimeCount;

    /**
     * @var int
     */
    private $lateCount;

    /**
     * @var int
     */
    private $cancelledOrVeryLateCount;

    /**
     * @var Ppm
     */
    private $ppm;

    /**
     * @var RollingPpm
     */
    private $rollingPpm;

    public function __construct($data)

    {
        if (property_exists($data, "Total"))
            $this->setTotalCount($data->Total);

        if (property_exists($data, "OnTime"))
            $this->setOnTimeCount($data->OnTime);

        if (property_exists($data, "Late"))
            $this->setLateCount($data->Late);

        if (property_exists($data, "CancelVeryLate"))
            $this->setCancelledOrVeryLateCount($data->CancelVeryLate);

        if (property_exists($data, "PPM"))
            $this->setPpm(new Ppm($data->PPM));

        if (property_exists($data, "RollingPPM"))
            $this->setRollingPpm(new RollingPpm($data->RollingPPM));

    }
    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     *
     * @return $this;
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = (int)$totalCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getOnTimeCount()
    {
        return $this->onTimeCount;
    }

    /**
     * @param int $onTimeCount
     *
     * @return $this;
     */
    public function setOnTimeCount($onTimeCount)
    {
        $this->onTimeCount = (int)$onTimeCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getLateCount()
    {
        return $this->lateCount;
    }

    /**
     * @param int $lateCount
     *
     * @return $this;
     */
    public function setLateCount($lateCount)
    {
        $this->lateCount = (int)$lateCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getCancelledOrVeryLateCount()
    {
        return $this->cancelledOrVeryLateCount;
    }

    /**
     * @param int $cancelledOrVeryLateCount
     *
     * @return $this;
     */
    public function setCancelledOrVeryLateCount($cancelledOrVeryLateCount)
    {
        $this->cancelledOrVeryLateCount = (int)$cancelledOrVeryLateCount;
        return $this;
    }

    /**
     * @return Ppm
     */
    public function getPpm()
    {
        return $this->ppm;
    }

    /**
     * @param Ppm $ppm
     *
     * @return $this
     */
    public function setPpm(Ppm $ppm)
    {
        $this->ppm = $ppm;
        return $this;
    }

    /**
     * @return RollingPpm
     */
    public function getRollingPpm()
    {
        return $this->rollingPpm;
    }

    /**
     * @param RollingPpm $rollingPpm
     *
     * @return $this
     */
    public function setRollingPpm(RollingPpm $rollingPpm)
    {
        $this->rollingPpm = $rollingPpm;
        return $this;
    }

}