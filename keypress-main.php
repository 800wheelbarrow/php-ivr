<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
switch ($_REQUEST['Digits']) {
    case 1:
	        echo <<<EOD
        <Response>
		<Redirect method="POST">https://www.zaxz.pw/twilio/weather/menu.php</Redirect>
        </Response>
EOD;
	break;
   case 2:
	        echo <<<EOD
        <Response>
		<Redirect method="POST">https://www.zaxz.pw/twilio/blackjack/menu.php</Redirect>
        </Response>
EOD;
        break;
    case 3:
	        echo <<<EOD
        <Response>
		<Redirect method="POST">https://www.zaxz.pw/twilio/gb/menu.php</Redirect>
	    </Response>
EOD;
		break;
    case 4:
           echo <<<EOD
        <Response>
        <Redirect method="POST">https://www.zaxz.pw/twilio/po/menu.php</Redirect>
        </Response>
EOD;
        break;
	//If any other key is pressed, return to the main menu script
	default:
	 header("Location: menu-main.php");
        die;
}


?>
