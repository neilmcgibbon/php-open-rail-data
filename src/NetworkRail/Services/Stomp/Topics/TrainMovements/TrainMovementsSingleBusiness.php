<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements;

use OpenRailData\NetworkRail\Services\Stomp\Topics\AbstractTopic;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TopicEventNames;

/**
 * Class ForBusiness
 *
 * This Network Rail topic captures movement events for a given business,
 * as provided by the list of codes on the documentation.  The documentation
 * notes that is is for: "Train movement messages for XX TOC."
 *
 * The Business Codes are provided with this library, as class constants in
 * OpenRailData\Codes\BusinessCodes. Therefore to instantiate this topic,
 * one should choose a company code and pass it as the single argument. e.g.
 * for reporting movements (incl. cancellations, etc, for the Caledonian
 * Sleeper train services:
 *
 * $topic = new ForBusiness(BusinessCodes::CALEDONIAN_SLEEPER);
 *
 * To subscribe to all businesses, please use the AllBusinesses() class instead.
 *
 * @see http://nrodwiki.rockshore.net/index.php/Train_Movements
 * @see http://nrodwiki.rockshore.net/index.php/TOC_Codes
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class TrainMovementsSingleBusinessTopic extends TrainMovementsTopic
{

    final function __construct($businessCode)
    {
        $this->setTopic("TRAIN_MVT_" . $businessCode . "_TOC");
    }

}