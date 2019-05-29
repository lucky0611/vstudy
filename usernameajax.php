<?php
if(!empty($_POST))
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
$value1 = $_POST['values1'];
$value = sanitize($value1);
$value = filter_var($value, FILTER_SANITIZE_EMAIL);
$table = "user_login" ;
$sql = "SELECT * FROM $table WHERE email = '$value'";
$result1 = mysqli_query($con,$sql);
if(mysqli_num_rows($result1) == 1)
{
	$ar = array("Email Exist.Enter Another");
	  echo json_encode($ar);
}
else if(mysqli_num_rows($result1) == 0)
{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
	echo "Wrong format"; 
 }
 else
 {
	 
	echo "Email accepted";
	}
}
}
else
{
	header("location: logout.php");
}
?>