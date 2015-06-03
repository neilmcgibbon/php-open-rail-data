<?php

namespace OpenRailData\Exceptions;

use \Exception;

/**
 * Class IncompatibleTopicException
 *
 * @package OpenRailData\Exceptions
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class IncompatibleTopicException extends Exception
{
  function __construct($message)
  {
    parent::__construct($message);
  }
}