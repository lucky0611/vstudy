<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>THE TEST FORUM</title>
<link rel= "stylesheet" href="formstyle.css" type="text/css" media="screen" />
<script type="text/javascript" src="validatepass.js">
   </script>
</head>

<body>
<?php
include("connect.php");
$flag1 = false;
$flag2 = false;
if(isset($_GET['pass_code'],$_GET['email']) == true)
{
	$email = trim($_GET['email']);
	$pass_code = trim($_GET['pass_code']);
$sql1 = "SELECT * FROM user_login WHERE email = '$email'";
$result1 = mysqli_query($con,$sql1);
if (mysqli_num_rows($result1) == 0)
{
	echo "This link does not exist";
}
else if(mysqli_num_rows($result1) == 1)
{
	$row = mysqli_fetch_array($result1);
	$user_id = $row['user_id'];
	$sql2 =  "SELECT * FROM password_change WHERE user_id = '$user_id'";
	$result2 = mysqli_query($con,$sql2);
	if (mysqli_num_rows($result2) == 0)
	{
		echo "Either Generated Password send to your mail has been activated or no password reset request has been made";
	}
	else if(mysqli_num_rows($result2) == 1)
	{
		$row2 = mysqli_fetch_array($result2);
		$pass_code1 = $row2['pass_code'];
		$curr_pass = $row2['temp_password'];
	if($pass_code1 == $pass_code)
	{
       $sql3 = "UPDATE user_login SET password ='$curr_pass' WHERE user_id ='$user_id'";
		if(mysqli_query($con,$sql3));
		{
		$sql4 = "DELETE FROM password_change WHERE user_id='$user_id'";
		mysqli_query($con,$sql4);
		}
		//include("usertop.php");
		include("resetpass.php");
	}
	}
}
}
if(isset($_POST['sendpass']) && isset($_POST['passwords']) && isset($_POST['confirms']) && isset($_POST['submitpass']) && isset($_POST['username']))
{
	function sanitize($string)
{
include("connect.php");
$string = strip_tags($string);
$string = htmlspecialchars($string);
$string = trim(rtrim(ltrim($string)));
$string = mysqli_real_escape_string($con,$string);
return $string;
}
$flag1 = false;
$flag2 = false ;
$confirm1 = $_POST['confirms'];
$confirm = sanitize($confirm1);
$password1 = $_POST['passwords'];
$password = sanitize($password1);
$genpass = sanitize($_POST['sendpass']);
$user_name = sanitize($_POST['username']);
$sql5 = "SELECT * FROM user_login WHERE username = '$user_name'";
$result5 = mysqli_query($con,$sql5);
if(mysqli_num_rows($result5) == 0)
{
	//include("usertop.php");
	include("resetpass.php");
	?>
    <script type="text/javascript" >
	document.getElementById("msg").innerHTML = "Invalid Username";
	</script>
    <?php
}
if(mysqli_num_rows($result5) == 1)
{
$row5 = mysqli_fetch_array($result5);
$pass = $row5['password'];
$user_id = $row5['user_id'];
if($pass == $genpass)
{
if (strlen($password)>=8 && strlen($password)<15) 
if(preg_match("/^[A-Za-z]\w{7,14}$/",$password))
	{
 $flag1 = true ;
	}
	else
	{
	$flag1 = false ;
	}
else
{
	$flag1 = false ;
}
if($confirm == $password)
{
	$flag2 = true ;
}
else
{
$flag2 = false ;
}
}
if($pass != $genpass)
{
	//include("usertop.php");
	include("resetpass.php");
	?>
 <script type="text/javascript" >
	document.getElementById("msg").innerHTML = "Generated Password don't match";
	</script>
    <?php
}
}
if($flag1 && $flag2)
{
	$sql6 = "UPDATE user_login SET password ='$password' WHERE user_id ='$user_id'";
	if(mysqli_query($con,$sql6))
	{
		//include("usertop.php");
	?>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
<div style="width:55%;margin:auto;border:1px solid black;border-top: 40px solid #1472cc">
<p style="text-align:center;font-size:18px"> Your Password has been Updated successfully.To login into your account <a href="login.php">Click here</a></p>
</div>
    <?php
	}
}

else
{
	if($flag1 == false)
	{
	//include("usertop.php");
	?>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
<div style="width:55%;margin:auto;border:1px solid black;border-top: 40px solid #1472cc">
<p style="text-align:center;font-size:18px"> Invalid password format.Please enter password correctly</p>
</div>
    <?php
}
else
{
	//include("usertop.php");
	?>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
<div style="width:55%;margin:auto;border:1px solid black;border-top: 40px solid #1472cc">
<p style="text-align:center;font-size:18px"> Please enter the Details correctly</p>
</div>
    <?php
}
}
}
?>
</body>
</html>