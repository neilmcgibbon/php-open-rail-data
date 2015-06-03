<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance;

/**
 * Class RollingPpm
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance
 */
class RollingPpm
{
    /**
     * @var string
     */
    private $rag;

    /**
     * @var string
     */
    private $trendInd;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $displayFlag;

    final function __construct($data)
    {
        if (property_exists($data, "rag"))
            $this->setRag($data->rag);

        if (property_exists($data, "trendInd"))
            $this->setTrendInd($data->trendInd);

        if (property_exists($data, "text"))
            $this->setText($data->text);

        if (property_exists($data, "displayFlag"))
            $this->setDisplayFlag($data->displayFlag);

    }

    /**
     * @return string
     */
    public function getRag()
    {
        return $this->rag;
    }

    /**
     * @param string $rag
     *
     * @return $this
     */
    public function setRag($rag)
    {
        $this->rag = $rag;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrendInd()
    {
        return $this->trendInd;
    }

    /**
     * @param string $trendInd
     *
     * @return $this
     */
    public function setTrendInd($trendInd)
    {
        $this->trendInd = $trendInd;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayFlag()
    {
        return $this->displayFlag;
    }

    /**
     * @param string $displayFlag
     *
     * @return $this
     */
    public function setDisplayFlag($displayFlag)
    {
        $this->displayFlag = $displayFlag;
        return $this;
    }

}