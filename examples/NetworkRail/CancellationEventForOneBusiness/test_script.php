<?php

require_once(__DIR__ . '/../../../vendor/autoload.php');

/**
 * For this example we want to get all train movement events for all businesses.
 * The process to achieve this:
 *
 * - Create an event listener that will process the TrainMovement event.
 *   - This event listener is in the same folder, as ExampleEventListener.php
 * - Create the train movements topic for all businesses.
 * - Pass the event listener to the topic.
 * - Connect to Network Rail ActiveMQ server
 * - Subscribe to the relevant queue, using the topic object we created.
 * - Start listening for events on the connection.
 *
 */

use OpenRailDataExamples\NetworkRail\CancellationEventForOneBusiness\ExampleEventListener;
use OpenRailData\NetworkRail\Services\Stomp\Topics\TrainMovements\TrainMovementsSingleBusinessTopic;
use OpenRailData\NetworkRail\Codes\BusinessCodes;

// Create the Stomp connection (note that this does not actually connect at this stage);
$connection = new \OpenRailData\NetworkRail\Services\Stomp\Connection(
  "network_rail_username",
  "network_rail_password"
);

// Create the Topic.
$topic = new TrainMovementsSingleBusinessTopic(BusinessCodes::C2C);

// Add our event listener to the topic
$topic->addListener(new ExampleEventListener());

// Subscribe to the topic by adding the topic to the connection
$connection->addTopic($topic);

// Start listening for events, the rest is handled by our event listener :-)
$connection->listen();


?>