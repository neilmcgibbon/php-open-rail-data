<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance\Performance;

/**
 * Class ServiceGroup
 *
 * The service group is found in the "Operator Page" of the RTPPM message.
 * It contains unique properties such as sector code and timeband, but also
 * includes entities such as common PPM or RollingPPM objects.  For this
 * reason the performance related figures rest in a Performance object as a
 * child of this class.  I.e. to access PPM one would reference it thus:
 *
 * $object->getPerformance()->getPpm()
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class ServiceGroup
{

    /**
     * @var string
     */
    private $timeband;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $sectorCode;

    /**
     * @var Performance
     */
    private $performance;

    /**
     * Constructor
     *
     * Takes raw data from the ActiveMQ message.
     *
     * @param object $data
     */
    final function __construct($data)
    {

        // Check property exists to protect against missing data.
        if (property_exists($data, "timeband"))
            $this->setTimeband($data->timeband);

        if (property_exists($data, "name"))
            $this->setName($data->name);

        if (property_exists($data, "sectorCode"))
            $this->setSectorCode($data->sectorCode);

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this;
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSectorCode()
    {
        return $this->sectorCode;
    }

    /**
     * @param string $sectorCode
     *
     * @return $this;
     */
    public function setSectorCode($sectorCode)
    {
        $this->sectorCode = $sectorCode;
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