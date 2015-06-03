<?php

namespace OpenRailData\Exceptions;

use \Exception;

/**
 * Class ServiceNotFoundException
 *
 * @package OpenRailData\Exceptions
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class ServiceNotFoundException extends Exception
{
  function __construct()
  {
    parent::__construct();
  }
}