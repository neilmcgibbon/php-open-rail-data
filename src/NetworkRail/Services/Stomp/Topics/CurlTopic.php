<?php

namespace OpenRailData\Topics;

abstract class CurlTopic extends AbstractTopic
{
    protected $uri;

    /**
     * Set URL / URI
     *
     * @return $this
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * Get URL / URI
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Get communications type
     *
     * Required implementation of abstract parent definition.
     *
     * @return string
     */
    final public function getCommunicationType()
    {
        return self::COMMS_TYPE_STATIC;
    }

}