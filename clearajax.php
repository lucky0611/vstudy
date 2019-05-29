<?php
if(!empty($_POST['ques_id'])  && !empty($_POST['mock_id']) && isset($_POST['resptime']))
{
	session_start();
	if(isset($_SESSION['user_id']))
	{
$resptime = intval($_POST['resptime']);
$user_id = $_SESSION['user_id'];		
include("connect.php");
$ques_id = $_POST['ques_id'] ;
$mock_id = $_POST['mock_id'] ;
$class = $_SESSION['class_name'];
$school = $_SESSION['school_name'];
$section = $_SESSION['section'];
$tita_val = $_POST['tita_val'];
		$tablespace = "user_response $school" ;
		$table = str_replace(" ", "_", $tablespace);
	$sql1 = "SELECT * FROM $table WHERE question_id = '$ques_id' AND user_id = '$user_id' AND mock_id = '$mock_id' ";
	$res1 = mysqli_query($con,$sql1);
	if(mysqli_num_rows($res1) == 1)
	{
		$rows1 = mysqli_fetch_array($res1);
		 if($tita_val == 0)
		{
			$query5 = "UPDATE $table SET response ='0',status = '2',response_time = '$resptime' WHERE question_id = '$ques_id' AND user_id = '$user_id' AND mock_id = '$mock_id'";	
			mysqli_query($con,$query5);
			}
			
			else if($tita_val == 1)
		{
			$query5 = "UPDATE $table SET tita_score ='',status = '2',response_time = '$resptime' WHERE question_id = '$ques_id' AND user_id = '$user_id' AND mock_id = '$mock_id'";	
			mysqli_query($con,$query5);
			}
	}
	} 
	}
?>