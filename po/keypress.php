<?php

require_once '../vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();
$gather = $response->gather(['action' => '../menu-main.php','input' => 'dtmf', 'numDigits' => 1]);

switch ($_REQUEST['Digits']) {
	case 1:
		$gather->play('https://www.zaxz.pw/twilio/audio/po/ddd.mp3');
	break;
	
	case 2:
		$gather->play('https://www.zaxz.pw/twilio/audio/po/breath.mp3');
	break;

    case 3:
		$gather->play('https://www.zaxz.pw/twilio/audio/po/magic.mp3');
	break;

		//If any other key is pressed, return to the main menu
	default:
	 header("Location: ../menu-main.php");
        die;
}
$response->redirect('../menu-main.php', ['method' => 'POST']);
echo $response;

?>
