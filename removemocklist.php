<?php
if(isset($_POST['user_id']) && isset($_POST['mock_id'])&& isset($_POST['table']) && isset($_POST['table1']) && isset($_POST['rate_factor']))
{
	include("connect.php");
	$rate_factor = $_POST['rate_factor'];
	$array = array();
	$user_id = $_POST['user_id'];
	$table = $_POST['table'] ;
	$table1 = $_POST['table1'] ;
		mysqli_autocommit($con, false);
	$flag = true;
		
		$mock_id = $_POST['mock_id'];
		$ss = "SELECT * FROM $table1 WHERE mock_id='$mock_id' AND user_id='$user_id'";
		$rr = mysqli_query($con,$ss);
		if(mysqli_num_rows($rr) == 0)
		{
		$sq1 = "SELECT * from $table WHERE mock_id='$mock_id'";
		$re1 = mysqli_query($con,$sq1);
		$ro1 =  mysqli_fetch_array($re1);
		$left = round(($ro1['test_rate']/$rate_factor),1);
		$array['course_id'] = $ro1['course_id'];
		$array['subcourse_id'] = $ro1['subcourse_id'];
		$array['mock_id'] = $ro1['mock_id'];
		$array['mock_name'] = $ro1['mock_name'];
		$array['test_type'] = $ro1['test_type'];
		$array['test_rate'] = round(($ro1['test_rate']/$rate_factor),1);
		$array['msg'] = "";
			$sq2 = "UPDATE user_recharge SET amount = amount + '$left' WHERE user_id='$user_id'";
			$re2 = mysqli_query($con,$sq2);
			if (!$re2)
				{
					$flag = false ;
			 }
	
			$sql1 = "DELETE FROM mock_added_list WHERE user_id='$user_id' AND mock_id='$mock_id'";
			$result1 = mysqli_query($con,$sql1);
			if (!$result1)
				{
					$flag = false ;
				
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
			$array['amount'] ="" ;
		}
		
		echo json_encode($array,JSON_PRETTY_PRINT) ;
	}
	else
	{
	mysqli_rollback($con);
   echo "Request failed" ;		
	}
		}
		if(mysqli_num_rows($rr) == 1)
		{
			$array['msg'] = "You have already attempted it." ;
			echo json_encode($array,JSON_PRETTY_PRINT) ;
		}
		
}
?>