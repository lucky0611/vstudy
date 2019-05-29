<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="testsubmit.js"></script>
 <script type="text/javascript" src="browserdetect.js"></script>
<title>Question paper</title>
<style>
@font-face 
 {
 src: url('../font/Lato-Regular.ttf');
 
}
body 
{
	font-family: 'Lato', sans-serif;
}


#logo,.logo
{
 -webkit-box-shadow: 2px 0 5px 4px #969696;
  -moz-box-shadow: 2px 0 5px 4px #969696;
  box-shadow: 2px 0 5px 4px #969696;	
}
</style>
</head> 
<body>
<?php
session_start();
if(isset($_SESSION['password']) && isset($_SESSION['username']) && isset($_SESSION['start']) && isset($_SESSION['mock_id']) && isset($_GET['value']) && isset($_GET['id']))
{
include("connect.php");
$insert = $_GET['value'] ;
$combine_id = $_GET['id'] ;
$user_id = $_SESSION['user_id'];
$mock_id = $_SESSION['mock_id'];
$mock_idse = $_SESSION['mock_id'][0];
$s = "SELECT school_name FROM school_details WHERE school_id = (SELECT school_id FROM user_login WHERE user_id = '$user_id') ";
	 $re = mysqli_query($con,$s);
	 $rew = mysqli_fetch_array($re);
	 $school_name = $rew['school_name'];
	 $tab = "test_question_".$school_name ;
foreach($mock_id as $mocks_id)
{
?>
<script type="text/javascript">
mock_id = "<?php echo $mocks_id; ?>"
user_id = "<?php echo $user_id; ?>"
</script>
<?php	
}
$sql1 = "SELECT * FROM $tab WHERE combine_id = '$combine_id' ";
$result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1) ==1)
{
	$row1 = mysqli_fetch_array($result1);
	if($row1['temp'] == $insert)
	{
define('uploadpath','../images/');
include("connect.php");
?>
<div id="logo" style="width:100%;height:70px;background-color:#075caf;position:absolute;top:0px;left:0px;background-image: url(logo.jpg);background-size:55px 55px ;background-repeat:no-repeat;background-position: 10px 10px">
<h1 id="header" style="color:white ;text-align:center">Question Paper
 </h1>
   </div><br /><br /><br /><br /><br />
<?php
$num_of_sections = $_SESSION['num_of_sections'];
$class_name = $_SESSION['class_name'];
$school_name = $_SESSION['school_name'];
$section_name = $_SESSION['section'];
$mock_test_name = $_SESSION['mock_name'];
	    $table1 = "mock_section_details_".$school_name ;
      $table = "mocktest_details_".$school_name;
      $table2 = "mock_questions_".$school_name;
	  $sql3 = "SELECT * FROM $table2 WHERE mock_id='$mock_idse' ";
	  $result3 = mysqli_query($con, $sql3);
	  $question = array();
	  
	  $i =1;
	while ($row1 = mysqli_fetch_array($result3))
	 {    
	     
		 array_push($question,$row1);
		 }
		 foreach($question as $question1) 
	  {

		$section_id1 = $question[$i-1]['section_id'] ;
		if ($i ==1)
		{
			$que2 = "SELECT * FROM $table1 WHERE section_id = '$section_id1' AND mock_id='$mock_idse' ";
			$res2 = mysqli_query($con,$que2);
			$rows2 = mysqli_fetch_array($res2);
			$sec_name =$rows2['section_name'];
			?>
            <div style="width:100%;background-color:#3778BD;float:left;margin-top:20px;margin-bottom:20px;">
			<p style ="text-align:center;font-weight:bolder;font-size:40px;color:white;margin-top:2px;margin-bottom:2px">Section <?php echo $section_id1.'&nbsp;'.'-'.'&nbsp;'.$sec_name ; ?></p>
            </div>
		<?php	
		}
		if ($i != 1){
		if($question1['section_id'] != $question[$i-2]['section_id']) 
		{
			$section_id1=$question1['section_id'];
			$que1 = "SELECT * FROM $table1 WHERE section_id = '$section_id1' AND mock_id='$mock_idse' ";
			$res1 = mysqli_query($con,$que1);
			$rows1 = mysqli_fetch_array($res1);
			$sec_name =$rows1['section_name'];
			?>
            <div style="width:100%;float:left;background-color:#3778BD;margin-top:20px;margin-bottom:20px;">
			<p style ="text-align:center;font-weight:bolder;font-size:40px;color:white;margin-top:2px;margin-bottom:2px">Section <?php echo $section_id1.'&nbsp;'.'-'.'&nbsp;'.$sec_name ; ?></p>
            </div>
           
            <?php
		}
		}
		?>
<div class="logo" style="width:94%;float:left;margin-top:20px;margin-bottom:20px;background-color:white;position:relative;border:1px solid black;margin-left:auto;margin-left:3%;">
        <?php
		if($question1['imagefile'] !=NULL &&$question1['imagefile'] !='' )
		{
			$image= $question1['imagefile'];
		?>
        <div id ="imagecont<?php echo $i; ?>"  style="float:left;width:99%;height:200px;margin-top:5px;margin-bottom:5px;margin-left:2px;margin-right:2px;overflow-y:auto;"> 
        <img id ="image<?php echo $i; ?>"  src="../images/<?php echo $image; ?>" alt="image" style="">
        <script type="text/javascript">
		
		outwidth = parseInt(document.getElementById("imagecont<?php echo $i; ?>").offsetWidth) - parseInt(document.getElementById("image<?php echo $i; ?>").width);
		newwidth = parseInt(outwidth)/2 ;
		document.getElementById("image<?php echo $i; ?>").style.marginLeft = newwidth + "px";
		</script>
        </div>
		<?php 
			
		}
		?>
       
       <div class="logo" style="float:left;width:99%;height:70px;background-color:#609eda;margin-top:5px;margin-bottom:5px;margin-left:2px;margin-right:2px;overflow-y:auto"> 
       <p style="margin-top:2px;margin-bottom:2px;padding-left:10px;padding-right:10px;color:white;line-height:1.5em"><?php echo'<b>'. $i.'</b>'.'.'.'&nbsp;'. $question1['question'];?></p>
       </div>
       <div style="float:left;width:99%;border:1px dotted black;margin-top:4px;margin-bottom:4px;margin-left:2px;margin-right:2px;">
       <p style="margin-top:2px;margin-bottom:2px;padding-left:10px;padding-right:10px;color:black"><?php echo'<b>'. 'A'.'</b>'.'.'.'&nbsp;'.$question1['Option1'];?></p>
       </div>
       <div style="float:left;width:99%;border:1px dotted black;margin-top:4px;margin-bottom:4px;margin-left:2px;margin-right:2px;">
       <p style="margin-top:2px;margin-bottom:2px;padding-left:10px;padding-right:10px;color:black"><?php echo '<b>'. 'B'.'</b>'.'.'.'&nbsp;'.$question1['Option2'];?></p>
       </div>
       <div style="float:left;width:99%;border:1px dotted black;margin-top:4px;margin-bottom:4px;margin-left:2px;margin-right:2px;">
       <p style="margin-top:2px;margin-bottom:2px;padding-left:10px;padding-right:10px;color:black"><?php echo '<b>'. 'C'.'</b>'.'.'.'&nbsp;'.$question1['Option3'];?></p>
       </div>
       <div style="float:left;width:99%;border:1px dotted black;margin-top:4px;margin-bottom:4px;margin-left:2px;margin-right:2px;">
       <p style="margin-top:2px;margin-bottom:2px;padding-left:10px;padding-right:10px;color:black"><?php echo '<b>'. 'D'.'</b>'.'.'.'&nbsp;'.$question1['Option4'];?></p>
       </div>
       </div>
        <?php
		$i++ ;
		}
	?>
    <?php
$query1 = "DELETE FROM $tab WHERE combine_id='$combine_id'";
	mysqli_query($con,$query1);
	}

	else
	{
		?>
	<script type="text/javascript">
window.close();
</script>
<?php
	}
}
if(mysqli_num_rows($result1) ==0)
{
	?>
	<script type="text/javascript">
window.close();
</script>
<?php
}
}
else
{
	?>
<script type="text/javascript">
window.close();
</script>
<?php
}
?>
</body>
</html>