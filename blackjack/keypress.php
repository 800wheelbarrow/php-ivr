<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	$player = array($_GET["player"]);
	$playerTotal = array_sum($player);
	$dealer = $_GET["dealer"];
	
	$suits = array("clubs", "diamonds", "hearts", "spades");
$randomSuit1 = $suits[rand(0,3)];
	
	
switch ($_REQUEST['Digits']) {
    case 1:
		$playerNextCard = rand(1, 10);
		$player[] = $playerNextCard;
		$playerNewTotal = array_sum($player);
		
		if ($playerNextCard == 1)
	$playerNextCard = "ace";
		
		echo <<<EOD
        <Response>
		<Say>The dealer gave you the $playerNextCard of $randomSuit1 for a total of $playerNewTotal.</Say>
EOD;
		
		if($playerNewTotal > 21)
		{
					if ($dealer >= 17)
		{
			
		}
		else
		{
			while ($dealer < 17)
			{
			$dealerNewDraw = array($dealer, rand(1,10));
			$dealer = array_sum($dealerNewDraw);
			}
		}
		echo <<<EOD
     		<Say>You lose. The dealer's total is $dealer.</Say>
		<Redirect method="POST">menu.php</Redirect>
     
EOD;
		}
		else
		{
			echo <<<EOD
			<Gather action="keypress.php?player=$playerNewTotal&amp;dealer=$dealer" input="dtmf" timeout="10" numDigits="1">
			<Say>Press 1 for another card. Press 2 to stay.</Say></Gather>
EOD;
		}
	echo <<<EOD
	   </Response>
EOD;
        break;
    case 2:
		if ($dealer >= 17)
		{
			
		}
		else
		{
			while ($dealer < 17)
			{
			$dealerNewDraw = array($dealer, rand(1,10));
			$dealer = array_sum($dealerNewDraw);
			}
		}
			echo <<<EOD
        <Response>
EOD;
	   		if($playerTotal == 21)
		{
		echo <<<EOD
     		<Say>Blackjack! You win. The dealer's total is $dealer.</Say>
EOD;
		}
		elseif($playerTotal > 21)
		{
			echo <<<EOD
			<Say>You went over! You lose. Your total is $playerTotal, and the dealer's total is $dealer.</Say>
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
		elseif($playerTotal == $dealer)
		{
			echo <<<EOD
			<Say>It's a tie! You push. Your total is $playerTotal, and the dealer's total is $dealer.</Say>
EOD;
		}
		else
		{
			echo <<<EOD
			<Say>You lose. Your total is $playerTotal, and the dealer's total is $dealer.</Say>
EOD;
		}
	echo <<<EOD
		<Redirect method="POST">menu.php</Redirect>
	   </Response>
EOD;
	break;

	//If any other key is pressed, tell the caller and reload the page
	default:
	 echo <<<EOD
	  <Response>
		<Say>Thanks for playing blackjack. Goodbye.</Say>
		<Redirect method="POST">../menu-main.php</Redirect>
        </Response>
EOD;
        die;
}
?>
