<?php
	try
	{
		$connect = odbc_connect("Northwind","","");
		
		$rs=odbc_exec($connect,"SELECT EmployeeID, FirstName, LastName FROM Employees");
		echo "<ul>";
		while ( $row = odbc_fetch_array($rs) )
		{
			echo "<li><a href='javascript:void(0)' onclick=\"GetEmployeeForm('../EmployeeForm.php'," . $row["EmployeeID"] . ")\">" . $row["FirstName"] . " " .  $row["LastName"] . "</a></li>";
		}
		echo "</ul>";
	}
	catch (Exception $e)
	{
		echo "Failed: <br>" + $e->getMessage();
	}
?>
