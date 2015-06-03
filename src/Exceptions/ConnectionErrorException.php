<?php

namespace OpenRailData\Exceptions;

use \Exception;

/**
 * Class ConnectionErrorException
 *
 * @package OpenRailData\Exceptions
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class ConnectionErrorException extends Exception
{
    function __construct($message)
    {
        $message = "OpenRailData connection error: " . ($message ? $message : "Unknown reason.");

        parent::__construct($message);
    }
}