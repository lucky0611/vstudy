<?php
	session_start();
	$_SESSION["mock_id"] = $_POST["mock_select"];

?>




<?php
	
	header("Location: start_mock_test.php");

?>