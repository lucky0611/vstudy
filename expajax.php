<?php
if(!empty($_FILES['files']))
{
	define('uploadpath','../expimage/');
	$con = mysqli_connect('localhost','root','','experiment') or die(mysqli_error($con));
session_start();
 
	  $image_store = $_FILES['files']['name']; 
	  $image_store1 = date('Y-m-d-H-i-s').uniqid().$image_store ;
	  $target = uploadpath.$image_store1 ;
	  $image_type = $_FILES['files']['type'];
	  $image_size = $_FILES['files']['size'];

	  
				 
	  
				 if(($image_type == 'image/gif') || ($image_type == 'image/jpeg') ||($image_type == 'image/pjpeg') ||($image_type == 'image/png'))
				  {
					  if($_FILES['files']['error'] == 0)
					  {
						  if(move_uploaded_file($_FILES['files']['tmp_name'],$target))
						  {
							 
							  
				
		 
$sql1 ="INSERT into exp (imagefile) VALUES('$image_store1')  ";
	
              $result1 = mysqli_query($con,$sql1); 
		 
			
							   }
 
					  }
					 
			  
				  }
				 
			  
			 }

else
{
	
	header("location: adminlogout.php");
}
?>