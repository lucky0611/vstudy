<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test</title>
 <script type="text/javascript" src="../calculator/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="teststyle.css?v=1.0.2">  
 <link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.css">
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.theme.css">
<script src="../jquery-ui-1.11.4.custom/jquery-ui.js"></script>
 <script type="text/javascript" src="browserdetect.js"></script>  
 <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
 <link type="text/css" rel="stylesheet" href="../calculator/css/calclayout.css"  />
        <script type="text/javascript" src="../calculator/js/oscZenoedited.js" ></script>
      


 </head>
<body>
<?php
session_start();
if(isset($_SESSION['password']) && isset($_SESSION['username']) && isset($_SESSION['test']) && isset($_POST['submit2'])&& isset($_POST['sellang']) && isset($_SESSION['mock_id']))
{
	?>
    <div id="totalcont" style="display:none" >
    <?php
	include("connect.php");
	$model = $_SESSION['model'] ;
	mysqli_set_charset($con,"utf8");
mysqli_query($con,"SET NAMES 'utf8'");
	date_default_timezone_set("Asia/Kolkata");
	$mocks_id = $_SESSION['mock_id'];
	$mock_idse = $_SESSION['mock_id'];
	$user_id = $_SESSION['user_id'];
	$quers = "SELECT * FROM mock_added_list WHERE user_id='$user_id' AND mock_id='$mock_idse'";
$rews = mysqli_query($con,$quers);
if(mysqli_num_rows($rews) == 1)
{
	$time_limit = $_SESSION['time_limit'];
	$qa = "SELECT * FROM user_login WHERE user_id = '$user_id'";
	$reu = mysqli_query($con,$qa);
	$rowu = mysqli_fetch_array($reu);
 $class = $_SESSION['class_name'];
	  $school = $_SESSION['school_name'];
	  
	 $section = $_SESSION['section'];
	 $tableresspace = "user_response $school" ;
	 $table_res = str_replace(" ", "_", $tableresspace);
	  $mock = $_SESSION['mock_name'] ;
	  $mockupper = strtoupper($mock);
	   $table2 = "mock_section_details_".$school ;
      $table1 = "mocktest_details_".$school;
      $table3 = "mock_questions_".$school;
	  $tableh = "mock_questions_hindi_".$school;
	  $tab = "time_remaining_".$school ;
	  $queries2 = "SELECT * FROM school_details WHERE school_name = '$school'";
		$resulti2 = mysqli_query($con, $queries2);
		$rowi2 = mysqli_fetch_array($resulti2);
		$school_id = $rowi2['school_id'];
		$queries3 = "SELECT * FROM section_details WHERE section_name = '$section'";
		$resulti3 = mysqli_query($con, $queries3);
		$rowi3 = mysqli_fetch_array($resulti3);
		$section_id = $rowi3['section_id'];
		$queries4 = "SELECT * FROM class_details WHERE class_name = '$class'";
		$resulti4 = mysqli_query($con, $queries4);
		$rowi4 = mysqli_fetch_array($resulti4);
		$class_id = $rowi4['class_id'];
		
	  $sql1 = "SELECT * FROM $table3 WHERE mock_id='$mock_idse'" ;
	  $result1 = mysqli_query($con, $sql1);
	  $mock_acttime = $_SESSION['acttime'] ;
 $mock_endtime =  $_SESSION['endtime'] ;
 $test_time =  $_SESSION['test_time'] ;
 $test_time = $mock_acttime - $mock_endtime ;
 $time_diff =  $mock_acttime - time() ;
 $time_diff1 = $time_diff + 3600 ;
 
 if($time_diff <= 0 && time()<= $mock_endtime + 3600 )
 {
	  
$quer =  "SELECT * FROM $tab WHERE mock_id ='$mocks_id' AND user_id = '$user_id' AND mock_state ='2'";
$resul = mysqli_query($con,$quer);
if(mysqli_num_rows($resul) == 0)
{
	
	  $query1 = "SELECT * FROM $table1 WHERE mock_id ='$mocks_id'";
	  $res1 = mysqli_query($con,$query1);
	  $rowline1 = mysqli_fetch_array($res1);
	  $num_sec = $rowline1['num_of_sections'];
	  $num_opt = $rowline1['num_option'];
	  $calci = $rowline1['calculator'];
	  $_SESSION['test_mode'] = $rowline1['test_mode'];
	  $_SESSION['num_of_sections'] = $num_sec ;
	  $insert = $user_id.$mocks_id.microtime() ;
	  $insert1 = $mocks_id.microtime().$user_id.$section ;
	  
	  ?>
      <script type="text/javascript">
	  seconds = new Array() ;
	  num_sec =" <?php echo $num_sec ; ?>"
	   insert = "<?php echo $insert; ?>"
	   insert1 = "<?php echo $insert1; ?>"
	  mock_id = "<?php echo $mocks_id; ?>"
	  user_id = "<?php echo $user_id; ?>"
	  num_opt = "<?php echo $num_opt; ?>"
	  sellang = "<?php echo $_POST['sellang'] ; ?>";

	  </script>
      <?php
	  
	  $question = array(array());
	  $push = array();
	  $hindques = array();
	  $i =1;
	  $s = 0;
	   //$section_id1 = array();
	   $secdatastore = array();
	   ?>
       <div id="calciup" style="position:fixed;top:10px;right:170px;width:463px;visibility:hidden">
   <?php
   include("calci.php");
   ?>
   </div>
       <div style="width:100%;position:absolute;top:0;bottom:0px;left:0px">
       <?php
	   $logo = $_SESSION['logo'];
	   ?>
       <div id="logo" style="width:100%;height:7.7%;background-color:#2D70B6;float:left;background-image: url(<?php echo $logo ;?>);background-size:auto 40px ;background-repeat:no-repeat;background-position: 20px 10px">
<h1 id="header" style="color:white ;text-align:center;margin-top:5px"><?php echo $mockupper ; ?>
 </h1>
   </div>
    <div style="float:left;width:100%;height:5%;background-color:#363636;margin-top:-10px">
    <span style="float:right;margin-right:5px"><img alt="info" style="height:25px;width:25px;position:relative;top:9px" src="infosym.png?v=1.01"   />&nbsp;<span style="color:white;font-size:14px;cursor:pointer" id="openinst">Instructions</span></span>&nbsp;&nbsp;
    <span style="float:right;margin-right:5px"><img alt="info" style="height:25px;width:25px;position:relative;top:9px" src="infosym.png?v=1.01"   />&nbsp;<span style="color:white;font-size:14px;cursor:pointer" id="openques">Question Paper</span></span>
 </div>
 <br /><br /><br />      
   
       <?php
	   $sqlh3 = "SELECT * FROM $tableh WHERE mock_id = '$mocks_id'";
		 $resulth3 = mysqli_query($con, $sqlh3);
		 
		 while ($rowh = mysqli_fetch_array($resulth3))
	 { 
 
	  array_push($hindques,$rowh);
	 }
	 function sortByOrder($a, $b)
 {
    return $a['question_id'] - $b['question_id'];
}

usort($hindques, 'sortByOrder');
 sort($hindques);
 
 //$row1 = array() ;
 $rowsd = array() ;
     while ($rowcount1 = mysqli_fetch_array($result1))
	 { 
	 array_push($rowsd,$rowcount1);
	 }
	 
 usort($rowsd, 'sortByOrder');
 sort($rowsd);
  
 foreach($rowsd as $row1)
 { 
	 $question[$s]['question_id'] = $row1['question_id'];  
		 $question[$s]['question'] = $row1['question'];  
		   $question[$s]['Option1'] = $row1['Option1']; 
			$question[$s]['Option2'] = $row1['Option2'];
			$question[$s]['Option3'] = $row1['Option3'];
			$question[$s]['Option4'] = $row1['Option4']; 
			$question[$s]['imagefile'] = nl2br($row1['imagefile']);
			$question[$s]['section_id'] = $row1['section_id'];
			$question[$s]['tita'] = $row1['tita'];
			
	 $ques_id = $row1['question_id'];
	 $subsection_id =  $row1['section_id'];
	 $question[$s]['questionh']= $hindques[$s]['question'];
			$question[$s]['option1h']= $hindques[$s]['Option1'];
			$question[$s]['option2h']= $hindques[$s]['Option2'];
			 $question[$s]['option3h']= $hindques[$s]['Option3'];
			 $question[$s]['option4h']= $hindques[$s]['Option4'];
			 if($num_opt == 5)
			 {
			 $question[$s]['option5h']= $hindques[$s]['Option5'];
			 $question[$s]['Option5']= $row1['Option5']; 
			 }
			 else
			 {
			 $question[$s]['option5h']= "";
			 $question[$s]['Option5']= "";
			 }
			 $question[$s]['imagefileh']= nl2br($hindques[$s]['imagefile']);
			  $question[$s]['passageh']= $hindques[$s]['passage'];
			  $question[$s]['passage'] = $row1['passage'];
	 $sqls = "SELECT * FROM $table_res WHERE question_id = '$ques_id' AND user_id = '$user_id' AND mock_id = '$mocks_id' ";
	$results = mysqli_query($con,$sqls);
	 if(mysqli_num_rows($results) == 1)
	{
		
		$rows = mysqli_fetch_array($results);
		//$question[$s]['tita'] = $rows['tita'] ;
		if($rows['tita'] == 0)
		{
		$question[$s]['checked'] = $rows['response'];
		$question[$s]['tita_checked'] = "" ;
		}
		if($rows['tita'] == 1)
		{
		$question[$s]['checked'] = 0;
		$question[$s]['tita_checked'] = $rows['tita_score']; ;
		}
		$question[$s]['status1'] = $rows['status'];
		$question[$s]['response_time'] = $rows['response_time'];
	}
	
	else if(mysqli_num_rows($results) == 0)
	{
	//	$question[$s]['tita'] = 0 ;
	$question[$s]['checked'] = 10;
	$question[$s]['tita_checked'] = "" ;
	$question[$s]['status1'] = 1 ;
	$question[$s]['response_time'] = 0;	
	if($s == 0)
	{
		if($question[$s]['tita'] == 1)
		{
		$queries6 =  "INSERT INTO $table_res ( user_id ,question_id,mock_id,subjectsection_id,tita,status,response_time)
        VALUES ('$user_id','$ques_id','$mocks_id','$subsection_id','1','2','0')";
		mysqli_query($con,$queries6);	
	}
	else if($question[$s]['tita'] == 0)
		{
		$queries6 =  "INSERT INTO $table_res ( user_id ,question_id,mock_id,subjectsection_id,response,options,status,response_time)
        VALUES ('$user_id','$ques_id','$mocks_id','$subsection_id','0','1','2','0')";
		mysqli_query($con,$queries6);	
	}
	}
	}
	  $s++ ;
		 }
		 ?>
         <script type="text/javascript">
		  test = <?php echo json_encode($question, JSON_PRETTY_PRINT) ?>;
		  
		 </script>
          
          
          <div style="width:81%;float:left;position:relative;height:16%;border-right:2px solid #eeeeee;border-bottom:2px solid #eeeeee">
          <div style="width:100%;background-color:#eeeeee;height:44%">
          <?php
		  for($t=1;$t<= $num_sec;$t++)
		  {
		?>
        
        <button type="button" class="stylebutton" style="background-color:#eeeeee;width:120px;text-align:center;height:32px;color:white;margin-top:5px;margin-left:15px;border-radius:3px;background-image: url('buttgroup.png') ;background-repeat:no-repeat;appearance:none;background-size:100% 100%;padding-top:-5px;font-size:16px">Group <?php echo $t ; ?></button>
        
        <?php
		  }
		  ?>
          </div>
       <div style="height:23%;width:100%;float:left">
       <span style="margin-top:12px">&nbsp;&nbsp;Section
       <span style="font-size:14px;margin-top:6px;margin-right:6px;font-weight:bold;float:right"><span style="">Time Left:&nbsp;&nbsp;</span><span id="hour" ></span><span style="color:#4f7fc9;font-weight:bold" >:</span><span id="min"></span ><span style="color:#4f7fc9;font-weight:bold" >:</span><span id="sec"></span></span>
       </div>
       <div style="height:33%;width:100%;border:2px solid #eeeeee;float:left">
          <?php
		  $z =1 ;
		  $totques = array() ;
		  $test_start_ques = array();
		  $test_end_ques = array();
		  $sec_name = array() ;
		 
		  foreach($question as $question1) 
	  {
		
		$section_id1 = $question[$i-1]['section_id'] ;
		if ($i ==1)
		{
			$sql2 = "SELECT * FROM $table2 WHERE section_id = '$section_id1' AND mock_id = '$mocks_id'";
			$result2 = mysqli_query($con,$sql2) ;
			$row2 = mysqli_fetch_array($result2);
			$sectionbutt = $row2['section_name'];
			$sec_name[$z-1] = $row2['section_name'];
			$totques[$z-1] =  $row2['no_of_question'];
			$test_start_ques[$z-1] = $i ;
			$test_end_ques[$z-1] = $i + $totques[$z-1] - 1  ;
			array_push($secdatastore,$row2);
		?>
          
        <div style="float:left;position:relative;margin-left:10px">
         <button class="stylebutton" style="display:none;cursor:pointer;text-align:center;"  id ="section<?php echo $z ;?>" onclick="section(<?php echo $i-1 ;?> ,<?php echo $z ;?>)" ><span style="position:relative;top:-5px"><?php echo $sectionbutt ;?>&nbsp; <img id ="sectionimg<?php echo $z ;?>" alt="info" style="height:25px;width:25px;position:relative;top:9px" src="infosym.png?v=1.01"   /></span>&nbsp;</button>
        
        
       <div id="falldown<?php echo $z ;?>" class = "falldown" style="display:none;position:absolute;z-index:1;width:240px;background-color:#E5F6FD;left:100%;top:0px;font-size:12px;">
       <div style="border-bottom:2px solid #eeeeee;font-size:16px;padding-top:-6px;font-weight:bold;width:100%">&nbsp;<?php echo $sectionbutt ;?></div>
                      <p><button type="button" id="att<?php echo $z ;?>"  class="buttongreencol1" style="color:white;margin-right:5%;font-size:10px;" ></button>&nbsp; &nbsp; <span style="margin-left:5%" >Attempted</span> </p>
        <p><button type="button" id="unatt<?php echo $z ;?>" class="buttonredcol1" style="margin-right:5%;color:white;font-size:10px;"></button>&nbsp;&nbsp;<span style="margin-left:5%" >Unanswered </span> </p>
        <p><button type="button" id="mark<?php echo $z ;?>"  class="buttonpurplecol1" style="color:white;font-size:10px;"></button>&nbsp;&nbsp; <span style="margin-left:5%" >Marked For Review </span></p>
        <p><button type="button" id="notvis<?php echo $z ;?>" style="margin-right:5%;background-color:rgb(221,221,221);color:black;font-size:10px;border:1px solid #bcbcbc;height:35px;width:35px"> </button>&nbsp;&nbsp;<span style="margin-left:5%" >Not Visited</span></p>
   <p><button type="button" id="markrev<?php echo $z ;?>"  class="buttonpurpletickcol1" style="color:white;font-size:10px;"></button>&nbsp; &nbsp;<span style="margin-left:4%" >Answered & Marked for Review</span>  </p>
    
        </div>
        </div>
        <?php
			
		}
		if ($i != 1)
		{
		if($question1['section_id'] != $question[$i-2]['section_id']  ) 
		{
			$z++ ;
			$section_id1=$question1['section_id'];
			$sql2 = "SELECT * FROM $table2 WHERE section_id = '$section_id1' AND mock_id = '$mocks_id' ";
			$result2 = mysqli_query($con,$sql2) ;
			$row2 = mysqli_fetch_array($result2);
			$sectionbutt = $row2['section_name'];
			$sec_name[$z-1] = $row2['section_name'];
			$totques[$z-1] =  $row2['no_of_question'];
			$test_start_ques[$z-1] = $i ;
			$test_end_ques[$z-1] = $i + $totques[$z-1] - 1  ;
			array_push($secdatastore,$row2);
		?>
        
         <div style="float:left;position:relative;margin-left:10px">
        <button class="stylebutton" style="display:none;cursor:pointer;display:inline;"  id ="section<?php echo $z ;?>" onclick="section(<?php echo $i-1 ;?> ,<?php echo $z ;?>)" ><span style="position:relative;top:-5px"><?php echo $sectionbutt ;?>&nbsp; <img id ="sectionimg<?php echo $z ;?>" alt="info" style="height:25px;width:25px;position:relative;top:9px" src="infosym.png?v=1.01"   /></span>&nbsp;</button>
        
    
         <div id="falldown<?php echo $z ;?>" class = "falldown" style="display:none;position:absolute;z-index:1;width:240px;background-color:#E5F6FD;left:100%;top:0px;font-size:12px">
       <div style="border-bottom:2px solid #eeeeee;width:100%;font-size:16px;padding-top:-6px;font-weight:bold">&nbsp;<?php echo $sectionbutt ;?></div>
                     <p><button type="button" id="att<?php echo $z ;?>"  class="buttongreencol1" style="color:white;margin-right:5%;font-size:10px;" ></button>&nbsp; &nbsp; <span style="margin-left:5%" >Attempted</span> </p>
        <p><button type="button" id="unatt<?php echo $z ;?>" class="buttonredcol1" style="margin-right:5%;color:white;font-size:10px;"></button>&nbsp;&nbsp;<span style="margin-left:5%" >Unanswered </span> </p>
        <p><button type="button" id="mark<?php echo $z ;?>"  class="buttonpurplecol1" style="color:white;font-size:10px;"></button>&nbsp;&nbsp; <span style="margin-left:5%" >Marked For Review </span></p>
        <p><button type="button" id="notvis<?php echo $z ;?>" style="margin-right:5%;background-color:rgb(221,221,221);color:black;font-size:10px;border:1px solid #bcbcbc;height:35px;width:35px"> </button>&nbsp;&nbsp;<span style="margin-left:5%" >Not Visited</span></p>
   <p><button type="button" id="markrev<?php echo $z ;?>"  class="buttonpurpletickcol1" style="color:white;font-size:10px;"></button>&nbsp; &nbsp;<span style="margin-left:4%" >Answered & Marked for Review</span>  </p>
    
        </div>
        </div>
        <?php	
		}
		}
		$i++ ;
	  }
	  ?>
      </div>
       
 <script type="text/javascript">
totquestion = <?php echo json_encode($totques) ?>;
test_start_ques = <?php echo json_encode($test_start_ques) ?>; 
test_end_ques = <?php echo json_encode($test_end_ques) ?>;
secdatastore = <?php echo json_encode($secdatastore) ?>;
sec_name = <?php echo json_encode($sec_name) ?>;
</script>

 </div>    
      
      <?php
	  $sqf = "SELECT * FROM user_details WHERE user_id = '$user_id'";
	$ref = mysqli_query($con,$sqf);
	$rowf = mysqli_fetch_array($ref);
	$first = strtolower($rowf['firstname']);
	$first1 = substr($first,0,1);
	$first2 = substr($first,1);
	$first3 = strtoupper($first1);
	$firstname = $first3.$first2;
	  ?>
   <div style="width:19%;float:left;position:relative;;height:16%;background-color:#F8FBFF;" >
     
   
<div style="width:31%;height:100%;float:left"> 
        <?php
	
	if($rowf['image'] != NULL || $rowf['image'] != "")
	{
		 if($model == 2 || $model == 3)
		{
		?>
        <img src="<?php echo $rowf['image'] ; ?>" alt="" style="width:100%;height:80%;border:1px solid grey;margin-left:5px;margin-top:10px;float:left" />
        <?php
		}
		else
		{
		?>
        <img src="../profilepic/<?php echo $rowf['image'] ; ?>" alt="" style="width:100%;height:80%;border:1px solid grey;margin-left:5px;margin-top:10px;float:left" />
        <?php
		}
	}
	else
	{
		?>
       <img src="newimage.jpg" alt=""  style="width:100%;height:80%;border:1px solid grey;margin-left:5px;margin-top:10px;float:left "/> 
        <?php
	}
		  ?>
          </div>
 <div style="width:65%;height:75%;float:left">     
   <span style="line-height:0.1em;font-size:18px;font-weight:bold;float:left;margin-left:20px;margin-top:20px" ><?php echo $firstname."&nbsp;".$rowf['lastname'];  ?></span>
   <div style="float:left;margin-top:25px">
   

<?php
if($calci == 1)
{
?>
<input type="button" onclick ="showcal()" style="background-color:#2692cf;color:white;border-radius:5px;height:1.7em;margin-top:1px;margin-left:10px;appearance: none;box-shadow:none;border:1px solid #1472cc;cursor:pointer;background: linear-gradient(#6bcdf4 ,#1281c6);
background: -webkit-linear-gradient(#6bcdf4 ,#1281c6);
background: -o-linear-gradient(#6bcdf4 ,#1281c6);
background: -moz-linear-gradient(#6bcdf4 ,#1281c6);" value="  Calculator  ">
<?php
}
?>
</div> 
   </div>
    <div style="width:65%;height:25%;float:left;"> 
   <a id="openpro" style="color:#4E85C5;text-decoration:underline;font-size:14px;float:left;margin-left:20px;cursor:pointer" >Profile</a>
   </div>
       </div>
     
          
          
          <div id="cover" style="width:81%;float:left;margin-top:0px;height:58%;border:1px solid silver;border-top:none;position:relative ">
          <img id="slidetog" style="position:absolute;right:0%;top:50%;cursor:pointer;z-index:100" alt="slideright" src="slideright.png" onclick="slidetogs(1)" />
          <img id="slidetog1" style="position:absolute;right:0%;top:50%;cursor:pointer;display:none;z-index:100" alt="slideleft" src="slideleft.png" onclick="slidetogs(2)" />
           <div style="width:100%;float:left;height:9%;">   
   <p style="float:right;font-size:14px;margin-top:0px;padding:5px;margin-right:1%;color:#F27F5F">Marks for correct answer <span>   <?php echo $rowline1['correct_marks']; ?>&nbsp; ; &nbsp;</span>Negative Marks  <span style="color:#F27F5F">  <?php echo -$rowline1['incorrect_marks']; ?></span></p>    <p style="float:left;margin-left:10px;color:#F27F5F;font-weight:bold;margin-top:3px;font-size:14px" id="questype"></p>
      </div>  
      <div id="languagehold" style="float:left;width:100%;position:relative;height:9%;background-color:#4E85C5">
         
         <?php
		 for($v = 1;$v<= sizeof($question);$v++)
		 {
		 ?>
         <p id= "languagechange<?php echo $v ; ?>" style="position:absolute;;top:-8px;right:20px;visibility:hidden"><span style="color:white">View in:</span> <select name = "language" id= "language<?php echo $v ; ?>"  >
     <option value="english" >English</option>
     <option value="hindi">Hindi</option>
   </select></p>
   <script>
   if(sellang == 1)
   {
	  
	   document.getElementById("language<?php echo $v ; ?>").selectedIndex = 0
   }
     if(sellang == 2)
   {
	 
	   document.getElementById("language<?php echo $v ; ?>").selectedIndex = 1
   }
   </script>
          
          <?php
          }
		  ?>
          </div>
          
          <div  id ="quesimageoptbox" style ="width:100%;height:100%;float:left;border-top:2px solid #eeeeee;">
          <div style="width:100%;height:7%;float:left">
           <span style="margin-left:0%;float:left;font-weight:bold">Question No. <span id="numb"></span></span>
		     <span id="down" style="margin-right:2%;float:right;color:red;font-size:12px;font-weight:bold;margin-top:5px;cursor:pointer">Report Question <i class="fa fa-exclamation-triangle" ></i></span>
			 <div class="width:25%" style="position:relative;z-index:100;font-size:12px">
<div id="show" style="width:150px;z-index:100;margin-top:0px;position:absolute;right:25px;top:23px;display:none;background-color:white">
 <a id="wrongques"  style="color:black;text-decoration:none;cursor:pointer" > <div   >
<p  style="text-align:center;margin-top:0px;border-bottom:1px dotted grey;" class="reporterrors" onmouseover="changecol(this)" onmouseout="changecol1(this)" >&nbsp;&nbsp;&nbsp;Wrong Question</p>
</div></a>
<a id="formaterror"  style="color:black;text-decoration:none;cursor:pointer" ><div  class="reporterrors" onmouseover="changecol(this)" onmouseout="changecol1(this)"  >
<p  style="text-align:center;margin-top:-10px;margin-bottom:1px;border-bottom:1px dotted grey">&nbsp;&nbsp;&nbsp;Formatting Error</p>
</div></a>
<a id="missdata"  style="color:black;text-decoration:none;cursor:pointer" ><div  class="reporterrors" onmouseover="changecol(this)" onmouseout="changecol1(this)"  >
<p  style="text-align:center;margin-top:0px;margin-bottom:1px;">&nbsp;&nbsp;Data Missing</p>
</div></a>
</div>
</div>
</style>
<script>
$(document).ready(function() {
 $('#down').click(function(evt) {
    $('#show').css("display","block");
	evt.stopPropagation();
}); 
$(document).click(function() {
    $('#show').css("display","none");
});  
});
function changecol(y)
{
	var elem = document.getElementsByClassName("reporterrors");
	for(var i=0;i<elem.length;i++)
	{
		if(elem[i] == y)
		{
		
		elem[i].style.backgroundColor = "#e0e0e0";
		elem[i].style.color = "white "
		}
		else
		{
			
			elem[i].style.backgroundColor = "white";
			elem[i].style.color = "black "
		}
	}
	
}
function changecol1(y)
{
	var elem = document.getElementsByClassName("reporterrors");
	for(var i=0;i<elem.length;i++)
	{
		
			elem[i].style.backgroundColor = "white";
			elem[i].style.color = "black"
		
	}
}
</script>
			 
           </div> 
          <div  id ="quesimageoptbox1" style="width:100%;margin-top:0px;float:left;position:relative;height:100%;margin-top:0px;border-bottom:2px solid #eeeeee;border-top:2px solid #eeeeee;">
         
          <div id="imagebox" style="width:0%;float:left;position:relative;">
          <?php
		 $y = 1;
		  foreach($question as $question1) 
	  {
		  ?>
          <div id="passagdiv<?php echo $y; ?>" style="position:absolute;left:0px;top:0px;width:98%;overflow-y:auto;overflow-x:auto;height:100%;visibility:hidden;text-align:justify">
          <p id="passdiv<?php echo $y; ?>"  style="width:98%;margin-left:1%" /><?php echo $question[$y-1]['passage'] ?></p>
          </div>
          
          <div id="imagediv<?php echo $y; ?>" style="position:absolute;left:0px;top:0px;width:100%;overflow-y:auto;overflow-x:auto;height:100%;visibility:hidden;text-align:justify">
         
          <img id="image<?php echo $y; ?>" src="http://www.vstudy.in/test/images/<?php echo $question[$y-1]['imagefile'] ?>" alt="image" style="width:98%;" />
          </div>
         
          <div id="imagedivhindi<?php echo $y; ?>" style="position:absolute;left:0px;top:0px;width:100%;overflow-y:auto;overflow-x:auto;height:100%;visibility:hidden;text-align:justify">
          <?php
		 if($question[$y-1]['imagefileh']!= NULL || $question[$y-1]['imagefileh']!= "" )
		 {
          ?>
          <img id="imagehindi<?php echo $y; ?>" src="http://www.vstudy.in/test/images/<?php echo $question[$y-1]['imagefileh'] ?>" alt="image" style="width:98%;" />
          <?php
		 }
		else if($question[$y-1]['imagefileh']== NULL || $question[$y-1]['imagefileh']== "" )
		 {
          ?>
          <img id="imagehindi<?php echo $y; ?>" src="http://www.vstudy.in/test/images/<?php echo $question[$y-1]['imagefile'] ?>" alt="image" style="width:98%;" />
          <?php
		 }
		  ?>
           
          </div>
          
          <div id="passagdivhindi<?php echo $y; ?>" style="position:absolute;left:0px;top:0px;width:98%;overflow-y:auto;overflow-x:auto;height:100%;visibility:hidden;text-align:justify">
          <p id="passdivhindi<?php echo $y; ?>" style="width:98%;margin-left:1%" /><?php echo $question[$y-1]['passageh'] ?></p>
          </div>
          
          <?php
		  $y++;
	  }
	  ?>
          </div>
                    <div id="questionbox" style="width:90%;overflow-y:auto;overflow-x:hidden;float:left;height:76%;margin-left:10px;">
         <p id ="question" style="line-height:1.5em;text-align:justify;padding-left:20px;margin-right:10px"></p><br />
         
         <div style ="float:left;width:100%;position:relative;padding-left:20px" id="radio">
                <?php
		 $j = 1;
		  foreach($question as $question1) 
	  {
		  ?>	  
		  
          <div class="radio" style="position:absolute;top:5px;width:90%;visibility:hidden;text-align:justify" id ="radio<?php echo $j;?>">
          <?php
		   if($question[$j-1]['tita'] == 0)
		  {
		  ?>
		  

          <input type="radio" id="option1<?php echo $j;?>" name="option<?php echo $j;?>"  value="1" style="" /><label for="option1<?php echo $j;?>"></label>&nbsp;&nbsp;&nbsp;&nbsp;<span id="option1text<?php echo $j;?>"></span><br /><br />
         <input type="radio" id="option2<?php echo $j;?>"  name="option<?php echo $j;?>" value="2" style="" /><label for="option2<?php echo $j;?>"></label>&nbsp;&nbsp; &nbsp;&nbsp;<span id="option2text<?php echo $j;?>"></span><br /><br />
         <input type="radio" id="option3<?php echo $j;?>"  name="option<?php echo $j;?>" value="3" style="" /><label for="option3<?php echo $j;?>"></label>&nbsp;&nbsp; &nbsp;&nbsp;<span id="option3text<?php echo $j;?>"></span><br /><br />
         <input type="radio" id="option4<?php echo $j;?>" name="option<?php echo $j;?>" value="4" style="" /><label for="option4<?php echo $j;?>"></label>&nbsp;&nbsp; &nbsp;&nbsp;<span id="option4text<?php echo $j;?>"></span>
         <br /><br />
         <?php
		 if($num_opt == 5)
		 {
		 ?>
         <input type="radio" id="option5<?php echo $j;?>" name="option<?php echo $j;?>" value="5" style="" /><label for="option5<?php echo $j;?>"></label>&nbsp;&nbsp; &nbsp;&nbsp;<span id="option5text<?php echo $j;?>"></span>
         <br /><br />
         <?php
		 }
		  }
		 else if($question1['tita'] == '1')
		 {
			 ?>
             
             <?php
			 include("tita.php");
		 }
		 
		 ?>
  </div>
  <?php
  $j++ ;
	  }
  ?>
          </div>
          </div>
     
          </div>
          </div>
          </div>
          <div id="coversmall" style="width:19%;float:left;margin-top:0%;height:58%;position:relative;border:2px solid black ">
 <div style="position:absolute;top:0%;width:100%;height:27%">

         <div style="width:50%;float:left;margin-bottom:3px">
		 <div style="width:30%;float:left">
		 <button id="greenincount" style="background-image:url('green.png?v=1.0.1');background-size: 35px 35px;width: 35px;background-repeat:no-repeat;border:none;appearance: none;height:35px;font-size:12px;background-color:white;color:white"></button>
		 </div>
		 <div style="width:70%;float:left">
		 <span style="font-size:12px;position:relative;top:6px">Answered</span>
		 </div>
		 </div>
		 <div style="width:50%;float:left;margin-bottom:3px;">
		 <div style="width:30%;float:left">
		 <button id="redincount" style="background-image:url('red.png?v=1.0.1');background-size: 35px 35px;width: 35px;background-repeat:no-repeat;border:none;appearance: none;height:35px;font-size:12px;background-color:white;color:white"></button>
		 </div>
		 <div style="width:70%;float:left">
		 <span style="font-size:12px;position:relative;top:6px">Not Answered</span>
		 </div>
		 </div>
		 <div style="width:50%;float:left;margin-bottom:3px">
		 <div style="width:30%;float:left">
		 <button id="whiteincount" style="width: 32px;background-repeat:no-repeat;border:none;appearance: none;height:32px;font-size:12px;border-radius:6px"></button>
		 </div>
		 <div style="width:70%;float:left">
		 <span style="font-size:12px;position:relative;top:6px">Not visited</span>
		 </div>
		 </div>
		 <div style="width:50%;float:left">
		 <div style="width:30%;float:left">
		 <button id="purpincount" style="background-image:url('purple.png?v=1.0.1');background-size: 35px 35px;width: 35px;background-repeat:no-repeat;border:none;appearance: none;height:35px;font-size:12px;background-color:white;color:white"></button>
		 </div>
		 <div style="width:70%;float:left">
		 <span style="font-size:12px;position:relative;top:6px">Marked for Review</span>
		 </div>
		 </div>
		 <div style="width:70%;float:left">
		 <div style="width:23%;float:left">
		 <button id="purptickincount" style="background-image:url('purpletick.png?v=1.0.1');background-size: 35px 35px;width: 35px;background-repeat:no-repeat;border:none;appearance: none;height:35px;font-size:12px;background-color:white;color:white"></button>
		 </div>
		 <div style="width:77%;float:left">
		 <span style="font-size:12px;position:relative;top:6px">Answered & Marked for Review</span>
		 </div>
		 </div>
          </div>        
  <div style="width:100%;position:absolute;top:27%;background-color:#4E85C5;height:6%">
          <span id="secid" style="position:relative;top:4px;font-size:14px;color:white"></span>
          </div>
           
          <?php
		  $number = 1 ;
		  $box = array();
		  
		  for($a = 1 ; $a <= $num_sec; $a++)
		  {
			  $newarray = array() ;
			  $query2 = "SELECT * FROM $table2 WHERE section_id = '$a' AND mock_id = '$mocks_id'"; 
		$res2 = mysqli_query($con,$query2);
		$rowline2 = mysqli_fetch_array($res2); 
		$q =  $rowline2['no_of_question'];
		?>
       
        <div style="position:absolute;top:33%;width:100%;visibility:hidden;height:67%;overflow-y:auto;overflow-x:hidden;margin-bottom:0px;background-color:#E5F6FD;" id ="<?php echo 'numbers'.$a; ?>">
        <p style="font-size:12px"><b>Choose a question</b></p>
        <?php
		$newarray = array() ;
		for($b = 1;$b <= $q ; $b++)
		{
		  ?>
          
          <div style="float:left;position:relative;margin-bottom:6%;;margin-left:2px">
          
            <button  class="whitebut" onclick="changeques(<?php echo $number; ?>)" id="button<?php echo $number; ?>"><span style="text-align:center;font-weight:bold;cursor:pointer"><?php echo $number; ?></span></button>&nbsp;
            <?php
			  
		  ?>
          </div>
          
          <?php
		 array_push($newarray,$number);
		 $number++ ;
		}
		$box[$a] = $newarray ;
		?>
        
        
       </div> 
       
        <?php
		  }
		  ?>
          <script type="text/javascript">
		  box = <?php echo json_encode($box) ?>;
		 </script>
         
      </div>
           <div style="width:81%;height:7.5%;float:left;position:relative;border:2px solid #eeeeee">
          
          <div style="float:left;margin-top:.5%;">
          <button  onclick="reviewnext()"  style="background-color:white;font-size:18px;border:2px solid #EEEEEE;height:2.2em;cursor:pointer;text-align:center"  onmouseover = "changenextcolor(this)" onmouseout = "changenextcolor1(this)" >Mark for Review & Next</button>
          </div>
          <div style="float:left;margin-top:.5%;margin-left:5px">
          <button  onclick="clearres()" style="background-color:white;font-size:18px;border:2px solid  #EEEEEE;height:2.2em;cursor:pointer;text-align:center"  onmouseover = "changenextcolor(this)" onmouseout = "changenextcolor1(this)" > Clear Response</button>
          </div>
          <div style="float:right;;margin-top:.5%;margin-right:5px">
          <button  onclick ="savenext()" style="background-color:#0C7CD5;font-size:18px;border:2px solid  #EEEEEE;cursor:pointer;text-align:center;color:white;height:2.2em;"  >Save & Next</button>
          </div>
          </div>   
          
         <div style="width:19%;height:7.5%;float:left;background-color:#E5F6FD;border: 2px solid #eeeeee" align="center">
    
         
         <button style="text-align:center;width:50%;;margin-top:5px;color:white;background-color:#75C5F0;border:none;appearance:none;height:2.2em;font-size:18px;cursor:pointer"onclick ="confirmsubmit()">Submit</button>
         
         </div>
          
       <script>
	   function changenextcolor(x)
  {
	  x.style.backgroundColor = "#0C7CD5";
	  x.style.color ="white";
  }
  function changenextcolor1(x)
  {
	  x.style.backgroundColor = "white";
	  x.style.color ="black";
  }
  </script> 
          <?php


$query3 =  "SELECT * FROM $tab WHERE mock_id ='$mocks_id' AND user_id = '$user_id'";
$result3 = mysqli_query($con,$query3);
if(mysqli_num_rows($result3) == 0)
{
	$query4 = "SELECT * FROM $table1 WHERE mock_id ='$mocks_id'";
	$result4 = mysqli_query($con,$query4);
	$row4 = mysqli_fetch_array($result4);
	$test_duration = $row4['test_duration'];
	$sql3 =  "INSERT INTO $tab ( user_id ,mock_id,timeremain,mock_state,start_time)
        VALUES ('$user_id','$mocks_id','$test_duration','1',NOW())";
	$res3 = mysqli_query($con,$sql3);
	if($rowline1['time_limit'] == 0)
	{
	?>
    <script type="text/javascript">
	timelim = 0 ;
	seconds[0] = "<?php echo $test_duration ;?>"
	</script>
    <?php
	}
	if($rowline1['time_limit'] == 1)
	{
		?>
		<script type="text/javascript">
		timelim = 1 ;
		</script>
        <?php
	$sqls4 = "SELECT * FROM $table2 WHERE mock_id='$mocks_id'";
	$results4 = mysqli_query($con,$sqls4);
	$secstart = 1;
	$p = 0;
	while($rows4 = mysqli_fetch_array($results4))
	{
		
	?>
    <script type="text/javascript">
	seconds[<?php echo $p ;?>] = "<?php echo $rows4['time_limit'] ;?>"
	</script>
    <?php
	$p++ ;
	}
	}
	?>
    <script type="text/javascript">
	test_dur = <?php echo $test_duration ;?>
	</script>
    <?php
	
}
else if(mysqli_num_rows($result3)== 1)
{
	$row5 = mysqli_fetch_array($result3);
	$test_duration = $row5['timeremain'];
	if($rowline1['time_limit'] == 0)
	{	
	?>
    <script type="text/javascript">
	timelim = 0 ;
	seconds[0] = "<?php echo $test_duration ;?>"
	</script>
    <?php
	}
	if($rowline1['time_limit'] == 1)
	{
		?>
		<script type="text/javascript">
		timelim = 1 ;
		</script>
        <?php
	$sqls4 = "SELECT * FROM $table2 WHERE mock_id='$mocks_id'";
	$results4 = mysqli_query($con,$sqls4);
	$p = 0;
	$p1 = 1 ;
	$sumtime = 0;
	while($rows4 = mysqli_fetch_array($results4))
	{
	$sumtime = $sumtime + $rows4['time_limit'];
	$sumleft = $rowline1['test_duration'] - $sumtime ;
	if(($test_duration - $sumleft) > 0)
	{
		if($p == 0)
		{
			$secstart = $p1 ;
		?>
    
    <script type="text/javascript">
	seconds[<?php echo $p ;?>] = "<?php echo $test_duration - $sumleft ;?>" ;
	</script>
    <?php
		}
		if($p != 0)
		{
	?>
    <script type="text/javascript">
	seconds[<?php echo $p ;?>] = "<?php echo $rows4['time_limit'] ;?>"

	</script>
    <?php
		}
	$p++ ;
	}
	$p1++ ;
	}
	}
?>
    <script type="text/javascript">
	test_dur = <?php echo $test_duration ;?>
	</script>
    <?php
	}
?>
<script>
secstart = <?php echo $secstart ; ?>
</script>

<div style="width:100%;float:left;margin-top:1.7%;background-color:#617b8c;color:white;font-size:18px">
<div class="row" style="background-color:#617b8c;color:white;font-size:18px" align="middle">
Version 1.0.1
  </div>
</div>
<style>
  .ui-widget-header,.ui-state-default, ui-button
  {
	  background:#4E85C5;
	  color:white ;
	  height: 25px ;
	  font-size : 12px
	  
  }
  .ui-widget-overlay {
 
   opacity: 0.7;
   
}
.ui-icon 
{
	 background-color:#4E85C5;
	 color:white;
	 border:none
}
</style>
<!-- #customize your modal window here -->
<div id="myModalprofile" title="Profile" >
    <!-- Modal window Title -->
 <div style="width:100%;float:left" align="center">
          <p style="font-size:20px;Font-weight:bold;">Candidate Details</p>
          </div>
          <div style="width:30%;float:left">
          <img src="newimage.jpg" alt=""  style="width:100px;height:100px;border:1px solid grey;margin-left:5px;margin-top:10px; "/>
          </div>
          <div style="width:70%;position:relative;float:left;font-size:16px">
          <div style="width:100%;float:left">
          <br />
          <span style="float:left;margin-left:10px"><b>User Id:</b></span>&nbsp;&nbsp;&nbsp;&nbsp;<span ><?php echo $user_id ; ?></span>
          </div>
          <div style="width:100%;float:left">
          <br />
          <span style="float:left;margin-left:10px"><b>Name:</b></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $firstname."&nbsp;".strtolower($rowf['lastname']) ; ?></span>
          </div>
          <div style="width:100%;float:left">
          <br />
          <span style="float:left;margin-left:10px"><b>Username:</b></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $rowu['username'] ; ?></span>
          </div>
          <div style="width:100%;float:left;margin-bottom:20px">
          <br />
          <span style="float:left;margin-left:10px"><b>Email:</b></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $rowu['email'] ; ?></span>
         
          </div>
          </div>  
 <div id="myModalinst" title="Instruction" >
 <span style="float:right;font-size:16px">View as :
<select id="instlang" onchange ="changeinst(this.value)">
<option value="0">English</option>
<option value="1">Hindi</option>
</select>
</span>
 <div  id ="openinstruction" style ="width:100%;height:500px;float:left;font-size:16px;position:relative">
          <div id="openinstruction1" style="width:100%;position:absolute;top:0px;height:90%;;overflow-x:hidden;overflow-y:auto;margin-top:0px;border-bottom: 1px solid silver ">
           <?php
		  
		  $ques1 =0 ;
		  for($o = 0;$o < $num_sec;$o++)
		  {
			  $ques1 = $ques1 + $totques[$o]; 
		  }
		  $sql45 = "SELECT * FROM $table2 WHERE mock_id = '$mock_idse'";
		    $result45 = mysqli_query($con,$sql45);
			 $sql46 = "SELECT * FROM $table1 WHERE mock_id = '$mock_idse'";
		    $result46 = mysqli_query($con,$sql46);
            $row46 = mysqli_fetch_array($result46);
			$duration1 = $row46['test_duration'];
			$duration = $duration1/60 ;
		   $newrow = array();
			while($row45 = mysqli_fetch_array($result45))
	{
		array_push($newrow ,$row45);
	}
	include_once("instruct.php");
	include_once("instruct1.php");
		  ?>
          </div>
          <div id="openinstructionhindi1" style="width:100%;position:absolute;top:0px;height:90%;;overflow-x:hidden;overflow-y:auto;margin-top:0px;border-bottom: 1px solid silver;display:none ">
          <?php
		  include_once("instructhindi.php");
	include_once("instructhindi1.php");
		  ?>
		  ?>
          </div>
          </div>
          <script>
		  function changeinst(x)
		  {
			  if(x == 0)
			  {
			document.getElementById("openinstruction1").style.display = "block";
			document.getElementById("openinstructionhindi1").style.display = "none"
			  }
			  if(x == 1)
			  {
			document.getElementById("openinstruction1").style.display = "none";
			document.getElementById("openinstructionhindi1").style.display = "block"
			  }
}
		  </script>
 </div>
 <div id="myModalquestion" title="Question Paper" >
 
         <div  id ="openquespaperbox"  style ="width:100%;height:500px;float:left;font-size:16px">
         <div id="openquespaperbox1" style="width:100%;float:left;position:relative;height:90%;;overflow-x:hidden;overflow-y:auto;margin-top:0px;border-bottom: 1px solid silver ">
         <h1 style="color:#1472cc;font-weight:bold;margin-left:10px" id ="sec_name"></h1>
         <?php
		 for($w = 1;$w<= sizeof($question);$w++)
		 {
		?>
        <p id="testquestions<?php echo $w; ?>"></p>
       
        <?php
		 }
		 ?>
          </div>
          <div style="width:100%;float:left;margin-top:15px">
          
          </div>
          </div>
 </div>
</div>

<?php
}
if(mysqli_num_rows($resul) == 1)
{
?>
<script type="text/javascript">
window.open('','_parent','');
window.close();
</script>
<?php	
}

}
else
 {
	 ?>
     <script type="text/javascript">
	 alert("You Cannot continue the test. The Time of the test has elapsed ")
	 window.open('','_parent','');
	 window.close();
	 </script>
	 <?php
 }
}
else
 {
	 ?>
     <script type="text/javascript">
	 alert("This mock is not in your container")
	 window.open('','_parent','');
	 window.close();
	 </script>
	 <?php
 }
 ?>
 </div>
 </div>
 <script type="text/javascript" src="test.js?v=1.0.15"> </script>
 <div id="hides" style="display:none;width:100%;height:300px" align="center">
 <img src="loadpage.gif" style="margin-top:150px">
 <h2> Your Test is being submitted. Please Wait...</h2>
 </div>
  <div id="hides1" style="width:100%;height:300px" align="center">
 <img src="loadpage.gif" style="margin-top:150px">
 <h2> Please Wait while we Load your Test</h2>
 </div>
  <div id="feedform" style="width:100%;display:none;" align="center">
  <div style="width:100%;" align="center">
   <div id="logo" style="width:100%;height:7.7%;background-color:#2D70B6;float:left;background-image: url(<?php echo $logo ;?>);background-size:auto 40px ;background-repeat:no-repeat;background-position: 20px 10px">
<h1 id="header" style="color:white ;text-align:center;margin-top:5px"><?php echo $mockupper ; ?>
 </h1>
   </div>

  

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>

 <div align="center" style="width:100%">
<div  title="Feedback Form" Align="center" style="width:100%;">
<form>
  <br /><br />
<h4 style="margin-top:100px">Kindly give us your valuable Feedback.</h4>
<table>
<tr>
<th>PARAMETER</th>
<th>Poor</th>
<th>Very Poor</th>
<th>Average</th>
<th>Good</th>
<th>Excellent</th>
</tr>
<tr>
<td>Quality of Content/Questions.</td>
<td>
<input type="radio" name="levels" value="1" required/>
</td>
<td>
  <input type="radio" name="levels" value="2" required/>
  </td>
  <td>
  <input type="radio" name="levels" value="3" required/>
  </td>
  <td>
  <input type="radio" name="levels" value="4" required/>
  </td>
  <td>
  <input type="radio" name="levels" value="5" required/>
</td>
</tr>
<tr>
<td>Test Interface.</td>
<td>
<input type="radio" name="testint" value="1" required/>
</td>
<td>
  <input type="radio" name="testint" value="2" required/>
  </td>
  <td>
  <input type="radio" name="testint" value="3" required/>
  </td>
  <td>
  <input type="radio" name="testint" value="4" required/>
  </td>
  <td>
  <input type="radio" name="testint" value="5" required/>
</td>
</tr>
<tr>
<td>Overall Test Experience</td>
<td>
<input type="radio" name="testexp" value="1" required/>
</td>
<td>
  <input type="radio" name="testexp" value="2" required/>
  </td>
  <td>
  <input type="radio" name="testexp" value="3" required/>
  </td>
  <td>
  <input type="radio" name="testexp" value="4" required/>
  </td>
  <td>
  <input type="radio" name="testexp" value="5" required/>
</td>
</tr>
</table>

<br />
<textarea rows="7" cols="50" style="width:60%;border-radius:20px" id="comments" name="comments" placeholder="  ANY OTHER SUGGESTIONS(OPTIONAL)">
</textarea>
<br />
<button style="border-radius:20px" name="submit" type="button" onclick="finalsubmit()" >Submit</button>
  </form>
 
<div align='center'><p style='color:red' id="feedmsg"></p></div>
</div>
 </div>
 </div>
 </div>
 <?php
 
}
else
{
	?>
<script type="text/javascript">
window.open('','_parent','');
window.close();
</script>

<?php
}
?>
  
</body>
</html>