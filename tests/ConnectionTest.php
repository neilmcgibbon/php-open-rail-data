
<?php

class ConnectionTest extends PHPUnit_Framework_TestCase
{
  public function setUp()
  {
  }

  public function testConnectionConstructor()
  {

    // Create the Stomp connection (note that this does not actually connect at this stage);
    $connection = new \OpenRailData\NetworkRail\Services\Stomp\Connection(
      "test_user_name",
      "test_password"
    );

    $this->assertInstanceOf('\OpenRailData\NetworkRail\Services\Stomp\Connection', $connection);


  }

}
