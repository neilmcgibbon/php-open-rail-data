<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainDescriber;
use OpenRailData\NetworkRail\Services\Stomp\OpenRailDataEvent;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TopicEventNames;

abstract class TrainDescriberEvent extends OpenRailDataEvent
{

    /**
     * The parsed describer type for this C Class event.
     *
     * e.g. "c_class.berth_step" if message type is "CA";
     *
     * @var string
     */
    private $describerType;

    /**
     * @return string
     */
    public function getDescriberType()
    {
        return $this->describerType;
    }

    /**
     * @param string $describerType
     *
     * @return $this
     */
    public function setDescriberType($describerType)
    {
        $this->describerType = $describerType;
        return $this;
    }



}