<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages;

use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator\OperatorPageNode;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator\Operator;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator\ToleranceTotal;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Operator\ServiceGroup;

/**
 * Class OperatorPage
 *
 * Contains the data found in the RTPPMData->OperatorPage entity of
 * the RTPPM message.
 *
 * The "Operator Page" differs from the other "pages" in the RTPPM data
 * message in as much as the root property is a 0-indexed array of objects.
 * To keep consistency we treat this as a regular page (although the regular
 * properties will be null values) and then the array of various objects is
 * encapsulated in an Operator\OperatorPageNode class and stored in the
 * nodes property of this class.
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class OperatorPage extends BasePage
{
    /**
     * @var OperatorPageNode[]
     */
    private $nodes = [];

    /**
     * Constructor
     *
     * @param object $data
     */
    final function __construct($data)
    {
        foreach ($data as $v){

            // The node contains holders for operator, tolerance and service groups.
            $node = new OperatorPageNode();

            // If there is an operaor object (there should be) then set that on the node.
            if (property_exists($v, "Operator")) {
                $node->setOperator(new Operator($v->Operator));
            }

            // If there is a tolerance total object...
            if (property_exists($v, "OprToleranceTotal")) {

                // Tolerance totals can be singular or multiple, and the decoded message
                // will render an object if singular and an array of objects if multiple.
                // So we cast everything to an array here, before processing.
                if (is_object($v->OprToleranceTotal)) {
                    $v->OprToleranceTotal = [$v->OprToleranceTotal];
                }
                $tolerances = [];
                if (is_array($v->OprToleranceTotal)) {
                    foreach ($v->OprToleranceTotal as $toleranceTotal) {
                        $tolerances[] = new ToleranceTotal($toleranceTotal);
                    }
                }

                $node->setToleranceTotals($tolerances);
            }

            // If there is a service group object...
            if (property_exists($v, "OprServiceGrp")) {

                // Service Groups  can be singular or multiple, and the decoded message
                // will render an object if singular and an array of objects if multiple.
                // So we cast everything to an array here, before processing.
                if (is_object($v->OprServiceGrp)) {
                    $v->OprServiceGrp = [$v->OprServiceGrp];
                }
                $serviceGroups = [];
                if (is_array($v->OprToleranceTotal)) {
                    foreach ($v->OprServiceGrp as $operatorGroup) {
                        $serviceGroups[] = new ServiceGroup($operatorGroup);
                    }
                }
                $node->setServiceGroups($serviceGroups);
            }

            $this->nodes[] = $node;

        }

    }

}