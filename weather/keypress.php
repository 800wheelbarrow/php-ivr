<?php
	$userEntry = $_REQUEST['Digits'];

	$url = 'http://api.openweathermap.org/data/2.5/weather?zip='.$userEntry.',us&appid=0c4a78aea41f8fdb7565a5ebf3b3fa05&units=imperial';
	$data = file_get_contents($url);
	$json = json_decode($data, true);
	
	$condition = $json['weather'][0]['main'];
	$temp = round($json['main']['temp']);
	$city = $json['name'];

	require_once '../vendor/autoload.php';
	use Twilio\Twiml;


	$speech = "In " . $city . ", the weather is " . $condition . ", and the temperature is " . $temp . " degrees.";
//	echo $condition;
//	echo $city;
//	echo $speech;

	$response = new Twiml();
	$intro = $response->say($speech);
	$pause = $response->pause(['length' => 2]);
	$response->redirect('../menu-main.php', ['method' => 'POST']);

	echo $response;

?>
