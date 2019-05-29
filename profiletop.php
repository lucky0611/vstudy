
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

<?php
$subschool_id = $_SESSION['subschool_id'] ;
$sq ="SELECT * FROM subschool_details WHERE subschool_id='$subschool_id'";
$res = mysqli_query($con,$sq);
$roe = mysqli_fetch_array($res);
$logo = "../logo/".$roe['logo'];
$_SESSION['logo'] = $logo;
$model = $_SESSION['model'] ;
?>

