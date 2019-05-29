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
if(isset($_POST['username']) && isset($_POST['password']) )
{
	date_default_timezone_set("Asia/Kolkata");
	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);
	$sql1 = "SELECT * FROM user_login WHERE email = '$username'";
	$result1 = mysqli_query($con,$sql1);
	if(mysqli_num_rows($result1)== 0)
	{
		
		?>
        <strong>Failure!</strong> E-mail does not exist
     
        <?php
	}
	else if(mysqli_num_rows($result1)==1)
	{
		$row1 = mysqli_fetch_array($result1);
		$pass = $row1['password'];
		$usernames = $row1['username'];
		$user_id = $row1['user_id'];
		$class_id = $row1['class_id'] ; 
		if($pass != $password)
		{
		?>
        <strong>Failure!</strong> Password does not match.
        <?php
		}
else if($pass == $password)
{
$sq2 = "SELECT * FROM class_details WHERE class_id = $class_id";
$re2 = mysqli_query($con,$sq2);
if(mysqli_num_rows($re2) == 1)
{
$ro2 = mysqli_fetch_array($re2);

if($ro2['approval'] == 1)
{
$sqls = "SELECT * FROM user_details WHERE user_id='$user_id' AND model='1'";
$results = mysqli_query($con,$sqls);
if(mysqli_num_rows($results) == 1)
{
$rows = mysqli_fetch_array($results);
$act_state= $rows['act_state'];
$flag = false ;
if($act_state == 1)
{
$time_active = strtotime($rows['active_till']); 
if(time() <= $time_active)
{
	$flag = true ;
}
else if(time() > $time_active)
{
	$flag = false ;
	$sq = "UPDATE user_recharge SET amount = '0' WHERE user_id = '$user_id'";	
	mysqli_query($con,$sq);
	$sq1 = "UPDATE user_details SET act_state='0' WHERE user_id = '$user_id'";
	mysqli_query($con,$sq1);
}

}
else if($act_state == 0)
{
	$flag = true ;
}
if($flag == true)
{
session_start();
$_SESSION['username'] = $usernames;
$_SESSION['password']=$password;
$_SESSION['set'] = "set" ;
//header("location: home.
echo "noerror" ;
}
else if($flag == false)
{
	echo "<strong>Failure!</strong> Your Activation Period is over.Only demo features are available" ;
}
}


if(mysqli_num_rows($results) == 0)
{
	echo "<strong>Failure!</strong> You are not authorised to Log In";
}
}
if($ro2['approval']== 0)
{
	echo "<strong>Failure!</strong> Your course has been Deactivated.Kindly Contact Administrator";
}
	}

	}
else if(mysqli_num_rows($re2) == 0)
{
	?>
        <strong>Failure!</strong> Password does not match.
        <?php
}
	}
}
else 
{
header("location: login.php");
}
?>