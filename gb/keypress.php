<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
switch ($_REQUEST['Digits']) {
    case 1:
	        echo <<<EOD
        <Response>
		<Gather numDigits="1" action="../menu-main.php" method="POST">
        		<Play>https://www.zaxz.pw/twilio/audio/gb/gmtn_l.mp3</Play>
		</Gather>
        </Response>
EOD;
        break;
    case 2:
	        echo <<<EOD
        <Response>
        <Play>https://www.zaxz.pw/twilio/audio/gb/ob_l.mp3</Play>
        </Response>
EOD;
        break;
    case 3:
	        echo <<<EOD
        <Response>
        <Play>https://www.zaxz.pw/twilio/audio/gb/tyla_l.mp3</Play>
        </Response>
EOD;
        break;
	//If any other key is pressed, return to the main menu script
	// !!! This won't do anything, because an invalid key won't send the caller here...
	default:
	 header("Location: ../menu-main.php");
        die;
}


?>