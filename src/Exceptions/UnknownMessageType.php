<?php

namespace OpenRailData\Exceptions;

use \Exception;

/**
 * Class UnknownMessageTypeException
 *
 * @package OpenRailData\Exceptions
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class UnknownMessageTypeException extends Exception
{
    function __construct($typeKey, $event)
    {
        $message = vsprintf("Unknown type '%s' in %s event.", [
            $typeKey,
            $event,
        ]);
        parent::__construct($message);
    }
}