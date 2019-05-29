<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel= "stylesheet" href="formstyle.css" type="text/css" media="screen" />
<title>The Test Forum</title>
<style>
@font-face 
 {
 src: url('../font/Lato-Regular.ttf');
 
}
body 
{
	font-family: 'Lato', sans-serif;
}
</style>
</head>

<body>

<?php
include("connect.php");
$sql = "SELECT * FROM institute_status ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$status = $row['status'];
if($status == 1)
{
session_start();
if(isset($_POST['submitmail']) && isset($_POST['sendmail']))
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
$email = sanitize($_POST['sendmail']);
$sql1 = "SELECT * FROM user_login WHERE email = '$email'";
$result1 = mysqli_query($con,$sql1);
if (mysqli_num_rows($result1) == 0)
{
	include("resetform1.php");
	?>
    <script type="text/javascript">
	document.getElementById("error").innerHTML ="Invalid Email. Please enter your Registered Email"
	</script>
    <?php
}
if (mysqli_num_rows($result1) == 1)
{
	$row = mysqli_fetch_array($result1);
	$user_id = $row['user_id'];
	$username = $row['username'];
	/*$class_id = $row['class_id'];
	$section_id = $row['section_id'];
	$school_id = $row['school_id'];
	$sql2 = "SELECT * FROM school_details WHERE school_id = '$school_id'";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2);
$sql3 = "SELECT * FROM class_details WHERE class_id = '$class_id'";
	$result3 = mysqli_query($con,$sql3);
	$row3 = mysqli_fetch_array($result3);
	$sql4 = "SELECT * FROM section_details WHERE section_id = '$section_id'";
	$result4 = mysqli_query($con,$sql4);
	$row4 = mysqli_fetch_array($result4);
	$school= $row2['school_name'];
	$class = $row3['class_name'];
	$section= $row4['section_name']; */
	$table = "user_details";
	$sql5 = "SELECT * FROM $table WHERE user_id = '$user_id'";
	$result5 = mysqli_query($con,$sql5);
	$row5 = mysqli_fetch_array($result5);
	$firstname = $row5['firstname'];
	$lastname = $row5['lastname'];
	$pass_code = substr($firstname,0,4).microtime();
	$rand = mt_rand(100000,1000000);
$subject = 'Reset password';
$headers = "From: " . 'contact@vstudy.in' . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$msg = '<html><body>';
$msg .= '<h1>Hi'.'&nbsp;'. $firstname ."&nbsp;".$lastname.'</h1>';
$msg .= '<p> Your Username is'.'&nbsp;'. $username.'</p>';
$msg .= '<p> Your Generated Password is'.'&nbsp;'. $rand.'</p>';
$msg .= '<p>Your Generated Password will be Activated only when you Use the link below.</p>';
$msg .= '<a href="http://www.vstudy.in/onlinetest/changepass.php?pass_code= '.$pass_code.'&email='.$email.'">'."Click here to reset password".'</a>';
$msg .= '<p> You can use the link only Once</p>';
$msg .= '</body></html>';
mail($email, $subject, $msg, $headers); 
$sql6 ="SELECT * FROM password_change WHERE user_id = '$user_id'";
$result6 = mysqli_query($con,$sql6);
if(mysqli_num_rows($result6)== 0)
{
$sql7 = "INSERT INTO password_change(user_id,temp_password,pass_code) VALUES('$user_id','$rand','$pass_code') ";
mysqli_query($con,$sql7);
}
if(mysqli_num_rows($result6)== 1)
{
$sql8 = "UPDATE password_change SET temp_password ='$rand',pass_code='$pass_code' WHERE user_id ='$user_id'";
mysqli_query($con,$sql8);
}
?>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<div style="width:55%;margin:auto;border:1px solid black;border-top: 40px solid #1472cc">
<p style="text-align:center;font-size:18px"> Kindly check your email for the new password.If u remember your password  <a href="login.php" style="color:#1472cc">Click here</a>  to login into your account</p>
</div>
    <?php
	mysqli_close($con);
}
}
else
{
include("resetform1.php");
	?>
	 <?php
}
}
if($status == 0)
{
	?>
    <h1 style="color:red">Your Services has been disabled. Please contact Service Provider for further assistance</h1>
    <?php
}
mysqli_close($con);
?>
</body>
</html>