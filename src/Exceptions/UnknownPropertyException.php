<?php

namespace OpenRailData\Exceptions;

use \Exception;

/**
 * Class UnknownPropertyException
 *
 * @package OpenRailData\Exceptions
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class UnknownPropertyException extends Exception
{
    function __construct($jsonProperty, $classProperty, $event)
    {
        $message = vsprintf("Unknown property '%s' (refactored to '%s') in %s event.", [
            $jsonProperty,
            $classProperty,
            $event,
        ]);
        parent::__construct($message);
    }
}