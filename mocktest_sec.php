
        
         <?php
		 $counts = 1;
		 $newrow1 = array();
	 while($row3 = mysqli_fetch_array($result13))
		 {
			 $mocks_id = $row3['mock_id'];
			 $flagissec = false ;
			for($o=0;$o<count($newarrmock);$o++)
			{
				if($newarrmock[$o] == $mocks_id)
				{
					$flagissec = true ;
				}
			}
			if($flagissec == true)
			{
			  $sqs1 = "SELECT * FROM mock_added_list WHERE mock_id ='$mocks_id' AND user_id = '$user_id'";  
			 $res1 = mysqli_query($con,$sqs1);
			 if(mysqli_num_rows($res1) == 1)
			 {
			// array_push($newrow1,$row3);
			 if($_SESSION['demo'] == 0)
		 {
			 
				 array_push($newrow1,$row3);
				 $counts++ ;
			 
		 }
		 if($_SESSION['demo'] == 1)
		 {
			 			 array_push($newrow1,$row3);
		 }
			 }
		 }
		 }
		 $j =1;
		 $p =1 ;
		 usort($newrow1, 'sortByOrder');
 //sort($newrow1);
		 foreach($newrow1 as $mocks) 
		 {
			 $mocks_name = strtoupper($mocks['mock_name']); 
			 ?>
             
             <?php
			 $mocks_acttime1 =$mocks['start_time'];
			 $mocks_endtime1 =$mocks['end_time'];
			 $act_state = $mocks['state'];
			 $mocks_id = $mocks['mock_id'];
			 $mocks_acttime = strtotime($mocks_acttime1);
			 $mocks_endtime = strtotime($mocks_endtime1);
			// $_SESSION['acttime'] = $mocks_acttime ;
			// $_SESSION['endtime'] = $mocks_endtime ;
			 $test_time = $mocks_acttime - $mocks_endtime ;
			 $_SESSION['test_time'] = $test_time ;
			 $time_diff =  $mocks_acttime - time() ;
			 if($time_diff <= 0 && $mocks_endtime >= time() )
			 {
				 if($act_state != 1)
				 {
					$query1 = "UPDATE $table1 SET state = '1' WHERE mock_id = '$mocks_id'";
					mysqli_query($con, $query1);
				 }
			 }
			 if($act_state != 0 && $act_state != NULL )
			 {

			 if($j %2 == 0)
		  {
			  ?>
			  <div class="row" >
			  <?php
		  }
			 ?>
             
             
           <div class="col-xs-6" style="margin-top:20px;margin-bottom:20px;border:1px dotted grey;margin-left:-10px" id="mocks<?php echo $j ; ?>">
         <div id="mocktextsec<?php echo $j ; ?>" class="col-xs-10" align="center"> 
           <span style="color:black;font-weight:bold"><?php echo $mocks_name ; ?>  </span>
           </div>  
           <div class="col-xs-2">   
          <span style="position:relative;right:0px;top:3px;font-size:18px;color:#1472cc;cursor:pointer"  data-toggle="modal" data-target="#myModal<?php echo $j ; ?>" id="startmocks<?php echo $j ; ?>" class="glyphicon glyphicon-play-circle"></span>  
<?php
if($j %2 == 0)
		  {
			  ?>
			  <script>
			  document.getElementById("mocks<?php echo $j ; ?>").style.marginLeft ="5px";
			  </script>
			  <?php
		  }
			 ?>			   
</div>           
  <?php
  $p++ ;
  $q =  "SELECT * FROM $tables WHERE mock_id ='$mocks_id' ";
  $r = mysqli_query($con,$q);
  if(mysqli_num_rows($r) >0)
  {
   $qu =  "SELECT * FROM $table2 WHERE mock_id ='$mocks_id' AND user_id = '$user_id'";
$re = mysqli_query($con,$qu);
if(mysqli_num_rows($re) == 1)
{
	$ro = mysqli_fetch_array($re);
    $mocks_state[$j -1] = $ro['mock_state'];
	if($mocks_state[$j -1] !=2)
	{
		$flag[$j-1] = 1;
				 ?>
                 
                  <style>
				 #mocktextsec<?php echo $j; ?>
				 {
					background-image:url('active.png');
					background-repeat:no-repeat;
					background-position:0px 7px;
					background-size:8px 8px ;
					
				 }
				 </style>
                
                 <?php
              }
			 else if($mocks_state[$j- 1] == 2)
			 {
				 $flag[$j-1] = 2;
				 ?>
                  
                 <style>
				 #mocktextsec<?php echo $j; ?>
				 {
					background-image:url('');
					
					
				 }
				 </style>
                 <?php 
			 }
               }
			  else if(mysqli_num_rows($re) == 0)
{
	if($time_diff <= 0 && $mocks_endtime >= time())
				 {
					 $flag[$j-1] = 1;
	 ?>
            <style>
				 #mocktextsec<?php echo $j; ?>
				 {
					background-image:url('active.png');
					background-repeat:no-repeat;
					background-position:0px 7px;
					background-size:8px 8px ;
				 }
				 </style>        
                   
                 <?php
}
				 }
			 
			  if( $mocks_endtime < time())
			 {
					$query2 = "UPDATE $table1 SET state = '2' WHERE mock_id = '$mocks_id'";
					mysqli_query($con, $query2);
				 
			 }
			  if($time_diff > 0 || $mocks_endtime < time())
			 { 
			 $flag[$j-1] = 0;
				 ?>
                  
                 <?php
				 ?>
                 <style>
				 #mocktextsec<?php echo $j; ?>
				 {
					background-image:url('');
					background-repeat:no-repeat;
					
				 }
				 </style>
                 <?php 
			 }
  }
   else
  {
	  $flag[$j-1] = 3 ;
			 }
  ?>           
             <!-- Modal -->
           <div class="modal fade" role="dialog" id="myModal<?php echo $j ; ?>">
            <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3c8dbc">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title" style="color:white;text-align:center">Sectional - 0<?php echo $j ; ?> Details</h2>
      </div>
      <div class="modal-body" style="border:none">
      <div class="col-xs-6">
        <p style="font-size:18px">Mock Test Name:</p>
        </div>
        <div class="col-xs-6">
       
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $mocks_name ;?></p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">No. of Sections:</p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $mocks['num_of_sections'] ;?></p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">Test Duration:</p>
        </div>
        <div class="col-xs-6">
        <?php 
		$hr =  intval($mocks['test_duration']/3600) ;
		$remmin = $mocks['test_duration']%3600;
		$min = intval($remmin/60) ;
		$secrem = intval($remmin%60) ;
		
		?>
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $hr.'&nbsp;'."Hr".'&nbsp;&nbsp;'.$min.'&nbsp;'."Min".'&nbsp;&nbsp;'.$secrem.'&nbsp;'."Seconds"?> </p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">Marks Awarded:</p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $mocks['correct_marks'] ;?></p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">Marks Deducted:</p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $mocks['incorrect_marks'] ;?></p>
        </div>
         <div class="col-xs-6">
        <p style="font-size:18px">Mock Starts At:</p>
        </div>
        <div class="col-xs-6">
        <?php
		$strt = date("d-m-Y h:i:sa",$mocks_acttime)
		?>
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $strt ;?></p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">Mock Ends At:</p>
        </div>
        <div class="col-xs-6">
        <?php
		$endt = date("d-m-Y h:i:sa",$mocks_endtime)
		?>
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $endt ;?></p>
        <br />
        </div>
        <div class="col-xs-2">
        </div>
        <div class="col-xs-8">
        <?php
		if($flag[$j-1] == 0)
		{
		?>
        <p style="font-size:20px;color:black">You can't take the mock right now</p>
        <?php
		}
		if($flag[$j-1] == 2)
		{
		?>
        
		<div align="center"><button type="button"  class="btn btn-lg" style="font-size:18px;background-color:#337Ab7;color:white" onMouseOver="this.style.backgroundColor='#1265ab'" onMouseOut="this.style.backgroundColor='#337Ab7'"   />   View Analytics  </button></div>
        <?php
		}
		if($flag[$j-1] == 1)
		{
		?>
        <form action="starttest.php?id=<?php echo $mocks_id ; ?>" method="GET">
           <p style="font-size:20px">The Mock is Active &nbsp;&nbsp;&nbsp;&nbsp;<button type="button"   onclick = "movefor('<?php echo $mocks_id ; ?>')" class="btn btn-lg" style="font-size:18px;background-color:#337Ab7;color:white" onMouseOver="this.style.backgroundColor='#1265ab'" onMouseOut="this.style.backgroundColor='#337Ab7'"  />    Go To Test    </button></p>
           </form>
       
        <?php
		}
		if($flag[$j-1] == 3)
		{
		?>
        <p style="font-size:20px;color:black">The mock is not fully uploaded yet</p>
        <?php
		}
		?>
		
        </div>
        <div class="col-xs-2">
        </div>
      </div>
      
      <div class="modal-footer" style="border:none">
      <br /><br />
        
      </div>
    </div>

  </div>
           </div>  
             
          </div> 
		  <?php
if($j %2 == 0)
		  {
			  ?>
			  </div>
			  <?php
		  }
			 ?>
             		  
             <?php
		 
		 
	}

					
 $j++ ;
		 }
		 ?>
		 