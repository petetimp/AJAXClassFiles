<?php
	try
	{
		$connect = odbc_connect("Northwind","","");
	
		$rs=odbc_exec($connect,"SELECT EmployeeID, FirstName, LastName, Title, Extension FROM Employees WHERE EmployeeID = " . $_POST["eid"]);
		$row = odbc_fetch_array($rs);
?>
	<h2>Edit Employee</h2>
	<form onsubmit="return false">
	<table>
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="FirstName" value="<?php echo $row["FirstName"]?>"></td>
	</tr>
	<tr>
		<td>Last Name:</td>
		<td><input type="text" name="LastName" value="<?php echo $row["LastName"]?>"></td>
	</tr>
	<tr>
		<td>Title:</td>
		<td><input type="text" name="Title" value="<?php echo $row["Title"]?>"></td>
	</tr>
	<tr>
		<td>Extension:</td>
		<td><input type="text" name="Extension" value="<?php echo $row["Extension"]?>"></td>
	</tr>
	</table>
	</form>
<?php
	}
	catch (Exception $e)
	{
		echo "Failed: <br>" + $e->getMessage();
	}
?>
