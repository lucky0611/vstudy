<?php
if(isset($_POST['location']))
{
	$location = $_POST['location'] ;
	include("connect.php");
	$locations = array(array());
	$sql = "SELECT * FROM subschool_details WHERE location_id = '$location'";
	$result = mysqli_query($con,$sql);
	$i = 0 ;
	while($row = mysqli_fetch_array($result))
	{
		if($row['approval'] == 1 && $row['allow_status'] == 1)
	{
		$locations[$i]['subschool_name'] = $row['subschool_name'];
		$locations[$i]['subschool'] = $row['subschool'];
		$i++ ;
		
	}
	}
	 echo json_encode($locations,JSON_PRETTY_PRINT) ;

}
?>
