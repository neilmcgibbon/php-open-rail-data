<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance\Performance;


/**
 * Class Sector
 *
 * This class defines a sector object as found in the "National Page" entity
 * of the RTPPM message.
 *
 * As with other properties (such as operator and tolerance) the performance
 * related figures are found inside a Performance object of this class (for
 * data such as PPM, etc).
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class Sector {

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $code;

    /**
     * @var
     */
    private $performance;

    final function __construct($data)
    {
        $this->setCode($data->sectorCode)
            ->setDescription($data->sectorDesc)
            ->setPerformance(new Performance($data->SectorPPM));

    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
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
     * @return $this
     */
    public function setPerformance(Performance $performance)
    {
        $this->performance = $performance;
        return $this;
    }

}