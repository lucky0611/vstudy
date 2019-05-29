<?php
	if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && isset($_POST['msg']))
	{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$msg=$_POST['msg'];
	$to='enquiry@vstudy.in';
	$body='Name : '.$name."\n".'From : '.$email."\n\n".'Message: '.$msg;
	$header='From : '.$email;
	$subject=$_POST['sub'];
	if(@mail($to,$subject,$body,$header))
	{
		
		echo 'Thank you! We will get in touch soon.';
	}
	else
	{
		echo 'Sorry, mail could not be sent due to some error.';
	}
	}
	else
	{
		echo 'Error';
	}
?>