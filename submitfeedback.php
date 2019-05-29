<?php
session_start();
include("connect.php");
if(isset($_POST['feedback_id']) && isset($_POST['teacher_id']) && isset($_POST['user_id']) && isset($_POST['value1']) && isset($_POST['value2']) && isset($_POST['value3']) && isset($_POST['value4']) && isset($_POST['value5']) && isset($_POST['value6']) && isset($_POST['value7']) && isset($_POST['index']) && isset($_POST['total']))
{
	$feedback_id = $_POST['feedback_id'];
	$teacher_id = $_POST['teacher_id'];
	$user_id = $_POST['user_id'];
	$value1 = $_POST['value1'];
	$value2 = $_POST['value2'];
	$value3 = $_POST['value3'];
	$value4 = $_POST['value4'];
	$value5 = $_POST['value5'];
	$value6 = $_POST['value6'];
	$value7 = $_POST['value7'];
	for($i=1;$i<=7;$i++)
	{
		$val = $_POST['value'.$i];
	$sql = "INSERT INTO feedback_student(quality_id,feedback_id,teacher_id,user_id,status) VALUES('$i','$feedback_id','$teacher_id','$user_id','$val') ";
	mysqli_query($con,$sql);
	}
	if($_POST['index'] == $_POST['total'])
	{
		$sql1 = "INSERT INTO feedback_submitted(feedback_id,user_id) VALUES('$feedback_id','$user_id')";
		mysqli_query($con,$sql1);
	}
}
?>