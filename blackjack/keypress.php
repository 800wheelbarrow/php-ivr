<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	$player = array($_GET["player"]);
	$playerTotal = array_sum($player);
	$dealer = $_GET["dealer"];
	
switch ($_REQUEST['Digits']) {
    case 1:
		$playerNextCard = rand(1, 10);
		$player[] = $playerNextCard;
		$playerNewTotal = array_sum($player);
		
		echo <<<EOD
        <Response>
		<Say>The dealer gave you a $playerNextCard for a total of $playerNewTotal.</Say>
EOD;
		
		if($playerNewTotal > 21)
		{
		echo <<<EOD
     		<Say>You lose. The dealer's total is $dealer.</Say>
		<Redirect method="POST">blackjack-init.php</Redirect>
     
EOD;
		}
		else
		{
			echo <<<EOD
			<Gather action="keypress-blackjack.php?player=$playerNewTotal&amp;dealer=$dealer" input="dtmf" timeout="10" numDigits="1">
			<Say>Would you like another card?</Say></Gather>
EOD;
		}
	echo <<<EOD
	   </Response>
EOD;
        break;
    case 2:
			echo <<<EOD
        <Response>
EOD;
	   		if($playerTotal == 21)
		{
		echo <<<EOD
     		<Say>Blackjack! You win. The dealer's total is $dealer.</Say>
EOD;
		}
		elseif($dealer > 21)
		{
			echo <<<EOD
			<Say>Dealer is over! You win. Your total is $playerTotal, and the dealer's total is $dealer.</Say>
EOD;
		}    
		elseif($playerTotal > $dealer)
		{
			echo <<<EOD
			<Say>You win. Your total is $playerTotal, and the dealer's total is $dealer.</Say>
EOD;
		}
		else
		{
			echo <<<EOD
			<Say>You lose. Your total is $playerTotal, and the dealer's total is $dealer.</Say>
EOD;
		}
	echo <<<EOD
		<Redirect method="POST">blackjack-init.php</Redirect>
	   </Response>
EOD;
	break;

	//If any other key is pressed, tell the caller and reload the page
	default:
	 echo <<<EOD
	  <Response>
		<Say>You pressed an incorrect key.</Say>
		<Redirect method="POST">blackjack-init.php</Redirect>
        </Response>
EOD;
        die;
}
?>