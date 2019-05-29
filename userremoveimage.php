<?php
if(!empty($_POST['remove']))
{
	define('uploadpath','../profilepic/');
	include("connect.php");
session_start();
$user_id = $_SESSION['user_id'];
$table = "user_details";
		$sql = "SELECT * FROM $table WHERE user_id= '$user_id'";
			   $result = mysqli_query($con,$sql);		  
				$row = mysqli_fetch_array($result);
				if($row['image'] != NULL)
				{
					$address = uploadpath.$row['image'];
					@unlink($address);
					$sql1 ="UPDATE $table SET image='' WHERE user_id='$user_id'";
              $result1 = mysqli_query($con,$sql1); 
				echo "Image removed";
				}
}
else
{
	
	header("location: adminlogout.php");
}
?>