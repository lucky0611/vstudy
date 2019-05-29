<?php
if(isset($_POST['user_id']) && isset($_POST['arr']) && isset($_POST['table']) && isset($_POST['rate_factor']))
{
	include("connect.php");
	$rate_factor = $_POST['rate_factor'];
	$array = array();
	$array['amount'] ="";
	$user_id = $_POST['user_id'];
	$table = $_POST['table'] ;
	$arr = isset($_POST['arr'])? json_decode($_POST['arr']) : array();
	$length = sizeof($arr);
	$sq = "SELECT * FROM user_recharge WHERE user_id = '$user_id'";
	$re = mysqli_query($con,$sq);
	$net_rate = 0 ;
	if(mysqli_num_rows($re) == 1)
	{
		mysqli_autocommit($con, false);
	$flag = true;
		for($i=0;$i <$length;$i++)
	{
		$arrs = $arr[$i];
		$sq1 = "SELECT test_rate from $table WHERE mock_id='$arrs'";
		$re1 = mysqli_query($con,$sq1);
		$ro1 =  mysqli_fetch_array($re1);
		$mock_rate = round(($ro1['test_rate']/$rate_factor),1);
		$net_rate = $net_rate + $mock_rate ;
	}
		$ro =  mysqli_fetch_array($re);
		if($ro['amount'] >= $net_rate)
		{
			$left = $ro['amount'] - $net_rate ;
			$sq2 = "UPDATE user_recharge SET amount ='$left' WHERE user_id='$user_id'";
			$re2 = mysqli_query($con,$sq2);
			if (!$re2)
				{
					$flag = false ;
			 }
	for($i=0;$i <$length;$i++)
	{
		$flag1 = true ;
		$arrs = $arr[$i];
		$sql = "SELECT * FROM mock_added_list WHERE user_id = '$user_id' AND  mock_id='$arrs'";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) == 0)
		{
			$sql1 = "INSERT INTO mock_added_list(user_id,mock_id) VALUES('$user_id','$arrs')";
			$result1 = mysqli_query($con,$sql1);
			if (!$result1)
				{
					$flag = false ;
					$flag1 = false ;
					break ;
			 }
		}
		if(!$flag1)
		{
			break ;
		}
		}
	if ($flag) 
	{
		mysqli_commit($con);
		$sqls = "SELECT * FROM user_recharge WHERE user_id='$user_id'";
		$results = mysqli_query($con,$sqls);
		if(mysqli_num_rows($results) == 1)
		{
		$rows = mysqli_fetch_array($results);
		$array['amount'] = $rows['amount'];
		}
		else
		{
			$array['amount'] ="";
		}
		
		mysqli_commit($con);
	$array['text'] ="Mocks have been added";	
	}
	else
	{
	mysqli_rollback($con);
   $array['text'] ="Request failed";		
	}
	}
	else
	{
	$array['text'] ="You don't have Required Money in your wallet.Please Recharge";	
	}
	}
	if(mysqli_num_rows($re) == 0)
	{
		$array['text'] ="You don't have Required Money in your wallet.Please Recharge";
	}
	echo json_encode($array,JSON_PRETTY_PRINT) ;
}
?>