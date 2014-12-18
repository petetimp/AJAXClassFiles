<?php
	try
	{
		$connect = odbc_connect("Northwind","","");
	
		$sql = "UPDATE Employees SET " . $_POST['field'] . "='" . $_POST['value'] . "' WHERE EmployeeID = " . $_POST['eid'];
	
		odbc_exec($connect, $sql);
	}
	catch (Exception $e)
	{
		echo "Failed: <br>" + $e->getMessage();
	}
?>
