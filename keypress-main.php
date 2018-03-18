<?php
require_once './vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();

switch ($_REQUEST['Digits']) {
	case 1:
		$response->redirect('weather/menu.php', ['method' => 'POST']);
	break;
	
	case 2:
		$response->redirect('blackjack/menu.php', ['method' => 'POST']);
	break;
	
	case 3:
		$response->redirect('news/menu.php', ['method' => 'POST']);
	break;

	case 4:
		$response->redirect('gb/menu.php', ['method' => 'POST']);
	break;
	
	case 5:
		$response->redirect('po/menu.php', ['method' => 'POST']);
	break;
	
	//If any other key is pressed, return to the main menu
	default:
		header("Location: menu-main.php");
	die;
}

echo $response;
?>
