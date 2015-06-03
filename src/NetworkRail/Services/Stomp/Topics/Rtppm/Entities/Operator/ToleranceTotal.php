<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance\Performance;

/**
 * Class ToleranceTotal
 *
 * Tolerance totals are found as children of an Operator wrapper in the
 * "Operator Page" section of the RTPPM message.  An operator wrapper
 * can have one ore more tolerance totals, which are essentially performance
 * objects (PPM, RollingPPM, etc) with an additional timeband property.
 * Therefore the performance related data rests in a child property ($performance)
 * and the extra "timeband" property sits at the top level.
 *
 * To access the timeband, one would use:
 *
 *   $object->getTimeband();
 *
 * To access performance related data, e.g. Rolling PPm, one would use:
 *
 *   $object->getPerformance()->getRollingPpm();
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class ToleranceTotal
{
    /**
     * @var Performance
     */
    private $performance;

    /**
     * @var string
     */
    private $timeband;

    /**
     * Constructor
     *
     * Uses raw data from the ActiveMQ message.
     *
     * @param object $data
     */
    final function __construct($data)
    {

        if (property_exists($data, "timeband"))
            $this->setTimeband($data->timeband);

        $this->setPerformance(new Performance($data));


    }

    /**
     * @return string
     */
    public function getTimeband()
    {
        return $this->timeband;
    }

    /**
     * @param string $timeband
     *
     * @return $this;
     */
    public function setTimeband($timeband)
    {
        $this->timeband = $timeband;
        return $this;
    }

    /**
     * @return Performance
     */
    public function getPerformance()
    {
        return $this->performance;
    }

    /**
     * @param Performance $performance
     *
     * @return $this;
     */
    public function setPerformance(Performance $performance)
    {
        $this->performance = $performance;
        return $this;
    }

}