<?php
if(!empty($_POST['user']) && !empty($_POST['insert']))
{
	session_start();
	if(isset($_SESSION['user_id']))
	{
	include("connect.php");

$insert = $_POST['insert'] ;
$user_id = $_POST['user'] ;
 $s = "SELECT school_name FROM school_details WHERE school_id = (SELECT school_id FROM user_login WHERE user_id = '$user_id') ";
	 $re = mysqli_query($con,$s);
	 $rew = mysqli_fetch_array($re);
	 $school_name = $rew['school_name'];
	  $table = "start_test_".$school_name ;
$sql1 = "SELECT * FROM $table WHERE user_id = '$user_id' ";
$result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1) ==1)
{
	$query1 = "DELETE FROM $table WHERE user_id='$user_id'";
	mysqli_query($con,$query1);
}
$sql2 = "INSERT INTO $table ( user_id ,temp)
        VALUES ('$user_id','$insert')";
	 if(mysqli_query($con,$sql2))
	 {
		echo $insert ; 
	 }
	}
}
?>
