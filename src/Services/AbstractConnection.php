<?php

namespace OpenRailData\Services;

/**
 * Class Connection
 *
 * @package OpenRailData\Services
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
abstract class Connection
{
    protected $connection;

    public function getConnection()
    {
        return $this->connection;
    }

    public function setConnection($connection)
    {
        $this->connection = $connection;
        return $this;
    }
}
