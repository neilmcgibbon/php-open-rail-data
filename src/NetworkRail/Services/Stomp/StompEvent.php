<?php

namespace OpenRailData\NetworkRail\Services\Stomp;

use Symfony\Component\EventDispatcher\Event;

class StompEvent extends Event {

    private $data;

    final function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

}