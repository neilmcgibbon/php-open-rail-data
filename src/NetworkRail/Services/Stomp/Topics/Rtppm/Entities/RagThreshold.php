<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities;

/**
 * Class RagThreshold
 *
 * RAG Threshold definitions, pulled from the RTPPM message data.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class RagThreshold
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $mediumThreshold;

    /**
     * @var int
     */
    private $goodThreshold;

    /**
     * Constructor
     *
     * Raw data from ActiveMQ message
     *
     * @param object $data
     */
    final function __construct($data)
    {
        // Check property exists to protect against missing data.
        if (property_exists($data, "type"))
            $this->setType($data->type);

        if (property_exists($data, "medium"))
            $this->setMediumThreshold($data->medium);

        if (property_exists($data, "good"))
            $this->setGoodThreshold($data->good);

    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getMedium()
    {
        return $this->mediumThreshold;
    }

    /**
     * @param int $mediumThreshold
     *
     * @return $this
     */
    public function setMediumThreshold($mediumThreshold)
    {
        $this->mediumThreshold = (int)$mediumThreshold;
        return $this;
    }

    /**
     * @return int
     */
    public function getGoodThreshold()
    {
        return $this->goodThreshold;
    }

    /**
     * @param int $goodThreshold
     *
     * @return $this
     */
    public function setGoodThreshold($goodThreshold)
    {
        $this->goodThreshold = (int)$goodThreshold;
        return $this;
    }

}