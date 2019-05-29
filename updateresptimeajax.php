<?php
if(!empty($_POST['resptime']) && !empty($_POST['count']) && !empty($_POST['mock_id']))
{
	session_start();
	if(isset($_SESSION['user_id']))
{
	include("connect.php");
function sanitize($string)
{
include("connect.php");
$string = strip_tags($string);
$string = htmlspecialchars($string);
$string = trim(rtrim(ltrim($string)));
$string = mysqli_real_escape_string($con,$string);
return $string;
}

$user_id = $_SESSION['user_id'];
$mock_id = $_POST['mock_id'] ;
$school = $_SESSION['school_name'];
$tablespace = "user_response $school" ;
$table = str_replace(" ", "_", $tablespace);
$resptime = sanitize($_POST['resptime']);
$ques = $_POST['count'] ;
$no = $ques - 1 ;
$sql = "SELECT * FROM $table WHERE  user_id = '$user_id' AND mock_id = '$mock_id' AND question_id = '$ques' ";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res) == 1)
{
$query1 = "UPDATE $table SET response_time ='$resptime' WHERE  user_id = '$user_id' AND mock_id = '$mock_id' AND question_id = '$ques'";	
			mysqli_query($con,$query1); 
} 

}
}
?>