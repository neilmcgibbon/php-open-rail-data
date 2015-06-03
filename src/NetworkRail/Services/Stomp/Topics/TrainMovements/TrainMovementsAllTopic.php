<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements;

/**
 * Class AllBusinesses
 *
 * This Network Rail topic captures movement events for all businesses in the
 * Network Rail "TRUST" system, including cancellations, reinstatements, etc.
 * To subscribe to data for just one business, please use the ForBusiness()
 * topic class instead.
 *
 * @see http://nrodwiki.rockshore.net/index.php/Train_Movements
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class TrainMovementsAllTopic extends TrainMovementsTopic
{

    final function __construct()
    {
        $this->setTopic("TRAIN_MVT_ALL_TOC");
    }

}