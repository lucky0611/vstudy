<?php

	session_start();

	if(isset($_GET["from_button"]))
	{	
		if($_GET["from_button"]=='yes')
		{
			$_SESSION["current_question"] = $_GET["question_no"];
			header("Location: testpage1.php");
		}
	}

	if(isset($_POST["skipped"]))
	{
		$_SESSION["current_question"] = $_SESSION["current_question"] + 1;
		header("Location: testpage1.php");
	}

	if(isset($_POST["answered"]))
	{	
		$_SESSION["yes_marked"][$_SESSION["current_question"]] = 0;
		$_SESSION["yes_answered"][$_SESSION["current_question"]] = $_POST["answer_selected"];
		$_SESSION["current_question"] = $_SESSION["current_question"] + 1;
		header("Location: testpage1.php");
	}

	if(isset($_POST["reset_hidden"]))
	{
		$_SESSION["yes_answered"][$_SESSION["current_question"]] = 0;
		header("Location: testpage1.php");
	}
	
	if(isset($_POST["marked"]))
	{
		$curr = $_SESSION["current_question"];
		$ans_temp = intval($_POST["answer_selected"]);
		//echo " $curr $ans_temp ";
		$_SESSION["yes_marked"]["$curr"] = 1;
		$_SESSION["yes_answered"]["$curr"] = $ans_temp;
		$_SESSION["current_question"] = $_SESSION["current_question"] + 1;
		header("Location: testpage1.php");	
	}

?>