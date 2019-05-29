<?php
if(!empty($_POST['mock_id']) && !empty($_POST['insert']))
{
	session_start();
	if(isset($_SESSION['user_id']))
	{
include("connect.php");
$insert = $_POST['insert'] ;
$mock_id = $_POST['mock_id'] ;
$class = $_SESSION['class_name'];
$school = $_SESSION['school_name'];
$section = $_SESSION['section'];
$table = "test_question_".$school;
	$query2 = "SELECT * FROM school_details WHERE school_name = '$school'";
		$result2 = mysqli_query($con, $query2);
		$row2 = mysqli_fetch_array($result2);
		$school_id = $row2['school_id'];
		$query3 = "SELECT * FROM section_details WHERE section_name = '$section'";
		$result3 = mysqli_query($con, $query3);
		$row3 = mysqli_fetch_array($result3);
		$section_id = $row3['section_id'];
		$query4 = "SELECT * FROM class_details WHERE class_name = '$class'";
		$result4 = mysqli_query($con, $query4);
		$row4 = mysqli_fetch_array($result4);
		$class_id = $row4['class_id'];
$combine_id = $mock_id .$school_id .$class_id .$section_id ;
$sql1 = "SELECT * FROM $table WHERE combine_id = '$combine_id' ";
$result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1) ==1)
{
	$query1 = "DELETE FROM $table WHERE combine_id='$combine_id'";
	mysqli_query($con,$query1);
}
$sql2 = "INSERT INTO $table ( combine_id ,temp)
        VALUES ('$combine_id','$insert')";
	 if(mysqli_query($con,$sql2))
	 {
		echo $combine_id ; 
	 }
	}
}
?>