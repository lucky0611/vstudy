<?php
if(!empty($_POST['mock_id']))
{
session_start();	
	if(isset($_SESSION['username']))
	{
		echo "Session Alive" ;
	}
	else 
	{
		
	} 
}
?>