<?php
	try
	{
		$connect = odbc_connect("Northwind","","");
	
		$sql = "UPDATE Employees SET " . $_GET['field'] . "='" . $_GET['value'] . "' WHERE EmployeeID = " . $_GET['eid'];
	
		odbc_exec($connect, $sql);
		
		header("Location: EmployeeForm.php?eid=" . $_GET['eid']);
	}
	catch (Exception $e)
	{
		echo "Failed: <br>" + $e->getMessage();
	}
?>
