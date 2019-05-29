<?php
if(!empty($_POST))
{
include("connect.php");
session_start();
$value1 = $_POST['values'];
$value = strip_tags(trim($value1));
$text1 = $_POST['texts'];
$text = strip_tags(trim($text1));
if($text == "class")
{
	$_SESSION['class'] = $value ;
}
if($text == "section")
{
	$_SESSION['section'] = $value ;
}
if($text == "school")
{
	$_SESSION['school'] = $value ;
}
}
?>
