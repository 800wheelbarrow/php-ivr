<?php

require_once '../vendor/autoload.php';
use Twilio\Twiml;

$dealer = array(rand(1, 10),rand(1, 10));
$player = array(rand(1, 10),rand(1, 10));
$dealerCard = $dealer[0];
$playerTotal = array_sum($player);
$dealerTotal = array_sum($dealer);

$suits = array("clubs", "diamonds", "hearts", "spades");
$randomSuit1 = $suits[rand(0,3)];
$randomSuit2 = $suits[rand(0,3)];
$dealerSuit = $suits[rand(0,3)];

$playerResponse = "You were dealt the " . $player[0] . " of " . $randomSuit1 . " and the " . $player[1] . " of " . $randomSuit2 . " for a total of " . $playerTotal;

$dealerResponse = "The dealer is showing the ". $dealerCard . " of " . $dealerSuit;

// Print contents of array:
// print_r($dealer);

$response = new Twiml();
$intro = $response->say('Welcome to blackjack.');
$gather = $response->gather(['action' => 'keypress.php?player='.$playerTotal.'&dealer='.$dealerTotal,'input' => 'dtmf', 'timeout' => 10, 'numDigits' => 1]);
$gather->say($playerResponse);
$gather->say($dealerResponse);
$gather->say('Press 1 for another card. Press 2 to stay. Press any other key to return to the main menu.');
$response->redirect('keypress.php?player='.$playerTotal.'&dealer='.$dealerTotal.'&Digits=2');
echo $response;
?>
