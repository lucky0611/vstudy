<?php
$arr = isset($_REQUEST['arr'])? json_decode($_REQUEST['arr']):array();
$length = sizeof($arr);
for($i = 0 ;$i < $length; $i++)
{
	echo $arr[$i] ;
}
?>