<?php
if(isset($_POST['user_id']) && isset($_POST['mock_id']) )
{
	
	session_start();
	date_default_timezone_set("Asia/Kolkata");
	include('connect.php');
	$user_id = $_POST['user_id'];
	$mock_id = $_POST['mock_id'];
	$s = "SELECT school_name FROM school_details WHERE school_id = (SELECT school_id FROM user_login WHERE user_id = '$user_id') ";
	 $re = mysqli_query($con,$s);
	 $rew = mysqli_fetch_array($re);
	 $school = $rew['school_name'];
	 //$table1 = "time_remaining_".$school ;
	$table = "user_report_".$school;
	if(isset($_SESSION['user_id']))
	{
		$sql1 = "SELECT * FROM $table WHERE user_id = '$user_id' AND mock_id = '$mock_id' AND test_window = '1'  ";
	$res1 = mysqli_query($con,$sql1);
	if(mysqli_num_rows($res1)>0)
	{
		$query = "SELECT * FROM $table WHERE time_id = (SELECT max(time_id) FROM $table WHERE mock_id ='$mock_id' AND user_id = '$user_id' AND test_window = '1') ";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$onblur1 = $row['onblur_time'];
		$onfocus1 = $row['onfocus_time'];
		if($row['onfocus_time'] == NULL)
		{
		$query1 = "UPDATE $table SET onblur_time = NOW() WHERE user_id = '$user_id' AND mock_id = '$mock_id' AND onblur_time = '$onblur1' AND test_window = '1'";	
			if(mysqli_query($con,$query1));
			{
				echo $row['time_id']; 
			}
		}
		else if($row['onfocus_time'] != NULL)
		{
			$query2 =  "INSERT INTO $table ( user_id ,mock_id,onblur_time,test_window)
        VALUES ('$user_id','$mock_id',NOW(),'1')";
		mysqli_query($con,$query2);
		echo  $row['time_id'] ;
		}
	}
	if(mysqli_num_rows($res1) == 0)
	{
		$query3 =  "INSERT INTO $table ( user_id ,mock_id,onblur_time,test_window)
        VALUES ('$user_id','$mock_id',NOW(),'1')";
		mysqli_query($con,$query3);
			echo "hi";
	}

	}
}
?>