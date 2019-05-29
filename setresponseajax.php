<?php
if(!empty($_POST['ques_id']) && !empty($_POST['ques_id1']) && isset($_POST['response']) && !empty($_POST['mock_id']) && isset($_POST['subsection_id']) && isset($_POST['resptime']) && isset($_POST['subsection_id1']))
{
	session_start();
	if(isset($_SESSION['user_id']))
	{
$resptime = intval($_POST['resptime']);
$user_id = $_SESSION['user_id'];		
include("connect.php");
$ques_id = $_POST['ques_id'] ;
$ques_id1 = $_POST['ques_id1'] ;
$mock_id = $_POST['mock_id'] ;
$subsection_id = $_POST['subsection_id'];
$subsection_id1 = $_POST['subsection_id1'];
$response = $_POST['response'] ;
$class = $_SESSION['class_name'];
$school = $_SESSION['school_name'];
$section = $_SESSION['section'];
$tita_val = $_POST['tita_val'];
$tita_val1 = $_POST['tita_val1'];
		$tablespace = "user_response $school" ;
		$table = str_replace(" ", "_", $tablespace);
	$sql1 = "SELECT * FROM $table WHERE question_id = '$ques_id' AND user_id = '$user_id' AND mock_id = '$mock_id' ";
	$res1 = mysqli_query($con,$sql1);
	if(mysqli_num_rows($res1) == 1)
	{
		$rows1 = mysqli_fetch_array($res1);
		if($tita_val == 0)
		{
		if($response != 0)
		{
			$query5 = "UPDATE $table SET response ='$response',status='4',response_time = '$resptime' WHERE question_id = '$ques_id' AND user_id = '$user_id' AND mock_id = '$mock_id'";	
			mysqli_query($con,$query5);
		}
		if($response == 0)
		{
			$query51 = "UPDATE $table SET response ='$response',status='4',response_time = '$resptime' WHERE question_id = '$ques_id' AND user_id = '$user_id' AND mock_id = '$mock_id'";	
			mysqli_query($con,$query51);
		}
		}
		else if($tita_val == 1)
		{
		if($response !== "")
		{
			$query5 = "UPDATE $table SET tita_score ='$response',status='4',response_time = '$resptime' WHERE question_id = '$ques_id' AND user_id = '$user_id' AND mock_id = '$mock_id'";	
			mysqli_query($con,$query5);
		}
		if($response === "")
		{
			$query51 = "UPDATE $table SET tita_score ='$response',status='4',response_time = '$resptime' WHERE question_id = '$ques_id' AND user_id = '$user_id' AND mock_id = '$mock_id'";	
			mysqli_query($con,$query51);
		}
		}
	}
	if(mysqli_num_rows($res1) == 0)
	{
		if($tita_val == 0)
		{
		if($response != 0)
		{
		$query6 =  "INSERT INTO $table ( user_id ,question_id,mock_id,subjectsection_id,response,options,status,response_time)
        VALUES ('$user_id','$ques_id','$mock_id','$subsection_id','$response','1','4','$resptime')";
		mysqli_query($con,$query6);
		}
		if($response == 0)
		{
		$query61 =  "INSERT INTO $table ( user_id ,question_id,mock_id,subjectsection_id,response,options,status,response_time)
        VALUES ('$user_id','$ques_id','$mock_id','$subsection_id','$response','1','4','$resptime')";
		mysqli_query($con,$query61);
		}
	}
	else if($tita_val == 1)
		{
		if($response !== "")
		{
		$query6 =  "INSERT INTO $table ( user_id ,question_id,mock_id,subjectsection_id,tita_score,tita,status,response_time)
        VALUES ('$user_id','$ques_id','$mock_id','$subsection_id','$response','1','4','$resptime')";
		mysqli_query($con,$query6);
		}
		if($response == 0)
		{
		$query61 =  "INSERT INTO $table ( user_id ,question_id,mock_id,subjectsection_id,tita,status,response_time)
        VALUES ('$user_id','$ques_id','$mock_id','$subsection_id','1','4','$resptime')";
		mysqli_query($con,$query61);
		}
	}
	}
$sql11 = "SELECT * FROM $table WHERE question_id = '$ques_id1' AND user_id = '$user_id' AND mock_id = '$mock_id' ";
	$res11 = mysqli_query($con,$sql11);
	if(mysqli_num_rows($res11) == 0)
	{
		if($tita_val1 == 0)
		{
		$query5a ="INSERT INTO $table ( user_id ,question_id,mock_id,response,options,status,response_time)
        VALUES ('$user_id','$ques_id1','$mock_id','$subsection_id1','0','1','2','0')";
			mysqli_query($con,$query5a);
	}
	if($tita_val1 == 1)
		{
		$query5a ="INSERT INTO $table ( user_id ,question_id,mock_id,subjectsection_id,tita,status,response_time)
        VALUES ('$user_id','$ques_id1','$mock_id','$subsection_id1','1','2','0')";
			mysqli_query($con,$query5a);
	}
	}
	} 
	}
?>