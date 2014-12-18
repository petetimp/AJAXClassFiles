<?php
try
{
	$strJSON = stripslashes(urldecode($_POST["strJSON"]));
	$objJSON = json_decode($strJSON);
	$question = $objJSON->question;
	$answer = $objJSON->answer;
	
	switch ($question)
	{
		case "q1" :
			if ($answer == 2)
				echo "Right";
			else
				echo "Wrong";
			break;
		case "q2" :
			if ($answer == 3)
				echo "Right";
			else
				echo "Wrong";
			break;
		case "q3" :	
			if ($answer == 1)
				echo "Right";
			else
				echo "Wrong";
			break;
		default:
			echo "failed";
	}
}
catch (Exception $e)
{
	echo "failed: " . $e->getMessage();
}
?>
