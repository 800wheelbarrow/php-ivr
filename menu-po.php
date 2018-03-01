<?php
require_once './vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();
$intro = $response->say('You\'ve reached The Police... hotline.');
$gather = $response->gather(['action' => 'keypress-po.php','input' => 'dtmf', 'timeout' => 5, 'numDigits' => 1]);
$gather->say('For, do do do, press 1. For, Every Breath you Take, press 2. For, Every Little Thing She Does Is Magic, press 3. ');
$response->redirect('menu-main.php', ['method' => 'POST']);

echo $response;
