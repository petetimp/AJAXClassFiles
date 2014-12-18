<?php
try
{
	$connect = odbc_connect("Presidents","","");
	
	$year = $_GET['year'];

	$sql = "SELECT FirstName, LastName, StartYear, EndYear FROM Presidents
			WHERE StartYear <= $year AND EndYear >= $year";
	
	$rs = odbc_exec($connect, $sql);

	$noneFound=true;
	while ( $row = odbc_fetch_array($rs) )
	{
		$noneFound=false;
		$firstName = $row['FirstName'];
		$lastName = $row['LastName'];
		$startYear = $row['StartYear'];
		$endYear = $row['EndYear'];
		echo "$firstName $lastName ($startYear - $endYear)<br>";
	}

	if ($noneFound)
	{
		echo "No results";
	}
	odbc_close($connect);
}
catch(Exception $e)
{
	echo "failed: " . $e->getMessage();
}
?>
