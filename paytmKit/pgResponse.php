<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("paytmKit/lib/config_paytm.php");
require_once("paytmKit/lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<h3><b style='color:red'>Congrats! Your Transaction is successful</b>" . "<br/></h3>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		$user_id = $_SESSION['user_id'];
		$amount = $_POST['TXNAMOUNT'];
		$dates = $_POST['TXNDATE'];
		$order = $_POST['ORDERID'];
//$table = "cyber_token" ;

$cur=date('Y-m-d H:i:s',time());
$da=date('Y-m-d H:i:s',strtotime("+6 months"));
mysqli_autocommit($con, false);
	
		
		$flag = true ;
		//$sql1 = "UPDATE $table SET state='1' WHERE token_id='$token_id'";
		$sql2 = "UPDATE user_details SET act_state='1', time_action ='$cur',active_till = '$da',rate_factor = '1' WHERE user_id = '$user_id'";
		$sql3 = "UPDATE user_recharge SET amount = amount + '$amount' WHERE user_id = '$user_id'";
		$sql4 = "INSERT INTO recharge_record_b2c(user_id,date_recharge,amount,order_number) VALUES('$user_id','$dates','$amount','$order')";
		
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

		 }
else {

mysqli_rollback($con);

}
mysqli_autocommit($con, true);
	}
	else {
		echo "<h3><b style='color:red'>Transaction failed due to network error or insufficient balance</b>" . "<br/></h3>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>
