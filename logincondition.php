<?php
if(isset($_POST['user_id']))
{
	include("connect.php");
	$user_id = $_POST['user_id'];
	$sql = "SELECT active_till FROM user_details WHERE user_id='$user_id'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) == 1)
	{
	$row = mysqli_fetch_array($result);
	$active_till = strtotime($row['active_till']);
	if(time() > $active_till)
	{
	mysqli_autocommit($con, false);
	$flag = true ;
	$sql1 = "UPDATE user_details SET act_state='0' WHERE user_id = '$user_id'";
	$sql3 = "UPDATE user_recharge SET amount = '0' WHERE user_id = '$user_id'";	
	
	$result = mysqli_query($con,$sql1);
		if(!$result ){
			$flag = false ;
	     }
		$result = mysqli_query($con,$sql3);
		if(!$result ){
			$flag = false ;
	     }
		  if ($flag) {
mysqli_commit($con);
$_SESSION['demo'] = 0 ;
		 }
else {
mysqli_rollback($con);
}
mysqli_autocommit($con, true);
	}
	if(time() <= $active_till)
	{
		$sq1s = "UPDATE user_details SET act_state='1' WHERE user_id = '$user_id'";
	mysqli_query($con,$sq1s);
	$_SESSION['demo'] = 1 ;
		
	}
	}
	else if(mysqli_num_rows($result) == 0)
	{
		echo "0";
	}
}
?>