
          
         <?php 
		 $count = 1;
		 $newrow = array();
	
		 while($row2 = mysqli_fetch_array($result12))
		 {
			  $mocks_id = $row2['mock_id'];
			 $flagisfull = false ;
			for($o=0;$o<count($newarrmock);$o++)
			{
				if($newarrmock[$o] == $mocks_id)
				{
					$flagisfull = true ;
				}
			}
			if($flagisfull == true)
			{
			
			 $sqs = "SELECT * FROM mock_added_list WHERE mock_id ='$mocks_id' AND user_id = '$user_id'"; 
			 $res = mysqli_query($con,$sqs);
			 if(mysqli_num_rows($res) == 1)
			 {
			 if($_SESSION['demo'] == 0)
		 {
			
				 array_push($newrow,$row2);
				 $count++ ;
			 
		 }
		 if($_SESSION['demo'] == 1)
		 {
			 array_push($newrow,$row2);
		 }
			 }
			}
		 }
		 $i =1;
		 $z = 1 ;
		 usort($newrow, 'sortByOrder');
 //sort($newrow);
		 foreach($newrow as $mock) 
		 {
			 $mock_name = strtoupper($mock['mock_name']); 
			 $mock_acttime1 =$mock['start_time'];
			 $mock_endtime1 =$mock['end_time'];
			 $act_state = $mock['state'];
			 $mock_id = $mock['mock_id'];
			 $mock_acttime = strtotime($mock_acttime1);
			 $mock_endtime = strtotime($mock_endtime1);
			// $_SESSION['acttime'] = $mock_acttime ;
			// $_SESSION['endtime'] = $mock_endtime ;
			 $test_time = $mock_acttime - $mock_endtime ;
			 $_SESSION['test_time'] = $test_time ;
			 $time_diff =  $mock_acttime - time() ;
			 $test_mode = $mock['test_mode'] ; 
			 if($test_mode == 1)
			 {
				 $text = "UNPROC";
			 }
			 if($test_mode == 2)
			 {
				 $text = "PROC";
			 }
			 if($time_diff <= 0 && $mock_endtime >= time() )
			 {
				 if($act_state != 1)
				 {
					$query1 = "UPDATE $table1 SET state = '1' WHERE mock_id = '$mock_id'";
					mysqli_query($con, $query1);
				 }
			 }
			 if($act_state != 0 && $act_state != NULL )
			 {

		  if($i %2 == 0)
		  {
			  ?>
			  <div class="row" >
			  <?php
		  }
			 ?>
             
             <div class="col-xs-6" style="margin-top:20px;margin-bottom:20px;border:1px dotted grey;margin-left:-10px" id="mockf<?php echo $i ; ?>">
            <div id="mocktext<?php echo $i ; ?>" class="col-xs-10" align="center"> 
           <span style="color:black;font-weight:bold"><?php echo $mock_name ; ?>  </span>
           </div>
           <div class="col-xs-2" align="right" >
           <span data-toggle="modal" data-target="#myModals<?php echo $i ; ?>" id="startmock<?php echo $i ; ?>" style="position:relative;right:0px;top:3px;font-size:18px;color:#1472cc;cursor:pointer" class="glyphicon glyphicon-play-circle"></span>
		   <?php
if($i %2 == 0)
		  {
			  ?>
			  <script>
			  document.getElementById("mockf<?php echo $i ; ?>").style.marginLeft ="5px";
			  </script>
			  <?php
		  }
			 ?>		   
  </div>         
  <?php
  $z++ ;
  $q =  "SELECT * FROM $tables WHERE mock_id ='$mock_id' ";
  $r = mysqli_query($con,$q);
  if(mysqli_num_rows($r) >0)
  {
   $qu =  "SELECT * FROM $table2 WHERE mock_id ='$mock_id' AND user_id = '$user_id'";
$re = mysqli_query($con,$qu);
if(mysqli_num_rows($re) == 1)
{
	$ro = mysqli_fetch_array($re);
    $mock_state[$i -1] = $ro['mock_state'];
	if($mock_state[$i -1] !=2)
	{
		$flag[$i-1] = 1;
				 ?>
                 
                  <style>
				 #mocktext<?php echo $i; ?>
				 {
					background-image:url('active.png');
					background-repeat:no-repeat;
					background-position:0px 7px;
					background-size:8px 8px ;
					
				 }
				 </style>
                
                 <?php
              }
			 else if($mock_state[$i- 1] == 2)
			 {
				 $flag[$i-1] = 2;
				 ?>
                  
                 <style>
				 #mocktext<?php echo $i; ?>
				 {
					background-image:url('');
					
					
				 }
				 </style>
                 <?php 
			 }
               }
			  else if(mysqli_num_rows($re) == 0)
{
	if($time_diff <= 0 && $mock_endtime >= time())
				 {
					 $flag[$i-1] = 1;
	 ?>
            <style>
				 #mocktext<?php echo $i; ?>
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
			 
			  if( $mock_endtime < time())
			 {
					$query2 = "UPDATE $table1 SET state = '2' WHERE mock_id = '$mock_id'";
					mysqli_query($con, $query2);
				 
			 }
			  if($time_diff > 0 || $mock_endtime < time())
			 { 
			 $flag[$i-1] = 0;
				 ?>
                  
                 <?php
				 ?>
                 <style>
				 #mocktext<?php echo $i; ?>
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
	  $flag[$i-1] = 3 ;
			 }
  ?>           
             <!-- Modal -->
           <div class="modal fade" role="dialog" id="myModals<?php echo $i ; ?>">
            <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3c8dbc">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title" style="color:white;text-align:center">Full Mock - 0<?php echo $i ; ?> Details</h2>
      </div>
      <div class="modal-body" style="border:none">
      <div class="col-xs-6">
        <p style="font-size:18px">Mock Test Name:</p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $mock_name ;?></p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">No. of Sections:</p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $mock['num_of_sections'] ;?></p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">Test Duration:</p>
        </div>
        <div class="col-xs-6">
        <?php 
		$hr =  intval($mock['test_duration']/3600) ;
		$remmin = $mock['test_duration']%3600;
		$min = intval($remmin/60) ;
		$secrem = intval($remmin%60) ;
		
		?>
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $hr.'&nbsp;'."Hr".'&nbsp;&nbsp;'.$min.'&nbsp;'."Min".'&nbsp;&nbsp;'.$secrem.'&nbsp;'."Seconds"?> </p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">Marks Awarded:</p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px;color:grey">&nbsp;&nbsp; <?php echo $mock['correct_marks'] ;?></p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">Marks Deducted:</p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $mock['incorrect_marks'] ;?></p>
        </div>
         <div class="col-xs-6">
        <p style="font-size:18px">Mock Starts At:</p>
        </div>
        <div class="col-xs-6">
        <?php
		$strt = date("d-m-Y h:i:sa",$mock_acttime)
		?>
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $strt ;?></p>
        </div>
        <div class="col-xs-6">
        <p style="font-size:18px">Mock Ends At:</p>
        </div>
        <div class="col-xs-6">
        <?php
		$endt = date("d-m-Y h:i:sa",$mock_endtime)
		?>
        <p style="font-size:18px;color:grey"> &nbsp;&nbsp; <?php echo $endt ;?></p>
        <br />
        </div>
        <div class="col-xs-2">
        </div>
        <div class="col-xs-8">
        <?php
		if($flag[$i-1] == 0)
		{
		?>
        <p style="font-size:20px;color:black">You can't take the mock right now</p>
        <?php
		}
		if($flag[$i-1] == 2)
		{
		?>
		
		<div align="center"><button type="button"  class="btn btn-lg" style="font-size:18px;background-color:#337Ab7;color:white" onMouseOver="this.style.backgroundColor='#1265ab'" onMouseOut="this.style.backgroundColor='#337Ab7'" onclick="document.location ='viewtestanalytics.php?mock_id=<?php echo $mock_id ?>'"   />   View Analytics  </button></div>

        <?php
		}
		if($flag[$i-1] == 1)
		{
		?>
        <form action="starttest.php?id=<?php echo $mock_id ; ?>" method="GET">
           <p style="font-size:20px">The Mock is Active &nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  onclick = "movefor('<?php echo $mock_id ; ?>')" class="btn btn-lg"  style="font-size:18px;background-color:#337Ab7;color:white" onMouseOver="this.style.backgroundColor='#1265ab'" onMouseOut="this.style.backgroundColor='#337Ab7'"  />     Go To Test    </button></p>
           </form>
       
        <?php
		}
		if($flag[$i-1] == 3)
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
		   if($i %2 == 0)
		  {
			  ?>
			  </div>
			  <?php
		  }
			 ?>
             <?php
		  }
		 
	

					
 $i++ ;
		 }
		 ?>
		  