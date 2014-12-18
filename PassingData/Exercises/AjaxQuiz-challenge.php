<?php
try
{
	$strJSON = stripslashes(urldecode($_POST["strJSON"]));
	$objJSON = json_decode($strJSON);
	
	$answers = $objJSON->answers;
	$correctAnswers = array(2,3,1);
	$results = array();
	for ($i=0; $i < count($answers); $i++)
	{
		$q=$i+1;
		if ($answers[$i] == "x")
			$results["q$q"] = "Unanswered";
		elseif ($answers[$i]==$correctAnswers[$i])
			$results["q$q"] = "Right";
		else
			$results["q$q"] = "Wrong";
	}
	echo urlencode(json_encode($results));
}
catch (Exception $e)
{
	echo "failed: " . $e->getMessage();
}
?>
