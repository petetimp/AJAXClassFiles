<?php
	//echo $_POST['content'] . ' from PHP.';
	$file=fopen('C:\Users\Pete T\Documents\upshours.txt','w');
	fwrite($file, $_POST['content']);
	fclose($file);
	
	echo 'Comment has been saved.';
?>