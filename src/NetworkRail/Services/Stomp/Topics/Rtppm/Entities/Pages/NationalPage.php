<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Performance\Performance;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Sector;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator\Operator;

/**
 * Class NationalPage
 *
 * Contains the data found in the RTPPMData->NationalPage entity of
 * the RTPPM message.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class NationalPage extends BasePage
{
    /**
     * @var string
     */
    private $webMessageOfTheMoment;

    /**
     * @var string
     */
    private $staleFlag;

    /**
     * @var Sector[]
     */
    private $sectors = [];

    /**
     * @var Operator[]
     */
    private $operators = [];

    /**
     * @var Performance
     */
    private $performance;

    /**
     * Constructor
     *
     * Takes raw data from the JSON decoded ActiveMQ message.
     *
     * @param object $data
     */
    final function __construct($data)
    {
        parent::__construct($data);

        $this->setWebMessageOfTheMoment($data->WebMsgOfMoment)
            ->setStaleFlag($data->StaleFlag);

        $this->setPerformance(new Performance($data->NationalPPM));

        foreach ($data->Sector as $sector){
            $this->sectors[] = new Sector($sector);
        }

        foreach ($data->Operator as $operator){
            $this->operators[] = new Operator($operator);
        }

    }

    /**
     * @return string
     */
    public function getWebMessageOfTheMoment()
    {
        return $this->webMessageOfTheMoment;
    }

    /**
     * @param string $webMessageOfTheMoment
     *
     * @return $this
     */
    public function setWebMessageOfTheMoment($webMessageOfTheMoment)
    {
        $this->webMessageOfTheMoment = $webMessageOfTheMoment;
        return $this;
    }

    /**
     * @return string
     */
    public function getStaleFlag()
    {
        return $this->staleFlag;
    }

    /**
     * @param string $staleFlag
     *
     * @return $this
     */
    public function setStaleFlag($staleFlag)
    {
        $this->staleFlag = $staleFlag;
        return $this;
    }

    /**
     * @return Performance
     */
    public function getPerformance()
    {
        return $this->performance;
    }

    /**
     * @param Performance $performance
     *
     * @return $this
     */
    public function setPerformance($performance)
    {
        $this->performance = $performance;
        return $this;
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