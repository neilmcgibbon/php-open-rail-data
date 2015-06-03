# php-open-rail-data

A PHP library to consume data from the Open Rail Data initiative.

At present only Stomp (ActiveMQ) data for Network Rail is supported, but I will be adding support for Static Network Rail data (such as Schedule) and Stomp support for National Rail in the near future.

## Installation
This is done via composer (packagist). Add the following to your composer.json file:
```json
{
  "require": {
     "neilmcgibbon/php-open-rail-data": "0.1.0"
  }
}
```

### Currently supported data feeds:

- **Network Rail**
	- ActiveMQ realtime feeds (via Stomp)
  		- [**RTPPM**](http://nrodwiki.rockshore.net/index.php/RTPPM) - Real Time Passenger Performance Measurements 
		- [**VSTP**](http://nrodwiki.rockshore.net/index.php/VSTP) - Very Short Term Planning
		- [**Train Movements**](http://nrodwiki.rockshore.net/index.php/Train_Movements) - Cancellations, Activations, Reinstatements, etc.
		- [**TD**](http://nrodwiki.rockshore.net/index.php/TD) - Train Describer events

###Feeds not yet supported

- **Network Rail**
	- ActiveMQ realtime feeds (via Stomp)
  		- [**TSR**](http://nrodwiki.rockshore.net/index.php/TSR) - Temporary Speed Restrictions
  	- Static feeds (via HTTP)
  		- [**Schedule**](http://nrodwiki.rockshore.net/index.php/SCHEDULE) - Schedule data
    	- [**Reference Data**](http://nrodwiki.rockshore.net/index.php/Reference_Data) - Reference data
    
- **National Rail**   
	- all feed types


## Usage:

### Stomp - Network Rail events

Events are processed via the observer / event dispatcher pattern
 
##### Example:

To listen for Real Time Passenger Performance Measurements (RTPPM events), and then dump out the number of late trains on the "National Page" level:

**Create the event listener**
```php
class ExampleEventListener
{

  public function onEventReceived(RtppmEvent $event)
  {
    echo "Received event. National page late trains count: ";
    echo $event->getNationalPage()->getPerformance()->getLateCount() . PHP_EOL;
  }
}
``` 

**Create the connection and start listening**
```php

$connection = new \OpenRailData\NetworkRail\Services\Stomp\Connection(
  "network_rail_username",
  "network_rail_password"
);

// Create the Topic.
$topic = new OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\RtppmTopic();

// Add our event listener to the topic
$topic->addListener(new ExampleEventListener());

// Subscribe to the topic by adding the topic to the connection
$connection->addTopic($topic);

// Start listening for events, the rest is handled by our event listener :-)
$connection->listen();
```

And thats it!

More documentation and functionality to follow.  Please also see the `/examples` dir for more examples.
