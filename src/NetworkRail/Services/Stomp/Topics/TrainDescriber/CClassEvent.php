<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainDescriber;

use OpenRailData\Exceptions\UnknownMessageTypeException;


/**
 * Class CClassEvent
 *
 * According to the documentation wiki, this C Class messages "...provide
 * updates relating to the stepping of train descriptions between TD berths."
 *
 * The higher level documentation pertaining to ALL TD message (regardless
 * of message class defines the message types as:
 *
 * "The Train Describer feed provides low-level detail about the position of
 * trains and their train reporting number through a network of berths.
 * Usually, but not always, a berth is associated with a signal - but there
 * are locations (such as terminal platforms at stations) where there may be
 * more than one berth. From each berth, there are zero or more other berths
 * which a train description may step in to. A step between berths represents
 * movement of the train from one berth to another. Some of these steps may be
 * one-way, some may be two-way.
 *
 * To access the TD data feed, you must select and subscribe to the appropriate
 * geographical topic(s) on the My Feeds page on the Data Feeds website (see
 * the about the feeds page.)"
 *
 * @see http://nrodwiki.rockshore.net/index.php/C_Class_Messages
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainDescriber
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class CClassEvent extends TrainDescriberEvent
{

    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $timestamp;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $areaId;

    final function __construct($data)
    {
        $this->parseMessageType($data->msg_type);

        if (property_exists($data, "area_id"))
            $this->setAreaId($data->area_id);

        if (property_exists($data, "descr"))
            $this->setDescription($data->descr);

        if (property_exists($data, "from"))
            $this->setFrom($data->from);

        if (property_exists($data, "to"))
            $this->setTo($data->to);

        if (property_exists($data, "time"))
            $this->setTimestamp($data->time);

    }

    private function parseMessageType($messageType)
    {
        switch ($messageType) {
            case "CA": $this->setDescriberType("c_class.berth_step"); break;
            case "CB": $this->setDescriberType("c_class.berth_cancel"); break;
            case "CC": $this->setDescriberType("c_class.berth_interpose"); break;
            case "CT": $this->setDescriberType("c_class.heartbeat"); break;
            default:
                throw new UnknownMessageTypeException($messageType, __CLASS__);
                break;
        }

    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     *
     * @return $this
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     *
     * @return $this
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     *
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * @param string $areaId
     *
     * @return $this
     */
    public function setAreaId($areaId)
    {
        $this->areaId = $areaId;
        return $this;
    }

}