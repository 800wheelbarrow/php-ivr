<?php
require_once '../vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();
$intro = $response->say('You\'ve reached The Police... hotline.');
$gather = $response->gather(['action' => 'keypress.php','input' => 'dtmf', 'timeout' => 5, 'numDigits' => 1, 'loop' => 0]);
$gather->say('For "De Do Do Do De Da Da Da", press 1. For "Every Breath You Take", press 2. For "Every Little Thing She Does Is Magic", press 3. ');
// $response->redirect('menu-main.php', ['method' => 'POST']);

echo $response;
