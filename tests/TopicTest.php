
<?php

class TopicTest extends PHPUnit_Framework_TestCase
{
  public function setUp()
  {
  }

  public function testTopicConstructor()
  {

    $topic = new OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Rtppm();

    $this->assertInstanceOf('\OpenRailData\NetworkRail\Services\Stomp\Topics\AbstractTopic', $topic);


  }

}
