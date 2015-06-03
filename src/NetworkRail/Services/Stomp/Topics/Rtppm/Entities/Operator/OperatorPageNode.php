<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator;

/**
 * Class OperatorPageNode
 *
 * The "Operator Page" is an array of Operators, with operator service
 * groups and tolerance totals outside the operator object.  For this
 * reason this class encapsulates the operator object, the tolerance
 * totals and the service groups.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class OperatorPageNode {

    /**
     * @var Operator
     */
    private $operator;

    /**
     * @var ToleranceTotal[]
     */
    private $toleranceTotals;

    /**
     * @var ServiceGroup[]
     */
    private $serviceGroups;

    final function __construct()
    {
        ;
    }

    /**
     * @return Operator
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param Operator $operator
     *
     * @return $this
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @return ToleranceTotal
     */
    public function getToleranceTotals()
    {
        return $this->toleranceTotals;
    }

    /**
     * @param ToleranceTotal[] $toleranceTotals
     *
     * @return $this
     */
    public function setToleranceTotals($toleranceTotals)
    {
        $this->toleranceTotals = $toleranceTotals;
        return $this;
    }

    /**
     * @return ServiceGroup[]
     */
    public function getServiceGroups()
    {
        return $this->serviceGroups;
    }

    /**
     * @param ServiceGroup[] $serviceGroups
     *
     * @return $this
     */
    public function setServiceGroups($serviceGroups)
    {
        $this->serviceGroups = $serviceGroups;
        return $this;
    }



}