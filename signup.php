<?php
include("connect.php");
date_default_timezone_set("Asia/Kolkata");
function sanitize($string)
{
include("connect.php");
$string = strip_tags($string);
$string = htmlspecialchars($string);
$string = trim(rtrim(ltrim($string)));
$string = mysqli_real_escape_string($con,$string);
return $string;
}	
if(isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['confirm']) && isset($_POST['gender']))
	{ 
	$gender = $_POST['gender'];
	$flag1 = true;
	$flag4 = true ;
	$flag2 = false;
	$flag3 = false;
	$flag5 = true;
	$flag6 = true
	;$flag7 = true;
	$flag8 = false;
	$flag9 = false;
	$flag10 = false;
	$flags = false;
	if(isset($_POST['lastname']))
	{
	$lastname1 = $_POST['lastname'];
$lastname2 = sanitize($lastname1);
$lastname = strtolower($lastname2);
if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) 
{
  $flag4 = false ;
}
else
{
	$flag4 = true ;

}
	}
	
$firstname1 = $_POST['firstname'];
$firstname2 = sanitize($firstname1);
$firstname = strtolower($firstname2);
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

	
 $flag9 = true ;
	

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
$table = "user_login" ;
$email1 = $_POST['email'];
	$email = sanitize($email1);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	
$quer = "SELECT * FROM $table WHERE email = '$email'";
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
if($flag1 && $flag2 && $flag3 && $flag4 && $flag5 && $flag6 && $flag7 && $flag8 && $flag9 && $flag10 )
{
	
		mysqli_autocommit($con, false);
	 $time = date("Y-m-d H:i:s") ;
	 $flagr = true ;
	 
	$query1 = "INSERT INTO $table ( username ,password,email,time_registration)
        VALUES ('$email','$password','$email','$time')";
		$result = mysqli_query($con, $query1);
		if(!$result)
		{
			$flagr = false ;
		}
		$school_id = 6;
		
		$query8 = "SELECT * FROM user_login WHERE email = '$email'";
		$result8 = mysqli_query($con, $query8);
		$row8 = mysqli_fetch_array($result8);
		$user_id = $row8['user_id'];
		$table1 = "user_details" ;
	    $email_code = substr($firstname,0,4).microtime();
		
		
		  $query7 =  "INSERT INTO $table1 ( user_id ,firstname,lastname,email_code,phone,gender,act_state,model,package_id)
        VALUES ('$user_id','$firstname','$lastname','$email_code','$phone','$gender','0','1','5')";
		$result = mysqli_query($con, $query7);
		if(!$result)
		{
			$flagr = false ;
		}
		$query9 = "UPDATE $table SET subschool_id ='$school_id',school_id='2',class_id ='6',section_id ='1' WHERE user_id ='$user_id'";	
		$result = mysqli_query($con, $query9);
		if(!$result)
		{
			$flagr = false ;
		}
		$query10 =  "INSERT INTO user_recharge ( user_id)
        VALUES ('$user_id')";
		$result = mysqli_query($con, $query10);
		if(!$result)
		{
			$flagr = false ;
		}
		if ($flagr) 
		{

mysqli_commit($con);
session_start();
$_SESSION['username'] = $email ;
$_SESSION['password'] = $password ;
	?>
    <div align="center" class="alert alert-success">
    <p style="color:green"><strong>Success!</strong>  Successfully signed up.Please wait while we Log you....</p>
    </div>
    <?php
		}
		else {

mysqli_rollback($con);

echo "<strong>Failure!</strong>Unable to sign up now";

}
mysqli_autocommit($con, true);	
}
else
{

	if($flags)
	{
		?>
        <div align="center" class="alert alert-danger" style="color:#d50000">
		The email already exists.Please enter a different Email</div>
        <?php
	}
	if($flag1 == false)
	{
		?>
		<div align="center" style="color:#d50000">Username already exist.Please Enter different username</div>
        <?php
	}
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