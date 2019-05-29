<?php
if(!empty($_POST['timesec']) && !empty($_POST['mock_id']))
{
	include("connect.php");
function sanitize($string)
{
include("connect.php");
$string = strip_tags($string);
$string = htmlspecialchars($string);
$string = trim(rtrim(ltrim($string)));
$string = mysqli_real_escape_string($con,$string);
return $string;
}
session_start();
$user_id = $_SESSION['user_id'];
$mock_id = $_POST['mock_id'] ;
$s = "SELECT school_name FROM school_details WHERE school_id = (SELECT school_id FROM user_login WHERE user_id = '$user_id') ";
	 $re = mysqli_query($con,$s);
	 $rew = mysqli_fetch_array($re);
	 $school_name = $rew['school_name'];
	 $table1 = "time_remaining_".$school_name ;
$time = sanitize($_POST['timesec']);
$query1 = "UPDATE $table1 SET timeremain ='$time' WHERE  user_id = '$user_id' AND mock_id = '$mock_id'";	
			mysqli_query($con,$query1); 
}
?>