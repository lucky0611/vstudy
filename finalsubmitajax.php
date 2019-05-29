<?php
if(!empty($_POST['mock_id']) && !empty($_POST['insert1']) && isset($_POST['arr']) && isset($_POST['arr1']) && isset($_POST['arr2']) && isset($_POST['arr3'])  && isset($_POST['arr4']) && isset($_POST['levels']) && isset($_POST['testint']) && isset($_POST['testexp']) && isset($_POST['comments']))
{
	session_start();
	if(isset($_SESSION['user_id']))
	{
include("connect.php");
$insert = $_POST['insert1'] ;
$comments = $_POST['comments'] ;
$levels = $_POST['levels'] ;
$testint = $_POST['testint'] ;
$testexp = $_POST['testexp'] ;
$mock_id = $_POST['mock_id'] ;
$user_id = $_SESSION['user_id'] ;
$class = $_SESSION['class_name'];
$school = $_SESSION['school_name'];
$section = $_SESSION['section'];
$mock = $_SESSION['mock_name'] ;
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
		$tablespace = "user_response $school" ;
		$table = str_replace(" ", "_", $tablespace);
	  $table2 = "mock_section_details_".$school ;
      $table1 = "mocktest_details_".$school;
      $table3 = "mock_questions_".$school;
	   $table4 = "test_question_".$school;
	   
$response = isset($_POST['arr'])? json_decode($_POST['arr']) : array();
$tita_response = isset($_POST['arr3'])? json_decode($_POST['arr3']) : array();
$test = isset($_POST['arr4'])? json_decode($_POST['arr4'],true) :  array(array());
$status = isset($_POST['arr1'])? json_decode($_POST['arr1']) : array();
$resptime = isset($_POST['arr2'])? json_decode($_POST['arr2']) : array();
$length = sizeof($response);
$k = 0;
for($i = 0 ;$i < $length; $i++)
{
	$j = $i +1 ;
	if($test[$i]['tita'] == 0)
	{
	if($response[$i] != 10)
	{
	$k++ ;	
	 $q = "SELECT * FROM $table WHERE question_id = '$j' AND user_id = '$user_id' AND mock_id = '$mock_id' ";
	$re = mysqli_query($con,$q);
	if(mysqli_num_rows($re) == 1)
	{
	$q1 = "UPDATE $table SET response ='$response[$i]',status='$status[$i]',response_time='$resptime[$i]' WHERE question_id = '$j' AND user_id = '$user_id' AND mock_id = '$mock_id'";	
			mysqli_query($con,$q1);
}
else if(mysqli_num_rows($re) == 0)
	{
		
	$q2 = "SELECT * FROM $table3 WHERE question_id = '$j' AND mock_id='$mock_id'";
	$re2 = mysqli_query($con,$q2);
	$ro = mysqli_fetch_array($re2);
	$subsection_id = $ro['section_id'];
	
	$query6 =  "INSERT INTO $table ( user_id ,question_id,mock_id,subjectsection_id,response,options,status,response_time)
        VALUES ('$user_id','$j','$mock_id','$subsection_id','$response[$i]','1','$status[$i]','$resptime[$i]')";
		mysqli_query($con,$query6);
		
	}
}
}

if($test[$i]['tita'] == 1)
	{
	
	$k++ ;	
	 $q = "SELECT * FROM $table WHERE question_id = '$j' AND user_id = '$user_id' AND mock_id = '$mock_id' ";
	$re = mysqli_query($con,$q);
	if(mysqli_num_rows($re) == 1)
	{
	$q1 = "UPDATE $table SET  tita_score ='$tita_response[$i]',status='$status[$i]',response_time='$resptime[$i]' WHERE question_id = '$j' AND user_id = '$user_id' AND mock_id = '$mock_id'";	
			mysqli_query($con,$q1);
}
else if(mysqli_num_rows($re) == 0)
	{
		if($tita_response[$i] !== "")
	{
	$q2 = "SELECT * FROM $table3 WHERE question_id = '$j' AND mock_id='$mock_id'";
	$re2 = mysqli_query($con,$q2);
	$ro = mysqli_fetch_array($re2);
	$subsection_id = $ro['section_id'];
	
	$query6 =  "INSERT INTO $table ( user_id ,question_id,mock_id,subjectsection_id,response,tita,status,response_time)
        VALUES ('$user_id','$j','$mock_id','$subsection_id','$response[$i]','1','$status[$i]','$resptime[$i]')";
		mysqli_query($con,$query6);
		
	}
}
}
}
$combine_id = "m".$mock_id ."s".$school_id ."c".$class_id ."s".$section_id ;
$sql1 = "SELECT * FROM $table4 WHERE combine_id = '$combine_id' ";
$result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1) ==1)
{
	$query1 = "DELETE FROM $table4 WHERE combine_id='$combine_id'";
	mysqli_query($con,$query1);
}
$sql2 = "INSERT INTO $table4( combine_id ,temp)
        VALUES ('$combine_id','$insert')";
	 mysqli_query($con,$sql2);
	 
	 $sqls = "INSERT INTO feedbackdata( p1,p2,p3,comments,user_id,mock_id)
        VALUES ('$levels','$testint','$testexp','$comments','$user_id','$mock_id')";
	 if(mysqli_query($con,$sqls))
	 {
		echo $combine_id ; 
	 }
	}
}

?>