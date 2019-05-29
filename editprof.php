 <!DOCTYPE html><head>

<script type="text/javascript" src="signvalidation1.js">
   </script>
   <!--jquery links -->
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.css">
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.theme.css">
<script src="../jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="../jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel= "stylesheet" href="formstyle.css" type="text/css" media="screen" />
</head>
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
#homediv:hover,#profilediv:hover
{
	background-color:#054888 ;
	text-decoration:none;
}
#down:hover
{
	cursor:pointer;
}
@font-face 
 {
 src: url('../font/Lato-Regular.ttf');
 
}
body 
{
	font-family: 'Lato', sans-serif;
}
</style>
<script>
$(document).ready(function() {
 $('#down').click(function(evt) {
    $('#show').css("display","block");
	evt.stopPropagation();
}); 
$(document).click(function() {
    $('#show').css("display","none");
});  
});

function changecol(y)
{
	y.style.backgroundColor = "#1472cc";
	document.getElementById("editprof1").style.color = "white"
}
function changecol1(y)
{
	y.style.backgroundColor = "white"
	document.getElementById("editprof1").style.color = "black"
}
function changecol2(y)
{
	y.style.backgroundColor = "#1472cc";
	document.getElementById("logout1").style.color = "white"
}
function changecol21(y)
{
	y.style.backgroundColor = "white";
	document.getElementById("logout1").style.color = "black"
}

</script>
 <title> THE TEST FORUM </title>
<body >
<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])) 
{ 
include("connect.php") ;
include("sess_var.php") ;
include("profiletop.php");
if(isset($_POST['edit']))
{
	
if(isset($_POST['firstname']) &&  isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['confirm']))
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
	$flag1 = false;
	$flag4 = true ;
	$flag2 = false;
	$flag3 = false;
	$flag8 = false;
	$flag9 = false;
	$flag10 = false;
	$flags = false;
	$new = false;
	if(isset($_POST['lastname']))
	{
	$lastname1 = $_POST['lastname'];
$lastname = sanitize($lastname1);
if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) 
{
  $flag4 = false ;
}
else
{
	$flag4 = true ;

}
	}
$username1 = $_POST['username'];
$username = sanitize($username1);
$table = "user_login" ;
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM $table WHERE username = '$username' AND user_id != $user_id ";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) == 1)
{
	$flag1 = false ;
}
else if(mysqli_num_rows($result) == 0)
{
	if(preg_match("/^[A-Za-z]\w{7,14}$/",$username))
	{
 $flag1 = true ;
	}
	else
	{
		$flag1 = false ;
	}
	}
	$email1 = $_POST['email'];
	$email = sanitize($email1);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$quer = "SELECT * FROM $table WHERE email = '$email' AND user_id != $user_id";
$res = mysqli_query($con,$quer);
if(mysqli_num_rows($res) ==1)
{
$flag2 = false ;
$flags = true;	
}
else if(mysqli_num_rows($res) ==0)
{
// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
    $flag2 = false ;
} 
else
 {
    $flag2 = true ;
}
}
$firstname1 = $_POST['firstname'];
$firstname = sanitize($firstname1);
if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
{
  $flag3 = false ;
}
else
{
	$flag3 = true ;
}
$phone1 = $_POST['phone'];
$phone = sanitize($phone1);
if(!preg_match("/^[0-9]{10}$/", $phone)) 
{
 $flag8 = false ;
}
else
{
	$flag8 = true ;
}
$password1 = $_POST['password'];
$password = sanitize($password1);
if (strlen($password)>=8 && strlen($password)<=15) 
{
	if(preg_match("/^[A-Za-z]\w{7,14}$/",$password))
	{
 $flag9 = true ;
	}
	else
	{
		$flag9 = false ;
	}
}
else
{
	$flag9 = false ;
}
$confirm1 = $_POST['confirm'];
$confirm = sanitize($confirm1);
if($confirm == $password)
{
	$flag10 = true ;
}
else
{
$flag10 = false ;
}
}

if($flag1 && $flag2 && $flag3 && $flag4  && $flag8 && $flag9 && $flag10 )
{
	$query1 = "UPDATE $table SET username = '$username' ,password = '$password',email = '$email' WHERE user_id = $user_id ";
		mysqli_query($con, $query1);
		$table1 = "user_details" ;
	    $email_code = substr($firstname,0,4).microtime(); 
		  $query7 =  "UPDATE $table1 SET firstname = '$firstname',lastname = '$lastname',email_code='$email_code',phone = '$phone' WHERE user_id ='$user_id' ";
		mysqli_query($con, $query7);
		
		$_SESSION['email'] = $email;
	 $_SESSION['user_id'] = $user_id;
	 $_SESSION['phone'] = $phone;
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
	 $_SESSION['username'] = $username;
	 $_SESSION['password'] = $password;
	 $_SESSION['edit'] = "edit";
	?>
<script type="text/javascript">
document.location = "profile.php" ;
</script>
 <?php
}
else
{
?>
<script type="text/javascript">
document.getElementById("error").innerHTML = "Please Enter all the details correctly"
</script>
 <?php	
}
}
else
{
	include("editprofform.php");
}
}
else
{
	?>
	<script type="text/javascript">
document.location = "login.php";
</script>
<?php
}
?>
</body>
</html>