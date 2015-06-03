<?php

namespace OpenRailData\Services;

use OpenRailData\Exceptions\ServiceNotFound;

/**
 * Class Factory
 *
 * @package OpenRailData\Services
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class Factory {

    public static function create($provider, $service)
    {
        $class = "\\OpenRailData\\Services\\" . $provider . "\\" . $service;
        if (!class_exists($class)) {
            throw new ServiceNotFound();
        }

        $instantiation = new $class();
        return $instantiation;
    }
}