<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements;


/**
 * Class General
 *
 * According to the documentation, this Network Rail topic is for "Change of
 * Identity messages for freight trains". This being the case, the naming of
 * the topic (and therefore this class) is probably something of a misnomer,
 * as "general" does not really encapsulate that concept.
 *
 * @see http://nrodwiki.rockshore.net/index.php/Train_Movements
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class TrainMovementsGeneralTopic extends TrainMovementsTopic
{

    final function __construct()
    {
        $this->setTopic("TRAIN_MVT_GENERAL");
    }

}