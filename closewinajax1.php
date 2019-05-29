<?php
if(isset($_POST['user_id']) && isset($_POST['mock_id']) )
{
	
	session_start();
	date_default_timezone_set("Asia/Kolkata");
	include('connect.php');
	$user_id = $_POST['user_id'];
	$mock_id = $_POST['mock_id'];
	if(isset($_SESSION['user_id']))
	{
	 $s = "SELECT school_name FROM school_details WHERE school_id = (SELECT school_id FROM user_login WHERE user_id = '$user_id') ";
	 $re = mysqli_query($con,$s);
	 $rew = mysqli_fetch_array($re);
	 $school_name = $rew['school_name'];
	 $table1 = "user_report_".$school_name ;
	  $table = "user_close_report_".$school_name ;
	  $table2 = "time_remaining_".$school_name ;	
$query4 =  "INSERT INTO $table ( user_id ,mock_id,close_time,ques_paper)
        VALUES ('$user_id','$mock_id',NOW(),'1')";
		mysqli_query($con,$query4);
		$sql1 = "SELECT * FROM $table1 WHERE user_id = '$user_id' AND mock_id = '$mock_id' AND ques_paper = '1' ";
	$res1 = mysqli_query($con,$sql1);
	if(mysqli_num_rows($res1)>0)
	{
		$query = "SELECT * FROM $table1 WHERE time_id = (SELECT max(time_id) FROM user_report WHERE mock_id ='$mock_id' AND user_id = '$user_id' AND ques_paper = '1') ";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$onblur1 = $row['onblur_time'];
		$onfocus1 = $row['onfocus_time'];
		if($row['onfocus_time'] == NULL)
		{
		$query1 = "UPDATE $table1 SET onfocus_time = NOW() WHERE user_id = '$user_id' AND mock_id = '$mock_id' AND onblur_time = '$onblur1' AND ques_paper = '1' ";	
			mysqli_query($con,$query1);
			echo "hi";
			
		}
	}
	}
	}
	?>