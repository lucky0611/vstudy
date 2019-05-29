<?php
if(isset($_POST['user_id']))
{
	include("connect.php");
	$user_id = $_POST['user_id'];
	$sql = "SELECT amount FROM user_recharge WHERE user_id='$user_id'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) == 1)
	{
	$row = mysqli_fetch_array($result);
	echo $row['amount'] ;
	}
	else if(mysqli_num_rows($result) == 0)
	{
		echo "0";
	}
}
?>