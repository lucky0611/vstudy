<?php
if(isset($_POST['user_id']) && isset($_POST['mock_id']) &&isset($_POST['ques_id'])  )
{
	include("connect.php");
	$user_id = $_POST['user_id'];
	$mock_id = $_POST['mock_id'];
	$ques_id = $_POST['ques_id'];
$sql = "INSERT INTO bookmark_question(user_id,mock_id,question_id) VALUES('$user_id','$mock_id','$ques_id')";
mysqli_query($con,$sql);
echo "hi" ;
}
?>