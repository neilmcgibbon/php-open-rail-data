<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance\Performance;

/**
 * Class Operator
 *
 * This class attempts to encapsulate a generic "Operator" object as seen
 * in the RTPPM messages.  It seems to be a superset of a performance object,
 * containing things like Total, PPM and RollingPPM, but not including the
 * late, very late and cancelled properties.  However, for consistenct I have
 * opted to add the generic performance object as a child property of the
 * operator object. So entities such as code and key symbol will appear as
 * root properties, while things like PPM and "Total" [trains] will be part
 * of the ->performance private member.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class Operator
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $keySymbol;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Performance
     */
    private $performance;

    /**
     * Constructor
     *
     * Takes the raw data from the JSON decoded ActiveMQ message.
     *
     * @param object $data
     */
    final function __construct($data)
    {
        // Check property exists to protect against missing data.
        if (property_exists($data, "code"))
            $this->setCode($data->code);

        if (property_exists($data, "keySymbol"))
            $this->setKeySymbol($data->keySymbol);

        if (property_exists($data, "name"))
            $this->setName($data->name);

        $this->setPerformance(new Performance($data));
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
     * @return $this;
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getKeySymbol()
    {
        return $this->keySymbol;
    }

    /**
     * @param string $keySymbol
     *
     * @return $this;
     */
    public function setKeySymbol($keySymbol)
    {
        $this->keySymbol = $keySymbol;
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