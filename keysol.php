<?php
include("sess_var.php") ;
   include("profiletop.php") ;
$sql1 = "SELECT * FROM $table2 WHERE mock_id = '$mock_id'";
	  $result1 = mysqli_query($con,$sql1);
	  $sql9 = "SELECT * FROM $table9 WHERE mock_id = '$mock_id'";
	  $result9 = mysqli_query($con,$sql9);
	   $rowsdh = array();
   while($rowcount1h = mysqli_fetch_array($result9))
   {
	   array_push($rowsdh,$rowcount1h);
   }
    function sortByOrder($a, $b)
 {
    return $a['question_id'] - $b['question_id'];
}

usort($rowsdh, 'sortByOrder');
 sort($rowsdh);
?>
<div class="wrapper">
  <?php
	  include("headertop.php");
	  ?>
	  <script>
document.getElementById("solkeys").className = "active treeview";
</script>
 <div class="content-wrapper" >
   <section class="content" id="contents">
<div class="container-fluid">
   <br />
   
   <?php
     $sql4 = "SELECT * FROM file_mock_specific WHERE mock_id = '$mock_id' ";
		 $result4 = mysqli_query($con,$sql4);
		 if(mysqli_num_rows($result4) > 0)
		 {
 ?>
 <div class="col-xs-12">
  
 </div>

<div class="col-xs-12 well" style="text-align:center;height:30px">
   <p style="MARGIN-TOP:-15PX;font-size:22px;font-weight:bold">Mock Associated File</p>
   </div>
   <br />
   
   
   <div class="col-xs-12">
   <?php
   while($row4 = mysqli_fetch_array($result4))
   {
   ?>
   <div class="col-xs-3">
   <p><i class="fa fa-file" style="font-size:60px;color:blue"></i>&nbsp;&nbsp;&nbsp;<a href="http://www.vstudy.in/test/holdfile/<?php echo $row4['file_link'] ?>"  target="_blank"><?php echo $row4['file_name'] ?></a></p>
   </div>
   <?php
   }
   ?>
  
 </div>  
 <?php
		 }
		 ?>
         <div class="col-xs-12 well" style="text-align:center;height:30px;">
   <p style="MARGIN-TOP:-15PX;font-size:22px;font-weight:bold">Answer Key</p>
   <br /><br />
   </div>
   <div class="row">
    <div class="col-xs-10">
    </div>
   <div class="col-xs-2" class="form-group">
  <select class="form-control" style="width:100%" onchange="changediv(this.value)">
   <option value="1">English</option>
   <option value="2">Hindi</option>
   </select>
   
   </div>
   <br />
   </div>
   
         <?php
   $m = 1;
   $rowsd = array();
   while($rowcount1 = mysqli_fetch_array($result1))
   {
	   array_push($rowsd,$rowcount1);
   }

usort($rowsd, 'sortByOrder');
 sort($rowsd);
 $k=0;
  foreach($rowsdh as $rows)
 {
	$rowsd[$k]['questionh'] =  $rows['question'];
	$rowsd[$k]['Option1h'] =  $rows['Option1'];
	$rowsd[$k]['Option2h'] =  $rows['Option2'];
	$rowsd[$k]['Option3h'] =  $rows['Option3'];
	$rowsd[$k]['Option4h'] =  $rows['Option4'];
	$rowsd[$k]['Option5h'] =  $rows['Option5'];
	$rowsd[$k]['passageh'] =  $rows['passage'];
	$rowsd[$k]['imagefileh'] =  $rows['imagefile'];
	$rowsd[$k]['tita_correcth'] =  $rows['tita_correct'];
	$k++ ;
 }
 foreach($rowsd as $row1)
 {
	  if($m == 1)
	  {
		  $sec_id = $row1['section_id'] ;
		 $sql = "SELECT * FROM $table3 WHERE mock_id = '$mock_id' AND section_id='$sec_id'";
		 $result = mysqli_query($con,$sql);
		 $row = mysqli_fetch_array($result);
		?>
         <div class="col-xs-12" style="text-align:center">
         <p style="font-size:22px;color:#1472cc;font-weight:bold"><?php echo "Section"."&nbsp;"."&nbsp;".$sec_id."&nbsp;"."-"."&nbsp;".$row['section_name'] ?></p>
         </div>
         <?php  
	  }
	 if($row1['section_id'] != $sec_id)
	 {
		 $sec_id = $row1['section_id'] ;
		 $sql = "SELECT * FROM $table3 WHERE mock_id = '$mock_id' AND section_id='$sec_id'";
		 $result = mysqli_query($con,$sql);
		 $row = mysqli_fetch_array($result);
		 echo "<br />"."<br />"."<br />" ;
		 ?>
         <div class="col-xs-12" style="text-align:center">
         <p style="font-size:22px;color:#1472cc;font-weight:bold;margin-top:40px"><?php echo "Section"."&nbsp;"."&nbsp;".$sec_id."&nbsp;"."-"."&nbsp;".$row['section_name'] ?></p>
         </div>
         <?php
	 }
	 ?>
     <div class="col-xs-12"  id="eng<?php echo $m ; ?>">
     <?php
	  if($row1['section_id'] == $sec_id)
	 {
		 if($row1['passage'] !== NULL && $row1['passage'] !== "" )
		 {
		 ?>
      <div  class="col-xs-12" style="height:200px;overflow-x:hidden;overflow-y:auto;border:1px dotted grey;font-size:18px" >
      <?php
echo $row1['passage'] ;  
	  ?>
      </div>  
      <?php
		 }
		  if($row1['passage'] == NULL && $row1['passage'] == "" )
		 {
			 if($row1['imagefile'] !== NULL && $row1['imagefile'] !== "" )
		 {
		 ?>
      <div class="col-xs-12" style="height:200px;overflow-x:hidden;overflow-y:auto;border:1px dotted grey;font-size:18px" align="center" >
 <img src="http://www.vstudy.in/test/images/<?php echo $row1['imagefile'];  ?>" alt ="image" />
      </div>  
      <?php
		 }
		 }
	  ?> 
      <div id="ques<?php echo $m ; ?>" class="col-xs-12" style="margin-bottom:30px;font-size:18px;" >
         <div class="row" style="border:1px dotted black;background-color:#eeeeee;padding-left:10px" >
        <?php
echo $row1['question_id']."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['question'])) ;
		 ?>
         </div>
         
         

<?php
if($row1['tita'] == 0)
{
	?>
 <div id="corr1<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px"> 
 <?php
 echo "A"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option1']));
 ?>
 </div>
 <div id="corr2<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px"> 
 <?php
 echo "B"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option2']));
 ?>
 </div>
  <div id="corr3<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px"> 
 <?php
 echo "C"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option3']));
 ?>
 </div>
  <div id="corr4<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px"> 
 <?php
 echo "D"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option4']));
 ?>
 </div>
 <?php
 if($ro['num_option'] == 5)
 {
 ?>
  <div id="corr5<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px" >
 <?php
 echo "E"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option5']));
 ?>
 </div>
 <?php
 }
}
?>
<script>
document.getElementById("corr"+<?php echo $row1['Correct_choice'] ; ?> +<?php echo $m ; ?>).style.backgroundColor = "#1472cc";
document.getElementById("corr"+<?php echo $row1['Correct_choice'] ; ?> +<?php echo $m ; ?>).style.color = "white";
</script>
<?php
if($row1['tita'] == 1)
{
?>

<div id="tita<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px" >
 <?php
 echo htmlspecialchars_decode(nl2br($row1['tita_correct']));
 ?>
 </div>
<?php
}
 ?>
</div>
 <?php
	 }
	 ?>
     </div>
      <div class="col-xs-12" id="hindi<?php echo $m ; ?>" style="display:none">
     <?php
	  if($row1['section_id'] == $sec_id)
	 {
		 if($row1['passageh'] !== NULL && $row1['passageh'] !== "" )
		 {
		 ?>
      <div  class="col-xs-12" style="height:200px;overflow-x:hidden;overflow-y:auto;border:1px dotted grey;font-size:18px" >
      <?php
echo $row1['passageh'] ;  
	  ?>
      </div>   
      <?php
		 }
		  if($row1['passageh'] == NULL || $row1['passageh'] == "" )
		 {
			 if($row1['imagefileh'] !== NULL && $row1['imagefileh'] !== "" )
		 {
		 ?>
      <div class="col-xs-12" style="height:200px;overflow-x:hidden;overflow-y:auto;border:1px dotted grey;font-size:18px" align="center" >
 <img src="http://www.vstudy.in/test/images/<?php echo $row1['imagefileh'];  ?>" alt ="image" />
      </div>  
      <?php
		 }
		 if($row1['imagefileh'] == NULL || $row1['imagefileh'] == "" )
		 {
			 if($row1['imagefile'] != NULL && $row1['imagefile'] != "" )
		 {
		 ?>
      <div class="col-xs-12" style="height:200px;overflow-x:hidden;overflow-y:auto;border:1px dotted grey;font-size:18px" align="center" >
 <img src="http://www.vstudy.in/test/images/<?php echo $row1['imagefile'];  ?>" alt ="image" />
      </div>  
      <?php
		 }
		  if($row1['imagefile'] == NULL || $row1['imagefile'] == "" )
		 {
		 if($row1['passage'] != NULL && $row1['passage'] != "" )
			 {
		 ?>
      <div  class="col-xs-12" style="height:200px;overflow-x:hidden;overflow-y:auto;border:1px dotted grey;font-size:18px" >
      <?php
echo $row1['passage'] ; 
?>
         </div>
         <?php
		 }
		  }
		 }
		 }
	  ?> 
      <div id="quesh<?php echo $m ; ?>" class="col-xs-12" style="margin-bottom:30px;font-size:18px" >
         <div class="row" style="border:1px dotted black;background-color:#eeeeee;padding-left:10px" >
        <?php
		if($row1['questionh'] != NULL && $row1['questionh'] != "" )
		{
echo $row1['question_id']."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['questionh'])) ;
		}
		if($row1['questionh'] == NULL || $row1['questionh'] == "" )
		{
echo $row1['question_id']."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['question'])) ;
		}
		 ?>
         </div>
         
         

<?php
if($row1['tita'] == 0)
{
	
	?>
 <div id="corr1h<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px"> 
 <?php
 if($row1['Option1h'] != NULL && $row1['Option1h'] != "" )
		{
 echo "A"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option1h']));
		}
		if($row1['Option1h'] == NULL || $row1['Option1h'] == "" )
		{
 echo "A"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option1']));
		}
 ?>
 </div>
 <div id="corr2h<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px"> 
 <?php
  if($row1['Option2h'] != NULL && $row1['Option2h'] != "" )
		{
 echo "B"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option2h']));
		}
		if($row1['Option2h'] == NULL || $row1['Option2h'] == "" )
		{
 echo "B"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option2']));
		}
 ?>
 </div>
  <div id="corr3h<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px"> 
 <?php
 if($row1['Option3h'] != NULL && $row1['Option3h'] != "" )
		{
 echo "C"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option3h']));
		}
		if($row1['Option3h'] == NULL || $row1['Option3h'] == "" )
		{
 echo "C"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option3']));
		}
 ?>
 </div>
  <div id="corr4h<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px"> 
 <?php
  if($row1['Option4h'] != NULL && $row1['Option4h'] != "" )
		{
 echo "D"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option4h']));
		}
		if($row1['Option4h'] == NULL || $row1['Option4h'] == "" )
		{
 echo "D"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option4']));
		}
 ?>
 </div>
 <?php
 if($ro['num_option'] == 5)
 {
 ?>
  <div id="corr5h<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px" >
 <?php
 if($row1['Option5h'] != NULL && $row1['Option5h'] != "" )
		{
 echo "E"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option5h']));
		}
		if($row1['Option5h'] == NULL || $row1['Option5h'] == "" )
		{
 echo "E"."."."&nbsp;"."&nbsp;"."&nbsp;".htmlspecialchars_decode(nl2br($row1['Option5']));
		} ?>
 </div>
 <?php
 }
}
?>
<script>
document.getElementById("corr"+<?php echo $row1['Correct_choice'] ; ?> +"h"+<?php echo $m ; ?>).style.backgroundColor = "#1472cc";
document.getElementById("corr"+<?php echo $row1['Correct_choice'] ; ?> +"h"+<?php echo $m ; ?>).style.color = "white";
</script>
<?php
if($row1['tita'] == 1)
{
?>

<div id="titah<?php echo $m ; ?>" class="row" style="border:1px dotted black;padding-left:10px" >
 <?php
  if($row1['tita_correcth'] != NULL && $row1['tita_correcth'] != "" )
		{
 echo htmlspecialchars_decode(nl2br($row1['tita_correcth']));
		}
		if($row1['tita_correcth'] == NULL || $row1['tita_correcth'] == "" )
		{
 echo htmlspecialchars_decode(nl2br($row1['tita_correct']));
		}
 ?>
 </div>
<?php
}
 ?>
</div>
 <?php
	 }
	 ?>
     </div>
     <?php
	 $m++ ;
   }
 
 $sqls1 = "SELECT * FROM solution_mock WHERE mock_id='$mock_id'";
 $results1 = mysqli_query($con,$sqls1);
 if(mysqli_num_rows($results1) >= 1)
 {
	 ?>
       <div class="col-xs-12">
  <br /><br />
  </div>
  <div class="col-xs-12 well" style="text-align:center;height:30px">
   <p style="MARGIN-TOP:-15PX;font-size:22px;font-weight:bold">Solutions (Question-wise)</p>
   </div>
   <div class="col-xs-12">
  <br />
  </div>
  <div class="col-xs-12">
  
  

     <?php
	 $p = 1 ;
	 $rows2 = array();
	 while($newrows = mysqli_fetch_array($results1))
	 {
		 
		 array_push($rows2,$newrows);
		
	 }
	  function sortByOrder2($a, $b)
 {
    return $a['question_id'] - $b['question_id'];
}

usort($rows2, 'sortByOrder2');
 sort($rows2);
 foreach($rows2 as $rows1)
 {
	 $ques_id = $rows1['question_id'] ; 
	 if($p%2 == 0 )
	 {
	 ?>
     <div class="col-xs-1"  align="center" style="margin-bottom:14px">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalques<?php echo $p ?>" style="outline:none">Q. No <?php echo $rows1['question_id'] ?></button>
  </div>
     <?php
	 }
	 if($p%2 != 0 )
	 {
	 ?>
     <div class="col-xs-1"  align="center" style="margin-bottom:14px">
     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalques<?php echo $p ?>" style="outline:none">Q. No <?php echo $rows1['question_id'] ?></button>
  </div>
     <?php
	 } 
	 
	
?>
<!-- Modal -->
  <div class="modal fade" id="myModalques<?php echo $p ?>" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#1472cc;">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h2 class="modal-title" style="color:white;text-align:center">SOLUTION ZONE</h2>
          </div>
        <br />
        <div class="modal-body">
        <?php
$sqls2 = "SELECT * FROM $table2 WHERE mock_id='$mock_id' AND question_id = '$ques_id'";
$results2 = mysqli_query($con,$sqls2);
if(mysqli_num_rows($results2) == 1)
{
	$rows2 = mysqli_fetch_array($results2);
	$subject_id = $rows2['subject_id'];
	$sqq = "SELECT * FROM qp_sections WHERE section_id='$subject_id'";
	$ress = mysqli_query($con,$sqq);
	$roww = mysqli_fetch_array($ress);
	echo "<b>"."Subject : "."</b>"."&nbsp;".$roww['section_name'];
	echo "<br /><br />";
	if($rows2['passage'] != "")
		{
			?>
            <div class="col-xs-12"  style="overflow-y:auto;overflow-x:hidden;height:200px">
            <?php
		echo htmlspecialchars_decode(nl2br($rows2['passage'])) ;
		?>
        </div>
        <?php
		}
		if($rows2['passage'] == "")
		{
		
		if($rows2['imagefile'] != "" && $rows2['imagefile'] != "")
		{
		?>
        <div class="col-xs-12"  style="overflow-y:auto;overflow-x:hidden;height:200px">
        <img src="http://www.vstudy.in/test/images/<?php echo $rows2['imagefile'] ?>" style="width:100%;height:100" alt="image" />
        </div>
        <?php
		}
		}
	echo "Q."."&nbsp;".$ques_id."&nbsp;"."-"."&nbsp;".htmlspecialchars_decode(nl2br($rows2['question']));
}
echo "<br /><br /><br />";
	echo "Solution"."&nbsp;"."-"."&nbsp;".htmlspecialchars_decode(nl2br($rows1['solution']));

		?>
         </div> 
        
        <div class="modal-footer" >
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
<?php
$p++ ; 
 }
 ?>
 
 </table>
 
 <?php
 }
 ?>
</div> 
</div> 
<script>
		 updatewallet();
 function updatewallet()
 {
	 $.ajax({
     type: "POST",
     url: 'updatewallet.php',
     data: {"user_id":"<?php echo $user_id ; ?>"},
     success: function(response){
        // alert(response);
		document.getElementById("wallet").innerHTML = response ;
     }
     });
	 
 }
 setInterval(function(){ 
updatewallet();
}, 7000);
  </script>

</section>
</div>
<div class="control-sidebar-bg"></div>
 </div>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
   <script>
   function changediv(x)
   {
	   if(x == 1)
	   {
		   for(i=1;i<=<?php echo count($rowsd); ?>;i++)
		   {
			   document.getElementById("eng" + i).style.display = "block";
			    document.getElementById("hindi" + i).style.display = "none";
		   }
	   }
	    if(x == 2)
	   {
		    for(i=1;i<=<?php echo count($rowsd); ?>;i++)
		   {
			   document.getElementById("eng" + i).style.display = "none";
			    document.getElementById("hindi" + i).style.display = "block";
		   }
	   }
   }
  </script>
