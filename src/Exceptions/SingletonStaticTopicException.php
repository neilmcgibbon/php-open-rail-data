<?php

namespace OpenRailData\Exceptions;

use \Exception;

/**
 * Class SingletonStaticTopicException
 *
 * @package OpenRailData\Exceptions
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class SingletonStaticTopicException extends Exception
{
    function __construct()
    {
        parent::__construct("Curl/Static connections only support a single topic per connection.");
    }
}