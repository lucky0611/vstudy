<?php 
include('connect.php');
if (isset($_POST['delquiz']) || isset($_POST['deletequizbut']))
{

foreach ($_POST['delquiz'] as $id)
{

$result = mysqli_query($con, "DELETE FROM passagelist WHERE pass_id='$id'");
$result = mysqli_query($con, "DELETE FROM questiondata WHERE pass_id='$id'");

$msgggg ="Items Deleted";
}
header("Location: deletequiz.php");
}
?>