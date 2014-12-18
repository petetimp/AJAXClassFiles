<?php 
	require 'functions.php';
	connect();
	if(isXHR() && isset($_POST['q'])){
		echo json_encode(get_Actors_By_Last_Name($_POST['q']));
		return; 
	}
	if(isset($_POST['q'])){
		$actors=get_Actors_By_Last_Name($_POST['q']);
	}
	if(isXHR() && isset($_POST['actor_id'])){
		$info=get_Actor_Info($_POST['actor_id']);
		echo $info->film_info;
		return;
	}
	include 'template.php';	
?>