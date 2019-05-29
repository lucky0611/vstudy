<?php
$username =$_SESSION['username'];
	   $email = $_SESSION['email'];
	   $user_id = $_SESSION['user_id'];
		$gender = $_SESSION['gender'];
		$image = $_SESSION['image'];
		  $phone = $_SESSION['phone'];
		  $firstname1 = $_SESSION['firstname'];
		  $firstname =strtoupper($firstname1);
		 $lastname1 = $_SESSION['lastname'];
		 $lastname =strtoupper($lastname1);
		 $school = $_SESSION['school']  ;
	  $class = $_SESSION['class'];
	  $section = $_SESSION['section'];
	  $school_name = $_SESSION['school_name'];
	  $class_name = $_SESSION['class_name'];
	  $package_id = $_SESSION['package_id'];
	  $wallet_amount = $_SESSION['wallet_amount'] ;
	  $school_id = $_SESSION['school_id'] ;
	  $table12 = "mocktest_details_".$school_name;
	 $time_action = $_SESSION['time_action'] ;
	?>	