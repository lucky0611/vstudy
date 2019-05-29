<?php
if(!empty($_POST['value']) && isset($_POST['user_id']))
{
include("connect.php");
date_default_timezone_set("Asia/Kolkata");
session_start();
$order = "BITSP".time();
$user_id = $_POST['user_id'];
$value1 = $_POST['value'];
$value = strip_tags(trim($value1));
$table = "cyber_token" ;
$sql = "SELECT * FROM $table WHERE token = '$value' AND state='0'";
$result1 = mysqli_query($con,$sql);
$cur=date('Y-m-d H:i:s',time());
if(mysqli_num_rows($result1) == 1)
{
	$row = mysqli_fetch_array($result1);
	$token_id = $row['token_id'];
	$validity = $row['validity'];
	$amount = $row['amount'];
	$cyber_id = $row['cyber_id'];
	$rate_factor = $row['rate_factor'];
	$da=date('Y-m-d H:i:s',strtotime("+$validity months"));
	mysqli_autocommit($con, false);
	
		
		$flag = true ;
		$sql1 = "UPDATE $table SET state='1' WHERE token_id='$token_id'";
		$sql2 = "UPDATE user_details SET act_state='1', time_action ='$cur',active_till = '$da',rate_factor = '$rate_factor' WHERE user_id = '$user_id'";
		$sql3 = "UPDATE user_recharge SET amount = amount + '$amount', cyber_id ='$cyber_id' WHERE user_id = '$user_id'";
		$sql4 = "INSERT INTO recharge_record(user_id,token_id,date_recharge,order_number) VALUES('$user_id','$token_id','$cur','$order')";
		$result = mysqli_query($con,$sql1);
		if(!$result ){
			
			$flag = false ;
	     }
		$result = mysqli_query($con,$sql2);
		if(!$result){
			$flag = false ;
	     }
		 $result = mysqli_query($con,$sql3);
		if(!$result){
			$flag = false ;
	     }
		 $result = mysqli_query($con,$sql4);
		 if(!$result){
			$flag = false ;
	     }
		 if ($flag) {

mysqli_commit($con);

echo "Token Accepted";
		 }
else {

mysqli_rollback($con);

echo "Error occured";

}
mysqli_autocommit($con, true);
}
else 
{
	echo "Invalid Token";
	}
}
else
{
	header("location: logout.php");
}
?>