<?php
require_once './vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();

switch ($_REQUEST['Digits']) {
    case 1:
	$response->redirect('weather/menu.php', ['method' => 'POST']);
	        // echo <<<EOD
        // <Response>
		// <Redirect method="POST">https://www.zaxz.pw/twilio/weather/menu.php</Redirect>
        // </Response>
// EOD;
	break;
   case 2:
	$response->redirect('blackjack/menu.php', ['method' => 'POST']);
	        // echo <<<EOD
        // <Response>
		// <Redirect method="POST">https://www.zaxz.pw/twilio/blackjack/menu.php</Redirect>
        // </Response>
// EOD;
        break;
		   case 3:
	$response->redirect('news/menu.php', ['method' => 'POST']);
        break;
    case 4:
	$response->redirect('gb/menu.php', ['method' => 'POST']);
	        // echo <<<EOD
        // <Response>
		// <Redirect method="POST">https://www.zaxz.pw/twilio/gb/menu.php</Redirect>
	    // </Response>
// EOD;
		break;
    case 5:
	$response->redirect('po/menu.php', ['method' => 'POST']);
           // echo <<<EOD
        // <Response>
        // <Redirect method="POST">https://www.zaxz.pw/twilio/po/menu.php</Redirect>
        // </Response>
// EOD;
        break;
	//If any other key is pressed, return to the main menu script
	default:
	 header("Location: menu-main.php");
        die;
}


?>
