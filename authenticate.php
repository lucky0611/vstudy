<!DOCTYPE html>
<head>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
   <!--jquery links -->
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.css">
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.theme.css">
<script src="../jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="../jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script type="text/javascript" src="signvalidation.js">
   </script>
   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="signvalidation.js"></script>
<style>

#topheader
{
background-color:#03376a;
border-radius:5px;
height:50px	;
background: linear-gradient(#054888 ,#1472cc);
background: -webkit-linear-gradient(#054888 ,#1472cc);
background: -o-linear-gradient(#054888 ,#1472cc);
background: -moz-linear-gradient(#054888 ,#1472cc);
}
a:link {
	text-decoration:none ;
}
/* mouse over link */
a:visited {
    text-decoration:none ;
}
a:hover {
    text-decoration:none ;
}
</style>
<title>The Test Forum</title>
</head>

<body>
<?php
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
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['login']))
{
	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);
	echo $username;
	$sql1 = "SELECT * FROM user_login WHERE username = '$username'";
	$result1 = mysqli_query($con,$sql1);
	if(mysqli_num_rows($result1)== 0)
	{
		include("usertop.php");
		include("form.php");
		?>
        <p  style="color:red;text-align:center;position:absolute;top:11%;left:10%;font-size:20px">Username does not exist.</p>
     
        <?php
	}
	else if(mysqli_num_rows($result1)==1)
	{
		$row1 = mysqli_fetch_array($result1);
		$pass = $row1['password'];
		if($pass != $password)
		{
		include("usertop.php");
		include("form.php");
		?>
        <p  style="color:red;text-align:center;position:absolute;top:11%;left:10%;font-size:20px">Password does not match.</p>
        <?php	
		}
else if($pass == $password)
{
session_start();
$_SESSION['username'] = $username;
$_SESSION['password']=$password;
$_SESSION['set'] = "set" ;
header("location: home.php"); 

}
	}
}
else
{
header("location: login.php");
}
?>
</body>
</html>