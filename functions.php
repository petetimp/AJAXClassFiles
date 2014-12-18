<?php

	function isXHR(){
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']);	
	}

	function connect(){
		global $pdo;	
		
		$pdo=new PDO("mysql:host=localhost;dbname=sakila","root","pwdpwd");
	}
	
	function get_Actors_By_Last_Name($letter){
		global $pdo;
		$statement=$pdo->prepare('SELECT actor_id, first_name, last_name FROM actor
								  WHERE last_name LIKE :letter
								  LIMIT 50'
								);	
		$statement->execute(array(':letter'=>$letter . '%'));
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	
	function get_Actor_Info($actor_id){
		global $pdo;
		$statement=$pdo->prepare('SELECT film_info, first_name, last_name FROM actor_info
								  WHERE actor_id LIKE :actor_id
								  LIMIT 1'
								);	
		$statement->execute(array(':actor_id'=>$actor_id));
		
		return $statement->fetch(PDO::FETCH_OBJ);

	}
?>