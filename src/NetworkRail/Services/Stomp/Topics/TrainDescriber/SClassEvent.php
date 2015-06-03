<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainDescriber;
use OpenRailData\Exceptions\UnknownMessageTypeException;

/**
 * Class SClassEvent
 *
 * According to the documentation wiki, this C Class messages "...provide
 * updates relating to the status of signalling equipment within a train
 * describer area. Not all TD areas provide this information."
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
 * @see http://nrodwiki.rockshore.net/index.php/S_Class_Messages
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainDescriber
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class SClassEvent extends TrainDescriberEvent
{

    /**
     * @var string
     */
    private $data;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $timestamp;

    /**
     * @var string
     */
    private $areaId;

    final function __construct($data)
    {

        $this->parseMessageType($data->msg_type);

        if (property_exists($data, "area_id"))
            $this->setAreaId($data->area_id);

        if (property_exists($data, "data"))
            $this->setData($data->data);

        if (property_exists($data, "address"))
            $this->setAddress($data->address);

        if (property_exists($data, "time"))
            $this->setTimestamp($data->time);

    }

    private function parseMessageType($messageType)
    {

        switch ($messageType) {
            case "SF": $this->setDescriberType("s_class.signalling_update"); break;
            case "SG": $this->setDescriberType("s_class.signalling_refresh"); break;
            case "SH": $this->setDescriberType("s_class.signalling_refresh_finished"); break;
            default:
                throw new UnknownMessageTypeException($messageType, __CLASS__);
                break;
        }

    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
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