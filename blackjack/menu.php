<?php

require_once '../vendor/autoload.php';
use Twilio\Twiml;

$dealer = array(rand(1, 10),rand(1, 10),rand(1, 10),rand(1, 10));
$player = array(rand(1, 10),rand(1, 10));
$dealerCard = $dealer[0];
$playerTotal = array_sum($player);
$dealerTotal = array_sum($dealer);

// echo "You were dealt the ", $player[0], " and the ", $player[1], " for a total of ", $playerTotal, "<br />";
$playerResponse = "You were dealt the " . $player[0] . " and the " . $player[1] . " for a total of " . $playerTotal;
// echo $playerResponse;
// echo "The dealer is showing the ", $dealerCard, "<br />";
$dealerResponse = "The dealer is showing the ". $dealerCard;

// Print contents of array:
// print_r($dealer);
// Print one element in array:
// echo $dealer[1];

// Add another element to the array
// $player[] = rand(1, 10);
// print_r($player);

$response = new Twiml();
$intro = $response->say('Welcome to blackjack.');
$gather = $response->gather(['action' => 'keypress.php?player='.$playerTotal.'&dealer='.$dealerTotal,'input' => 'dtmf', 'timeout' => 10, 'numDigits' => 1]);
$gather->say($playerResponse);
$gather->say($dealerResponse);
$gather->say('Press 1 for another card. Press 2 to stay.');
$response->redirect('keypress.php?player='.$playerTotal.'&dealer='.$dealerTotal);
echo $response;
?>
