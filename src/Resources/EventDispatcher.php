<?php

namespace OpenRailData\Resources;

/**
 * Class EventDispatcher
 *
 * Singleton.
 *
 * @package OpenRailData\Resources
 */
class EventDispatcher {

    private static $dispatcher;

    public static function get()
    {
        if (!self::$dispatcher) {
            self::$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
        }

        return self::$dispatcher;
    }
}