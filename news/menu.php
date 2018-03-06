<?php

require_once './vendor/autoload.php';
use Twilio\Twiml;

$url = "https://www.npr.org/rss/podcast.php?id=500005";
$xml = simplexml_load_file($url);  

// var_dump($xml->channel->item);
$stream = $xml->channel->item->enclosure['url'];
// echo $stream;

$response = new Twiml();
$intro = $response->say('Here is the latest news update from NPR.');
$response->play(''.$stream.'');
$response->redirect('../menu-main.php', ['method' => 'POST']);
echo $response;
 
?>

