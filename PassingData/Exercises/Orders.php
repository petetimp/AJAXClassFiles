<?php
try
{
	$connect = odbc_connect("Northwind","","");
	$sql= "SELECT e.FirstName, e.LastName, o.OrderID, o.OrderDate, c.CompanyName
			FROM Employees e, Orders o, Customers c
			WHERE e.EmployeeID = o.EmployeeID AND c.CustomerID = o.CustomerID";
	$rs=odbc_exec($connect,$sql);

	$sqlCount= "SELECT COUNT(OrderID) AS NumOrders FROM Orders";
	$rsCount=odbc_exec($connect,$sqlCount);

	$row = odbc_fetch_array($rs);
	$rowCount = odbc_fetch_array($rsCount);
	
	header("Content-type: text/xml; charset=iso-8859-1");
	
	echo "<?xml version='1.0'?>";
	echo "<Orders TotalRows='" . $rowCount["NumOrders"] . "'>";
	
	while ( $row = odbc_fetch_array($rs) )
	{
		echo "<Order id='" . $row["OrderID"] . "'>";
		echo "<SalesPerson>" . $row["FirstName"] . " " . $row["LastName"] . "</SalesPerson>";
		echo "<Customer>" . htmlspecialchars($row["CompanyName"]) . "</Customer>";
		echo "<OrderID>" . $row["OrderID"] . "</OrderID>";
		echo "<OrderDate>" . $row["OrderDate"] . "</OrderDate>";
		echo "</Order>";
	}
	
	echo "</Orders>";
}
catch(Exception $e)
{
	echo "failed: " . $e->getMessage();
}
?>
