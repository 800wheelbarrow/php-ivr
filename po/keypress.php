<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
switch ($_REQUEST['Digits']) {
    case 1:
	        echo <<<EOD
        <Response>
		<Gather numDigits="1" action="../menu-main.php" method="POST">
        		<Play>https://www.zaxz.pw/twilio/audio/po/ddd.mp3</Play>
		</Gather>
        </Response>
EOD;
        break;
    case 2:
	        echo <<<EOD
        <Response>
		<Gather numDigits="1" action="../menu-main.php">
        <Play>https://www.zaxz.pw/twilio/audio/po/breath.mp3</Play>
		</Gather>
        </Response>
EOD;
        break;
    case 3:
	        echo <<<EOD
        <Response>
		<Gather numDigits="1" action="../menu-main.php">
        <Play>https://www.zaxz.pw/twilio/audio/po/magic.mp3</Play>
		</Gather>
        </Response>
EOD;
        break;

		//If any other key is pressed, return to the main menu script
	default:
	 header("Location: twilio.php");
        die;
}


?>
