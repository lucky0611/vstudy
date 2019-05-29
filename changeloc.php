<?php
if(isset($_POST['state']))
{
	$state = $_POST['state'] ;
	include("connect.php");
	$location = array(array());
	$sql = "SELECT * FROM location_details WHERE state_id = '$state'";
	$result = mysqli_query($con,$sql);
	$i = 0 ;
	while($row= mysqli_fetch_array($result))
	{
		$location[$i]['id'] = $row['location_id'];
		$location[$i]['city'] = $row['city'];
		$i++ ;
	}
	 echo json_encode($location,JSON_PRETTY_PRINT) ;

}
?>