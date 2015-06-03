<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements;

/**
 * Class Freight
 *
 * This Network Rail topic captures events from freight trains.  The
 * documentation notes that is is for: "All non-passenger train operating
 * company movements"
 *
 * @see http://nrodwiki.rockshore.net/index.php/Train_Movements
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class TrainMovementsFreightTopic extends TrainMovementsTopic
{

    final function __construct()
    {
        $this->setTopic("TRAIN_MVT_FREIGHT");
    }

}