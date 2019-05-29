<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script type="text/javascript" src="../calculator/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="teststyle.css">  
 <link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.css">
<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.theme.css">
<script src="../jquery-ui-1.11.4.custom/jquery-ui.js"></script>
 <script type="text/javascript" src="browserdetect.js"></script>  
 <link type="text/css" rel="stylesheet" href="../calculator/css/calclayout.css"  />
        <script type="text/javascript" src="../calculator/js/oscZenoedited.js" ></script>
<title>Practice Test</title>
</head>

<body>
<?php
session_start() ;
date_default_timezone_set("Asia/Kolkata");
if( isset($_SESSION['username'] ) && isset($_SESSION['password']) && isset($_SESSION['class_name']) && isset($_SESSION['school_name']) && isset($_SESSION['section']) && isset($_GET['mock_id']) && isset($_GET['value']) )
{
	include("connect.php");
	// $class = $_SESSION['class_name'];
	  $school = $_SESSION['school_name'];
	 $section = $_SESSION['section'];
	 $user_id = $_SESSION['user_id'];
	 $sellang = $_GET['value'] ;
  ?>
    <div id="totalcont" style="display:none" >
    <?php
	include("connect.php");
	mysqli_set_charset($con,"utf8");
mysqli_query($con,"SET NAMES 'utf8'");
	date_default_timezone_set("Asia/Kolkata");
	$mock_id = $_GET['mock_id'];
	$mocks_id = $_GET['mock_id'];
	$mock_idse = $_GET['mock_id'];
	$user_id = $_SESSION['user_id'];
	$qa = "SELECT * FROM user_login WHERE user_id = '$user_id'";
	$reu = mysqli_query($con,$qa);
	$rowu = mysqli_fetch_array($reu);
 $class = $_SESSION['class_name'];
	  $school = $_SESSION['school_name'];
	 $section = $_SESSION['section'];
	 $tableresspace = "user_response $school" ;
	 $table_res = str_replace(" ", "_", $tableresspace);
	 // $mock = $_SESSION['mock_name'] ;
	  
	   $table2 = "mock_section_details_".$school ;
      $table1 = "mocktest_details_".$school;
	  $quer = "SELECT * FROM $table1 WHERE mock_id = '$mock_id'";
	  $resul = mysqli_query($con,$quer);
	  $rowe = mysqli_fetch_array($resul);
	  $mock = $rowe['mock_name'];
	  $mockupper = strtoupper($mock);
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
	 

	  $query1 = "SELECT * FROM $table1 WHERE mock_id ='$mocks_id'";
	  $res1 = mysqli_query($con,$query1);
	  $rowline1 = mysqli_fetch_array($res1);
	  $num_sec = $rowline1['num_of_sections'];
	  $num_opt = $rowline1['num_option'];
	  $calci = $rowline1['calculator'];
	  $time_limit = $rowline1['time_limit'];
	  $correct_marks = $rowline1['correct_marks'];
	  $incorrect_marks = $rowline1['incorrect_marks'];
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
	  corr_marks = "<?php echo $correct_marks; ?>";
	  incorr_marks = "<?php echo $incorrect_marks; ?>"
	   sellang = "<?php echo $sellang; ?>"
	  </script>
      <?php
	  
	  $question = array(array());
	  $push = array();
	  $hindques = array();
	  $i =1;
	  $s = 0;
	   $section_id1 = array();
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
       <div id="logo" style="width:100%;height:7.7%;background-color:#075caf;float:left;background-image: url(<?php echo $logo ;?>);background-size:40px 40px ;background-repeat:no-repeat;background-position: 20px 10px">
<h1 id="header" style="color:white ;text-align:center;margin-top:5px"><?php echo $mockupper ; ?>
 </h1>
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
	 $question[$s]['question_id'] = $row1['question_id'];  $question[$s]['Correct_choice'] = $row1['Correct_choice'];
			$question[$s]['tita_correct'] = $row1['tita_correct'];
		 $question[$s]['question'] = htmlspecialchars_decode(nl2br($row1['question']));  
		   $question[$s]['Option1'] = htmlspecialchars_decode(nl2br($row1['Option1'])); 
			$question[$s]['Option2'] = htmlspecialchars_decode(nl2br($row1['Option2']));
			$question[$s]['Option3'] = htmlspecialchars_decode(nl2br($row1['Option3']));
			$question[$s]['Option4'] = htmlspecialchars_decode(nl2br($row1['Option4'])); 
			$question[$s]['imagefile'] = nl2br($row1['imagefile']);
			$question[$s]['section_id'] = $row1['section_id'];
			$question[$s]['tita'] = $row1['tita'];
	 $ques_id = $row1['question_id'];
	 $subsection_id =  $row1['section_id'];
	 $question[$s]['questionh']= htmlspecialchars_decode(nl2br($hindques[$s]['question']));
			$question[$s]['option1h']= htmlspecialchars_decode(nl2br($hindques[$s]['Option1']));
			$question[$s]['option2h']= htmlspecialchars_decode(nl2br($hindques[$s]['Option2']));
			 $question[$s]['option3h']= htmlspecialchars_decode(nl2br($hindques[$s]['Option3']));
			 $question[$s]['option4h']= htmlspecialchars_decode(nl2br($hindques[$s]['Option4']));
			 if($num_opt == 5)
			 {
			 $question[$s]['option5h']= htmlspecialchars_decode(nl2br($hindques[$s]['Option5']));
			 $question[$s]['Option5']= htmlspecialchars_decode(nl2br($row1['Option5'])); 
			 }
			 else
			 {
			 $question[$s]['option5h']= "";
			 $question[$s]['Option5']= "";
			 }
			 $question[$s]['imagefileh']= nl2br($hindques[$s]['imagefile']);
			  $question[$s]['passageh']= htmlspecialchars_decode(nl2br($hindques[$s]['passage']));
			  $question[$s]['passage'] = htmlspecialchars_decode(nl2br($row1['passage']));
	 
	
	
	//	$question[$s]['tita'] = 0 ;
	$question[$s]['checked'] = 10;
	$question[$s]['tita_checked'] = "" ;
	$question[$s]['status1'] = 1 ;
	$question[$s]['response_time'] = 0;	
	  $s++ ;
		 }
		 ?>
         <script type="text/javascript">
		  test = <?php echo json_encode($question, JSON_PRETTY_PRINT) ?>;
		  
		 </script>
          
          
          <div style="width:79%;float:left;position:relative;margin-left:.5%">
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
           <fieldset>
        <legend>Section</legend>
        <div style="float:left;position:relative;margin-left:2%">
        <button style="display:none;cursor:pointer" class="stylebutton" id ="section<?php echo $z ;?>"   onclick="section(<?php echo $i-1 ;?> ,<?php echo $z ;?>)"><?php echo $sectionbutt ;?></button>
        
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
      <div style="float:left;position:relative;margin-left:5%">  
        <button style="display:none;cursor:pointer" class="stylebutton" id ="section<?php echo $z ;?>"  onclick="section(<?php echo $i-1 ;?>,<?php echo $z ;?>)"><?php echo $sectionbutt ;?></button>
    
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
		}
		$i++ ;
	  }
	  ?>
 <script type="text/javascript">
totquestion = <?php echo json_encode($totques) ?>;
test_start_ques = <?php echo json_encode($test_start_ques) ?>; 
test_end_ques = <?php echo json_encode($test_end_ques) ?>;
secdatastore = <?php echo json_encode($secdatastore) ?>;
sec_name = <?php echo json_encode($sec_name) ?>;
</script>
</fieldset>
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
   <div style="width:18%;float:left;position:relative;margin-right:2%;margin-top:-5px">
   <div style="float:right">
   <p style="font-size:14px;margin-top:6px;font-weight:bold"><span style="">Time Left:&nbsp;&nbsp;</span><span id="hour" ></span><span style="color:#4f7fc9;font-weight:bold" >:</span><span id="min"></span ><span style="color:#4f7fc9;font-weight:bold" >:</span><span id="sec"></span></p>
<p style="margin-top:-6px;line-height:0.1em;font-size:14px"><em><?php echo $firstname  ?></em></p>
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
<div style="float:right;margin-right:13%;margin-top:5px;">
        <?php
	
	if($rowf['image'] != NULL || $rowf['image'] != "")
	{
		?>
        <img src="../profilepic/<?php echo $rowf['image'] ; ?>" alt="" style="width:50px;height:50px" />
        <?php
	}
	else
	{
		?>
       <img src="../profilepic/prof.jpg" alt=""  style="width:50px;height:50px"/> 
        <?php
	}
		  ?>
      
       </div>
       
       </div>
     
          
          
          <div id="cover" style="width:79%;float:left;margin-top:0px;margin-left:.5%;height:73%;border:1px solid silver;border-top:none;position:relative ">
          <div  id ="quesimageoptbox" style ="width:100%;height:100%;position:absolute;top:0px">
          <div  id ="quesimageoptbox1" style="width:100%;margin-top:0px;float:left;position:relative;height:100%;margin-top:0px">
          <div style="width:100%;float:left;position:relative;background-color:#E4EDE7;height:5.1%;border-bottom:1px solid black">   
   <p style="float:right;font-size:14px;margin-top:0px;padding:5px;margin-right:1%;font-weight:bolder"><em>Marks for correct answer <span style="color:green">   <?php echo $rowline1['correct_marks']; ?>&nbsp; ; &nbsp;</span></em><em>Negative Marks  <span style="color:red">  <?php echo -$rowline1['incorrect_marks']; ?></span></em></p>    <p style="float:left;margin-left:10px;font-weight:bold;margin-top:3px;font-size:14px" id="questype"></p>
      </div>   
          <div id="languagehold" style="float:left;margin-left:5px;width:100%;position:relative">
         <p style="margin-left:0%;float:left">Question No. <span id="numb"></span></p>
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
          <div  style="float:left;margin-left:5px;margin-top:-8px;width:99.5%;height:1px;background-color:black">
          </div>
         
          <div id="imagebox" style="width:0%;float:left;position:relative;">
          <?php
		 $y = 1;
		  foreach($question as $question1) 
	  {
		  ?>
          <div id="passagdiv<?php echo $y; ?>" style="position:absolute;left:0px;top:0px;width:100%;overflow-y:auto;overflow-x:hidden;height:100%;visibility:hidden">
          <p id="passdiv<?php echo $y; ?>"  style="width:100%;" /><?php echo $question[$y-1]['passage'] ?></p>
          </div>
          
          <div id="imagediv<?php echo $y; ?>" style="position:absolute;left:0px;top:0px;width:100%;overflow-y:auto;overflow-x:hidden;height:100%;visibility:hidden">
         
          <img id="image<?php echo $y; ?>" src="../images/<?php echo $question[$y-1]['imagefile'] ?>" alt="image" style="width:100%;" />
          </div>
         
          <div id="imagedivhindi<?php echo $y; ?>" style="position:absolute;left:0px;top:0px;width:100%;overflow-y:auto;overflow-x:hidden;height:100%;visibility:hidden">
          
          <img id="imagehindi<?php echo $y; ?>" src="../images/<?php echo $question[$y-1]['imagefileh'] ?>" alt="image" style="width:100%;" />
           
          </div>
          
          <div id="passagdivhindi<?php echo $y; ?>" style="position:absolute;left:0px;top:0px;width:100%;overflow-y:auto;overflow-x:hidden;height:100%;visibility:hidden">
          <p id="passdivhindi<?php echo $y; ?>"  style="width:100%;" /><?php echo $question[$y-1]['passageh'] ?></p>
          </div>
          
          <?php
		  $y++;
	  }
	  ?>
          </div>
                    <div id="questionbox" style="width:90%;overflow-y:auto;overflow-x:hidden;float:left;height:72%;margin-left:10px;">
         <p id ="question" style="line-height:1.5em;text-align:justify;padding-left:20px;margin-right:10px"></p><br />
         
         <div style ="float:left;width:100%;position:relative;padding-left:20px" id="radio">
                <?php
		 $j = 1;
		  foreach($question as $question1) 
	  {
		  ?>	  
		  
          <div class="radio" style="position:absolute;top:5px;width:100%;visibility:hidden" id ="radio<?php echo $j;?>">
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
          <div style="width:100%;height:1px;background-color:silver;float:left">
          </div>
          <div style="width:100%;float:left;position:relative">
          
          <div style="width:20%;float:left;margin-top:.5%;margin-bottom:1%;margin-left:1%;border-top:1px solid silver">
          <button class="stylebutton1" onclick="reviewnext()" style="padding-top:11px;cursor:pointer" >&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Mark for Review & Next &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</button>
          </div>
          <div style="width:20%;float:left;margin-bottom:1%;margin-left:1%;margin-top:.5%">
          <button class="stylebutton1" onclick="clearres()" style="cursor:pointer" > &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Clear Response&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</button>
          </div>
          <div style="width:18%;float:right;margin-right:1%;margin-bottom:1%;margin-top:.5%">
          <button class="stylebutton" onclick ="savenext()" style="color:white;font-weight:bolder;cursor:pointer" >&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Save & Next&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</button>
          </div>
          </div>
          </div>
          </div>
          
         <div  id ="openquespaperbox" style ="width:100%;height:100%;position:absolute;top:0px;visibility:hidden">
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
          <button style="background-color:#C7DCF0;margin-left:45%;appearance:none;border:none;height:2em;" onclick="closeques()">&nbsp;&nbsp;&nbsp;&nbsp; Back &nbsp;&nbsp;&nbsp;&nbsp;</button>
          
          </div>
          </div>
          <div  id ="openinstruction" style ="width:100%;height:100%;position:absolute;top:0px;visibility:hidden;">
          <div id="openinstruction1" style="width:100%;float:left;position:relative;height:90%;;overflow-x:hidden;overflow-y:auto;margin-top:0px;border-bottom: 1px solid silver ">
          <h1 style="color:#1472cc;font-weight:bold;text-align:center" >Instructions</h1>
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
		  ?>
          
          </div>
          <div style="width:100%;float:left;margin-top:15px">
          <button style="background-color:#C7DCF0;margin-left:45%;appearance:none;border:none;height:2em;" onclick="closeinstruction()">&nbsp;&nbsp;&nbsp;&nbsp; Back &nbsp;&nbsp;&nbsp;&nbsp;</button>
          
          </div>
          </div>
          <div  id ="openprofile" style ="width:100%;height:100%;position:absolute;top:0px;visibility:hidden;">
          <div style="width:100%;float:left">
          <p style="font-size:20px;Font-weight:bold;margin-left:40%">Candidate Details</p>
          </div>
          <div style="width:395px;border: 1px solid black;margin-left:30%;position:relative;float:left">
          <div style="width:100%;float:left">
          <br />
          <span style="float:left;margin-left:10px"><b>User Id:</b></span><span style="float:right;margin-right:10px"><?php echo $user_id ; ?></span>
          </div>
          <div style="width:100%;float:left">
          <br />
          <span style="float:left;margin-left:10px"><b>Name:</b></span><span style="float:right;margin-right:10px"><?php echo $firstname."&nbsp;".strtolower($rowf['lastname']) ; ?></span>
          </div>
          <div style="width:100%;float:left">
          <br />
          <span style="float:left;margin-left:10px"><b>Username:</b></span><span style="float:right;margin-right:10px"><?php echo $rowu['username'] ; ?></span>
          </div>
          <div style="width:100%;float:left;margin-bottom:20px">
          <br />
          <span style="float:left;margin-left:10px"><b>Email:</b></span><span style="float:right;margin-right:10px;"><?php echo $rowu['email'] ; ?></span>
         
          </div>
          </div>
          <div style="width:100%;float:left;margin-top:50px">
          <button style="background-color:#C7DCF0;margin-left:45%;appearance:none;border:none;height:2em;" onclick="closeprofile()">&nbsp;&nbsp;&nbsp;&nbsp; Back &nbsp;&nbsp;&nbsp;&nbsp;</button>
          
          </div>
          </div>
          </div>
          
          <div style="width:17.5%;float:left;margin-top:0%;margin-left:2%;height:73%;position:relative;background-color:#E4EDF7; ">
         
  <div style="width:100%;float:left;position:relative;margin-top:2px">
          <p id="secid" style="margin-top:0px;margin-left:5px;font-size:14px"></p>
          <p style="margin-top:0px;margin-left:5px;font-size:14px">Question Pallete </p>
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
       
        <div style="position:absolute;top:80px;width:95%;visibility:hidden;height:56%;overflow-y:auto;overflow-x:hidden;margin-bottom:0px;margin-left:10%" id ="<?php echo 'numbers'.$a; ?>">
        <?php
		$newarray = array() ;
		for($b = 1;$b <= $q ; $b++)
		{
		  ?>
          
          <div style="float:left;position:relative;margin:2.5%;margin-bottom:6%;">
          
            <button  class="whitebut" onclick="changeques(<?php echo $number; ?>)" id="button<?php echo $number; ?>"><span style="text-align:center;font-weight:bold;cursor:pointer"><?php echo $number; ?></span></button>
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
         <div style="position:absolute;top:73%;width:100%;">
         <img src="legend1.jpg" alt="Legend" style ="width:100%"/>
          </div>
         
          
         <div style="width:100%;position:absolute;bottom:10px;margin-left:2%;">
         <div style="float:left;width:48%;height:25px;margin:0%">
         <button class="sidebutton" style="text-align:center;width:100%;margin-top:5px;font-size:12px" onclick="openprofile()">Profile</button>
         </div>
         <div style="float:left;width:48%;height:25px;margin:0%">
         <button class="sidebutton" style="text-align:center;width:100%;;margin-top:5px;margin-left:1.5%;font-size:12px"  onclick ="Openinstruction()">Instructions</button>
         </div>
      <div style="float:left;width:48%;height:25px;margin:0%">
         <button class="sidebutton" style="text-align:center;width:100%;margin-top:5px;font-size:12px"  onclick="openquestion()">Question Paper</button>
         </div>
         <div style="float:left;width:48%;height:25px;margin:0%">
         <button class="sidebutton" style="text-align:center;width:100%;;margin-top:5px;margin-left:1.5%;font-size:12px"  onclick ="confirmsubmit()">Submit</button>
         </div>
         </div>
          </div>
        
          <?php


$query3 =  "SELECT * FROM $tab WHERE mock_id ='$mocks_id' AND user_id = '$user_id'";
$result3 = mysqli_query($con,$query3);
if(mysqli_num_rows($result3) == 0)
{
	$query4 = "SELECT * FROM $table1 WHERE mock_id ='$mocks_id'";
	$result4 = mysqli_query($con,$query4);
	$row4 = mysqli_fetch_array($result4);
	$test_duration = $row4['test_duration'];
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
	$query4 = "SELECT * FROM $table1 WHERE mock_id ='$mocks_id'";
	$result4 = mysqli_query($con,$query4);
	$row4 = mysqli_fetch_array($result4);
	$row5 = mysqli_fetch_array($result3);
	$test_duration = $row4['test_duration'];
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
<script type="text/javascript" src="practicetest.js?v=1.0.3"> </script>


<div style="width:100%;float:left;margin-top:1.5%;position:relative;margin-left:0">
<img src="footer1.jpg" style="width:100%;margin-left:0%" />
</div>
</div>
<?php
 ?>
 </div>
 <div id="hides" style="display:none;width:100%;height:300px" align="center">
 <img src="loadpage.gif" style="margin-top:150px">
 <h2> Your Test is being submitted. Please Wait...</h2>
 </div>
  <div id="hides1" style="width:100%;height:300px" align="center">
 <img src="loadpage.gif" style="margin-top:150px">
 <h2> Please Wait while we Load your Test</h2>
 </div>
 <div id="hides2" style="display:none;width:100%;" >
 <div id="logo" style="width:100%;height:7.7%;background-color:#075caf;float:left;background-image: url(<?php echo $logo ;?>);background-size:40px 40px ;background-repeat:no-repeat;background-position: 20px 10px">
<h1 id="header" style="color:white ;text-align:center;margin-top:5px"><?php echo $mockupper ; ?>
 </h1>
   </div>
 <br /><br /><br /> 
 <div  style="float:left;width:18%" align="center">
 <p >Attempted - <span id="score1" style="font-weight:bold"></span></p>
 </div>
 <div style="float:left;width:18%" align="center">
 <p >Unattempted - <span id="score2" style="font-weight:bold"></span></p>
 </div>
 <div style="float:left;width:18%" align="center">
 <p style="color:green" >Correct - <span id="score3" style="color:black;font-weight:bold"></span></p>
 </div>
 <div style="float:left;width:18%"align="center">
 <p style="color:red" >Incorrect - <span id="score4" style="color:black;font-weight:bold"></span></p>
 </div>
 <div style="float:left;width:18%"align="center">
 <p style="" >Score - <span id="score5" style="color:black;font-weight:bold"></span></p>
 </div>
 <div style="float:left;width:100%">
 <br />
 <table style="width:100%;border: 1px solid black">
 <caption>Performance</caption>
 <tr>
 <th style="text-align:center;border: 1px dotted black">Question No</th>
 <th style="text-align:center;border: 1px dotted black">Question</th>
 <th style="text-align:center;border: 1px dotted black">Verification</th>
 </tr>
 <?php
 for($p= 1 ;$p <= count($question); $p++)
 {
	 ?>
     <tr>
     <td style="text-align:center;border: 1px dotted black"><?php echo $p ; ?></td>
     <td style="text-align:left;border: 1px dotted black"><?php echo $question[$p - 1]['question'] ; ?></td>
     <td style="text-align:center;border: 1px dotted black" id="veri<?php echo $p ?>"></td>
     </tr>
     <?php
 }
 ?>
 </table>
 </div>
 <div>
 <?php
}
?>
</body>
</html>