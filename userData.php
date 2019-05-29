<?php
//Load the database configuration file
include('connect.php');

//Convert JSON data into PHP variable
$userData = json_decode($_POST['userData']);
mysqli_autocommit($con, false);
if(!empty($userData))
{
    $oauth_provider = $_POST['oauth_provider'];
    //Check whether user data already exists in database
	
	
    $query = "SELECT * FROM app_login WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$userData->id."'";
 $time = date("Y-m-d H:i:s") ;
    $result = mysqli_query($con,$query);
	if($userData->gender == "male")
	{
		$gender = "m";
	}
	if($userData->gender == "female")
	{
		$gender = "f";
	}
    if(mysqli_num_rows($result) == 1)
	{ 

	$row = mysqli_fetch_array($result);
	$user_id = $row['user_id'];
	
	$flagr = true ;
        //Update user data if already exists
        $query1 = "UPDATE user_login SET  email = '".$userData->email."',username = '".$userData->email."',school_id='2',subschool_id='6',class_id='6',section_id='1',time_registration='$time' WHERE user_id='$user_id'";
        $result1 = mysqli_query($con,$query1);
		if(!$result1)
		{
			$flagr = false ;
		}
		$query1 = "UPDATE user_details SET  firstname = '".$userData->first_name."',lastname = '".$userData->last_name."',gender='$gender',image = '".$userData->picture->data->url."',act_state='0',model='2' WHERE user_id = '$user_id'";
        $result1 = mysqli_query($con,$query1);
		if(!$result1)
		{
			$flagr = false ;
		}
		
			if ($flagr) 
		{
		
mysqli_commit($con);
session_start();
$_SESSION['username'] = $userData->email;
$_SESSION['password']="";
$_SESSION['set'] = "set" ;
		}
		else {

mysqli_rollback($con);

}
mysqli_autocommit($con, true);
    }
	else
	{
		$q = "SELECT * FROM user_login WHERE email='$userData->email'";
	$r = mysqli_query($con,$q);
	if(mysqli_num_rows($r) == 0)
	{
		$flagr = true ;
        //Insert user data
        $query1 = "INSERT INTO user_login ( username ,email,time_registration)
        VALUES ('".$userData->email."','".$userData->email."','$time')";
        $result1 = mysqli_query($con,$query1);
		if(!$result)
		{
			$flagr = false ;
		}
		$query8 = "SELECT * FROM user_login WHERE email = '".$userData->email."'";
		$result8 = mysqli_query($con, $query8);
		$row8 = mysqli_fetch_array($result8);
		$user_id = $row8['user_id'];
		$firstname = $userData->first_name ;
		$email_code = substr($firstname,0,4).microtime();
		
		
		  $query1 =  "INSERT INTO user_details ( user_id ,firstname,lastname,email_code,gender,act_state,model,image,package_id)
        VALUES ('$user_id','".$userData->first_name."','".$userData->last_name."','$email_code','$gender','0','2','".$userData->picture->data->url."','5')";
		$result1 = mysqli_query($con, $query1);
		if(!$result)
		{
			$flagr = false ;
		}
		$query9 = "UPDATE user_login SET subschool_id ='$school_id',school_id='2',class_id ='6',section_id ='1' WHERE user_id ='$user_id'";	
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
		$query11 =  "INSERT INTO app_login ( user_id,oauth_uid,oauth_provider)
        VALUES ('$user_id','".$userData->id."','$oauth_provider')";
		$result = mysqli_query($con, $query11);
		if(!$result)
		{
			$flagr = false ;
		}
		if ($flagr) 
		{

mysqli_commit($con);
session_start();
$_SESSION['username'] = $userData->email;
$_SESSION['password']="";
$_SESSION['set'] = "set" ;

		}
		else {

mysqli_rollback($con);

}
mysqli_autocommit($con, true);
    
	}
	else if(mysqli_num_rows($r) == 1)
	{
		echo "Login with this email already exist";
	}
	}
}
?>