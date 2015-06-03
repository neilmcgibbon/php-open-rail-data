<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator\Operator;

/**
 * Class OocPage
 *
 * Contains the data found in the RTPPMData->OocPage entity of
 * the RTPPM message.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class OocPage extends BasePage
{
    /**
     * @var Operator[]
     */
    private $operators = [];

    /**
     * Constructor
     *
     * Takes raw object from JSON decoded ActiveMQ message.
     *
     * @param object $data
     */
    final function __construct($data)
    {
        parent::__construct($data);

        foreach ($data->Operator as $operator){
            $this->operators[] = new Operator($operator);
        }

    }

    /**
     * @return \OpenRailData\NetworkRail\Services\Stomp\Events\Rtppm\Operator\Operator[]
     */
    public function getOperators()
    {
        return $this->operators;
    }

    /**
     * @param \OpenRailData\NetworkRail\Services\Stomp\Events\Rtppm\Operator\Operator[]
     *
     * @return $this
     */
    public function setOperators(array $operators)
    {
        $this->operators = $operators;
        return $this;
    }



}