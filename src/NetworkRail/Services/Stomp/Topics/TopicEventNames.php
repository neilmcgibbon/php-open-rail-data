<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics;


abstract class TopicEventNames
{

    const RTPPM            = "network_rail.stomp.rtppm";
    const TRAIN_DESCRIBER  = "network_rail.stomp.train_describer";
    const TRAIN_MOVEMENTS  = "network_rail.stomp.train_movements";
    const VSTP             = "network_rail.stomp.vstp";
}