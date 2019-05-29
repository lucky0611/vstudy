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
	 $school_name = $rew['school_name'];
	 $table1 = "user_report_".$school_name ;
	  $table = "user_close_report_".$school_name ;
	  $table2 = "time_remaining_".$school_name ;
	  
	if(isset($_SESSION['user_id']))
	{
		
$query4 =  "INSERT INTO $table ( user_id ,mock_id,close_time,test_window)
        VALUES ('$user_id','$mock_id',NOW(),'1')";
		mysqli_query($con,$query4);
		$sql1 = "SELECT * FROM $table1 WHERE user_id = '$user_id' AND mock_id = '$mock_id' AND test_window = '1' ";
	$res1 = mysqli_query($con,$sql1);
	if(mysqli_num_rows($res1)>0)
	{
		$query = "SELECT * FROM $table1 WHERE time_id = (SELECT max(time_id) FROM $table1 WHERE mock_id ='$mock_id' AND user_id = '$user_id' AND test_window = '1') ";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$onblur1 = $row['onblur_time'];
		$onfocus1 = $row['onfocus_time'];
		if($row['onfocus_time'] == NULL)
		{
		$query1 = "UPDATE $table1 SET onfocus_time = NOW() WHERE user_id = '$user_id' AND mock_id = '$mock_id' AND onblur_time = '$onblur1' AND test_window = '1' ";	
			mysqli_query($con,$query1);
			
		}
	}
	$sq = "SELECT * FROM $table2 WHERE user_id = '$user_id' AND mock_id = '$mock_id' ";	
$r2 = mysqli_query($con,$sq);
if(mysqli_num_rows($r2) == 1)
{
	$row21 = mysqli_fetch_array($r2);
	$time = $row21['timeremain'];
	echo $time ;
}
else
{
echo "hi";
}
	}
	}
	?>