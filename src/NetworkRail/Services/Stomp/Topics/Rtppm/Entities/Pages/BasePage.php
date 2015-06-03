<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages;

/**
 * Class BasePage
 *
 * Encapsulates "generic" data found on most of the page elements
 * of the RTPPM message.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class BasePage
{
    /**
     * @var string
     */
    private $webDisplayPeriod;

    /**
     * @var string[]
     */
    private $webFixedMessages = [];

    /**
     * Constructor
     *
     * Takes raw data from the JSON decoded ActiveMQ message.
     *
     * @param object $data
     */
    public function __construct($data)
    {
        $this->setWebDisplayPeriod($data->WebDisplayPeriod)
            ->setWebFixedMessages([$data->WebFixedMsg1, $data->WebFixedMsg2]);

    }

    /**
     * @return string
     */
    public function getWebDisplayPeriod()
    {
        return $this->webDisplayPeriod;
    }

    /**
     * @param string $webDisplayPeriod
     *
     * @return $this
     */
    public function setWebDisplayPeriod($webDisplayPeriod)
    {
        $this->webDisplayPeriod = $webDisplayPeriod;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getWebFixedMessages()
    {
        return $this->webFixedMessages;
    }

    /**
     * @param string[] $webFixedMessages
     *
     * @return $this
     */
    public function setWebFixedMessages($webFixedMessages)
    {
        $this->webFixedMessages = $webFixedMessages;
        return $this;
    }


}