<?php
if(isset($_POST['user_id']))
{
	session_start();
	date_default_timezone_set("Asia/Kolkata");
	include('connect.php');
	if(isset($_SESSION['user_id']) && isset($_SESSION['username']))
	{
		$user_id = $_SESSION['user_id'];
	$current1 = time();
	$current_time = time() + 300 ;
	$current = date('Y-m-d H:i:s', $current_time) ;
$query = "UPDATE user_details SET time_login ='$current' WHERE  user_id = '$user_id' ";
$res = mysqli_query($con, $query);
	echo $current;
	}
}
?>