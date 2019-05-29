<?php
if(!empty($_FILES['files']))
{
	define('uploadpath','../profilepic/');
	include("connect.php");
session_start();
$user_id = $_SESSION['user_id'];
	$table = "user_details"; 
	  $image_store = $_FILES['files']['name']; 
	  $image_store1 = date('Y-m-d-H-i-s').uniqid().'.jpg' ;
	  $target = uploadpath.$image_store1 ;
	  $image_type = $_FILES['files']['type'];
	  $image_size = $_FILES['files']['size'];
				 $sql = "SELECT * FROM $table WHERE user_id= '$user_id'";
			   $result = mysqli_query($con,$sql);		  
				$row = mysqli_fetch_array($result);
	  
				 if(($image_type == 'image/gif') || ($image_type == 'image/jpeg') ||($image_type == 'image/pjpeg') ||($image_type == 'image/png'))
				  { 
				  if($image_size < 307200)
				  {
					  if($_FILES['files']['error'] == 0)
					  {
						  if(move_uploaded_file($_FILES['files']['tmp_name'],$target))
						  {
							 if($row['image'] != NULL)
				{
					
					$address = uploadpath.$row['image'];
					@unlink($address);
				}
				 
				$sql1 ="UPDATE $table SET image ='$image_store1' WHERE user_id='$user_id'";
              $result1 = mysqli_query($con,$sql1); 
		 @unlink($_FILES['files']['tmp_name']); 
$ar = array("Profile picture uploaded",$image_store1);
 echo json_encode($ar); 
							   }
 else
			  {
				  if($row['image'] == NULL)
				  {
				  echo "Image could not be moved to folder";
				  }
				  if($row['image'] != NULL)
				  {
					$ar1 = array('Image could not be moved to folder',$row['image']);  
					echo json_encode($ar1);
				  } 
			  }
					  }
					  else
			  {
				  if($row['image'] == NULL)
				  {
				  echo " File upload error";
				  }
				  if($row['image'] != NULL)
				  {
					$ar2 = array('File upload error',$row['image']);                    echo json_encode($ar2);
				  }
			  }
				  }
				  else
				  {
					  if($row['image'] == NULL)
				  {
				  echo "Image size should be less than 70kb";
				  } 
				   if($row['image'] != NULL)
				  {
					$ar4 = array('Image size should be less than 300kb',$row['image']);                  
					  echo json_encode($ar4);
				  }
				  }
				  }
				  else
			  {
				 if($row['image'] == NULL)
				  {
				  echo "Image should be only jpeg,png or gif";
				  }
				   if($row['image'] != NULL)
				  {
					$ar3 = array('Image should be only jpeg,png or gif',$row['image']);                    echo json_encode($ar3);
				  }
			  }
			  
			 }

else
{
	
	header("location: adminlogout.php");
}
?>