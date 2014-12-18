<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Inline Editing: Form Controls</title>
<script type="text/javascript" src="../../lib.js"></script>
<script type="text/javascript" src="inline-editing.js"></script>
<link type="text/css" rel="stylesheet" href="Presidents.css">
</head>
<body>
<p>
  <?php
	try
	{
		$connect = odbc_connect("Presidents","","");
		$sql= "SELECT PresidentID, FirstName, LastName, Bio FROM Presidents";
		$rs=odbc_exec($connect,$sql);
		
		echo "<h1>Presidents</h1>";
		echo "<p>Click on any cell to edit the field. Click off the field to save your change.</p>";
		echo "<table>";
		while ( $row = odbc_fetch_array($rs) ) 
		{
			echo "<tr id='" . $row["PresidentID"] . "'>";
			echo "<td class='editable' title='FirstName'>" . $row["FirstName"] . "</td>";
			echo "<td class='editable' title='LastName'>" . $row["LastName"] . "</td>";
			echo "<td class='editable' title='Bio'>" . $row["Bio"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	catch(Exception $e)
	{
		echo "failed: " . $e->getMessage();
	}
?>
</p>
</body>
</html>
