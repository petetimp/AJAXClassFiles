<?php
	header("Content-type: text/xml");
	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo "<h1>Hello " . $_POST["FirstName"] . " " . $_POST["LastName"] ."!</h1>";
?>
