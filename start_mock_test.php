<?php
	//for testing change only $mock_id
	include_once 'mysql.php';
	
	session_start();
	//put the value of mock id here 
	//change : take value from session[]
	
	
	$mock_id = $_SESSION["mock_id"];
	//initialization of session variables variables

	$query = "select * from $mock_id";
	
	$res = mysqli_query($connection ,$query) or die("Could not get the given mock - id");

	$noquestion = 0;

	while($row = mysqli_fetch_array($res))
	{
		$noquestion = $noquestion + 1;
	}


	//to change

	$_SESSION["time_left"] = time() + 1*60*60;

	//to change

	$_SESSION["noquestion"] = $noquestion;

	for($i=1;$i<=$noquestion;$i++)
	{
		
		$_SESSION["yes_seen"]["$i"] = 0;
		$_SESSION["yes_answered"]["$i"] = 0; 
		$_SESSION["yes_marked"]["$i"] = 0;
	}

	$_SESSION["yes_seen"]["1"] = 1;
	$_SESSION["current_question"] = 1;
	

	header("Location:testpage1.php");

?>