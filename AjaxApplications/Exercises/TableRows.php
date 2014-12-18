<?php
header('Content-type: text/xml');
try
{
	$connect = odbc_connect("Presidents","","");
	
	$currentRow = $_GET['Row'];
	$rowsToShow = $_GET['RowsToShow'];
	$lowBoundary = $currentRow - $rowsToShow;
	$highBoundary = ($currentRow - 1) + ($rowsToShow * 2);

	$sql = "SELECT FirstName, LastName, StartYear, EndYear, ImagePath FROM Presidents
			 WHERE PresidentID BETWEEN $lowBoundary AND $highBoundary";
	
	$rs = odbc_exec($connect, $sql);

	echo "<Presidents>";
	while ( $row = odbc_fetch_row($rs) )
	{
		$firstName = odbc_result($rs, 1);
		$lastName = odbc_result($rs, 2);
		$startYear = odbc_result($rs, 3);
		$endYear = odbc_result($rs, 4);
		$imagePath = odbc_result($rs, 5);
		echo "<President>
			<Name>$firstName $lastName</Name>
			<Years>$startYear - $endYear</Years>
			<Image>$imagePath</Image>
			</President>";
	}
	echo "</Presidents>";
	odbc_close($connect);
}
catch(Exception $e)
{
	echo "failed: " . $e->getMessage();
}
?>
