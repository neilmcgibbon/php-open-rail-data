<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance;

/**
 * Class Ppm
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance
 */
class Ppm
{
    /**
     * @var string
     */
    private $rag;

    /**
     * @var string
     */
    private $ragDisplayFlag;

    /**
     * @var string
     */
    private $text;

    final function __construct($data)
    {
        if (property_exists($data, "rag"))
            $this->setRag($data->rag);

        if (property_exists($data, "ragDisplayFlag"))
            $this->setRagDisplayFlag($data->ragDisplayFlag);

        if (property_exists($data, "text"))
            $this->setText($data->text);

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
    public function getRagDisplayFlag()
    {
        return $this->ragDisplayFlag;
    }

    /**
     * @param string $ragDisplayFlag
     *
     * @return $this
     */
    public function setRagDisplayFlag($ragDisplayFlag)
    {
        $this->ragDisplayFlag = $ragDisplayFlag;
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

}