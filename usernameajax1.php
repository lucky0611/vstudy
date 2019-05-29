<?php
if(!empty($_POST))
{
include("connect.php");
session_start();
$value1 = $_POST['values1'];
$value = strip_tags(trim($value1));
$table = "user_login" ;
$sql = "SELECT * FROM $table WHERE username = '$value' AND user_id != $user_id ";
$result1 = mysqli_query($con,$sql);
if(mysqli_num_rows($result1) == 1)
{
	$ar = array("Enter different username");
							  echo json_encode($ar);
}
else if(mysqli_num_rows($result1) == 0)
{
	echo "Username available";
	}
}
else
{
	header("location: logout.php");
}
?>