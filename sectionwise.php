<?php
$attemptsum = array() ;
$markedsum = array();
$answersum = array();
$unanswersum = array();
$markrevsum = array();
$unvissum = array();
//$correct_arr = array(array());
$numquesstore = array();
$sec_timestore = array();
$seclimit = array() ;
$level_sec1 = array( array()) ;
$level_sec2 = array( array()) ;
$level_sec3 = array( array()) ;
$level_sec4 = array( array()) ;
$level_sec5 = array( array()) ;
$level_sec6 = array( array()) ;
$level_sec7 = array( array()) ;
$attemptarrs = array() ;
//$secstorage = array() ;
//$corrs = 0 ;
//$ques_type = array(array());
//$numques_sec = array();
?>

<div class="col-xs-3">
<button type="button" class="btn  btn-lg" data-toggle="modal" data-target="#myModalsec" style="font-size:18px;background-color:#337Ab7;color:white" onMouseOver="this.style.backgroundColor='#1265ab'" onMouseOut="this.style.backgroundColor='#337Ab7'"><i class="fa fa-table fa-fw"></i> &nbsp;&nbsp;View Marks Status</button>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModalsec" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#337Ab7;">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h2 class="modal-title" style="color:white;text-align:center">Sectional Analysis</h2>
        </div>
        <br />
        <div class="modal-body">
        <?php
	$num_sec = $row5['num_of_sections'];
	for($i = 1;$i<=$num_sec;$i++)
	{
		$sql6a = "SELECT * FROM $table2 WHERE section_id = '$i' AND mock_id='$mock_id'" ;
		$result6a = mysqli_query($con,$sql6a);
		$y6 = 0;
	while($row6a = mysqli_fetch_array($result6a))
	{
		$level_sec6[$i-1][$y6] = $row6a['level_id'] ;
		$y6++ ;
	}
	$sql6 = "SELECT * FROM $table3 WHERE section_id = '$i' AND mock_id='$mock_id'" ;	
	$result6 = mysqli_query($con,$sql6);
	$row6 = mysqli_fetch_array($result6);
	$namesection[$i -1 ] = "Section".$i ;
	$secname[$i -1 ] = $row6['section_name'];
	$numquesstore[$i-1] = $row6['no_of_question'];
	if($row5['time_limit'] == 1)
	{
		$seclimit[$i -1] = round($row6['time_limit']/60 ,2) ;
	}
		?>
        <h4 style="font-weight">Section <?php echo $i.'&nbsp;'.'-'.'&nbsp;'.$row6['section_name'] ?></h4>
      <table class=" table table-striped">
      <tr>
      <th style="text-align:center">Total Questions</th>
      <th style="text-align:center">Attempted</th>
      <th style="text-align:center">Unattempted</th>
      <th style="text-align:center">Correct</th>
      <th style="text-align:center">Incorrect</th>
      <th style="text-align:center">Marks obtained</th>
      </tr>
      <tr>
      <td style="text-align:center;font-size:18px"><?php echo $row6['no_of_question'] ?></td>
      <?php
	 $sql7 = "SELECT * FROM $table5 WHERE subjectsection_id = '$i' AND mock_id='$mock_id' AND user_id='$user_id'" ;	
	$result7 = mysqli_query($con,$sql7);
	$add = 0;
	$correct = 0 ;
	$y = 0 ;
	$ans1 = 0;
	$unans1 = 0;
	$marrev1 = 0;
	$mark1 = 0;
	$resp = 0;
	$l1 = 0 ;
	$l2 = 0 ;
	$l3 = 0;
	$l4 = 0;
	$l5 = 0 ;
	$l7 = 0 ;
	while($row7 = mysqli_fetch_array($result7))
	 {
		
		$level_sec1[$i-1][$l1] = 0 ;
		$ques_id = $row7['question_id'] ;
		$resp = $resp +  $row7['response_time'] ;
		$sql8 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result8 = mysqli_query($con,$sql8);
	$row8 = mysqli_fetch_array($result8);
		 if($row7['status'] == 3)
		 {
			 $ans1++ ;
			 $ques_id = $row7['question_id'] ;
			
	$level_sec2[$i-1][$l2] = $row8['level_id']  ;
	$l2++ ;		 
			 
		 }
		 if($row7['status'] == 2)
		 {
		$ques_id = $row7['question_id'] ;
			$sql8 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result8 = mysqli_query($con,$sql8);
	$row8 = mysqli_fetch_array($result8);
	$level_sec3[$i-1][$l3] = $row8['level_id']  ;
	$l3++ ;
			 $unans1++ ;
			
		 }
		
		 if($row7['tita'] == 0)
		 {
		if($row7['status'] >= 3 && $row7['response'] >0)
		{
			
			if($row7['status'] == 4)
			{
				$marrev1++;
				$level_sec5[$i-1][$l5] = $row8['level_id']  ;
			 $l5++;
				
			}
			$ques_id = $row7['question_id'] ;
			$sql8 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result8 = mysqli_query($con,$sql8);
	$row8 = mysqli_fetch_array($result8);
	if($row7['response'] == $row8['Correct_choice'])
	{
		$level_sec7[$i-1][$l7] = $row8['level_id']  ;
			 $l7++;
		$correct++;
		//$correct_arr[$i][$y] = "Correct";
	}
	$level_sec1[$i-1][$l1] = $row8['level_id']  ;
			 $l1++;
			$add ++ ;
		}
		if($row7['status'] == 4 && $row7['response'] == 0)
		{
			$ques_id = $row7['question_id'] ;
			$sql8 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result8 = mysqli_query($con,$sql8);
	$row8 = mysqli_fetch_array($result8);
			$mark1++ ;
			$level_sec4[$i-1][$l4] = $row8['level_id']  ;
			 $l4++;
			
		}
		}
		else if($row7['tita'] == 1)
		 {
		if($row7['status'] >= 3 && $row7['tita_score']!== "")
		{
			if($row7['status'] == 4)
			{
				$marrev1++;
				$level_sec5[$i-1][$l5] = $row8['level_id']  ;
			 $l5++;
			}
			$ques_id = $row7['question_id'] ;
			$sql8 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result8 = mysqli_query($con,$sql8);
	$row8 = mysqli_fetch_array($result8);
	if($row7['tita_score'] == $row8['tita_correct'])
	{
		$level_sec7[$i-1][$l7] = $row8['level_id']  ;
			 $l7++;
		$correct++;
		
	}
	$level_sec1[$i-1][$l1] = $row8['level_id']  ;
			 $l1++;
			$add ++ ;
		}
		if($row7['status'] == 4 && $row7['tita_score'] === "")
		{
			$ques_id = $row7['question_id'] ;
			$sql8 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result8 = mysqli_query($con,$sql8);
	$row8 = mysqli_fetch_array($result8);
			$mark1++ ;
			$level_sec4[$i-1][$l4] = $row8['level_id']  ;
			 $l4++;
			
		}
		}
		$y++ ;
	 }
	// $numques_sec[$i] = $y -1 ;
	 $datarray[$i - 1][0] = $correct ;
	 $datarray[$i - 1][1] =$add - $correct ;
	 $datarray[$i - 1][2] = $row6['no_of_question'] - $add ;
	 $attemptsum[$i - 1] = $add ;
	 $answersum[$i-1] = $ans1 ;
	 $unanswersum[$i-1] = $unans1 ;
	 $markedsum[$i-1] = $mark1 ;
	 $markrevsum[$i-1] = $marrev1 ;
	 $unvissum[$i-1] = $row6['no_of_question'] - $ans1 - $unans1 - $mark1 - $marrev1 ;
	 $sec_timestore[$i - 1] = round(($resp)/60,2) ;
	
	$attemptarrs[$i-1] = round(($attemptsum[$i -1]/$row6['no_of_question'])*100,2) ; 
	  ?>
      
      <td style="text-align:center;font-size:18px"><?php echo $add ; ?></td>
      <td style="text-align:center;font-size:18px"><?php echo $row6['no_of_question'] - $add ?></td>
      <td style="text-align:center;font-size:18px"><?php echo $correct ; ?></td>
      <td style="text-align:center;font-size:18px"><?php echo $add - $correct ; ?></td>
      <?php
	  $marks = $correct*($row5['correct_marks']) - ($add - $correct)*($row5['incorrect_marks']) 
	  ?>
      <td style="text-align:center;font-size:18px"><?php echo $marks ?></td>
      </tr>
      </table>  
		<?php
	 
	}
		?>
        
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="col-xs-3">
  </div>
  <div class="col-xs-6">
  <div class="col-xs-4" style="float:right" >
  <div class="col-xs-12"  >
  <p style="font-size:12px;"><img src="blues.png" style="height:15px;width:15px">&nbsp;&nbsp;%  Attempts Correct</p>
  </div>
  </div>
    <div class="col-xs-4" style="float:right" >
  <div class="col-xs-12"  >
  <p style="font-size:12px;"><img src="blacks.png" style="height:15px;width:15px">&nbsp;&nbsp;%  Attempts Incorrect</p>
  </div>
  </div>
  <div class="col-xs-4"  style="float:right" >
  <div class="col-xs-12"  >
  <p style="font-size:12px;"><img src="yellows.png" style="height:15px;width:15px">&nbsp;&nbsp;% Unattempt</p>
  </div>
  </div>
  </div>
  <div class="row">
  <br /><br /><br />
  <div class="col-xs-12">
  <table class="table table-striped">
  <Caption>Attempt Status Review</caption>
  <tr>
  <th style="text-align:center">Sections</th>
  <th style="text-align:center">Total Attempts</th>
  <th style="text-align:center"><img src="green.png" alt="green" style="width:15px;height:15px" />&nbsp;&nbsp;Answered</th>
  <th style="text-align:center"><img src="red.png" alt="green" style="width:15px;height:15px" />&nbsp;&nbsp;Unanswered</th>
  <th style="text-align:center"><img src="purple.png" alt="green" style="width:18px;height:18px" />&nbsp;&nbsp;Review </th>
  <th style="text-align:center"><img src="purpletick.png" alt="green" style="width:20px;height:20px" />&nbsp;&nbsp;Mark & Review</th>
   <th style="text-align:center"><img src="white.jpg" alt="green" style="width:17px;height:17px" />&nbsp;&nbsp;Not Visited</th>
  </tr>
  <tr>
  <?php
  for($i = 1;$i<=$num_sec;$i++)
	{
	
  ?>
  <td style="text-align:center"><?php echo "Section".$i ; ?></td>
  <td style="text-align:center"><?php echo $attemptsum[$i - 1] ; ?></td>
  <td style="text-align:center"><?php echo $answersum[$i-1] ; ?></td>
  <td style="text-align:center"><?php echo $unanswersum[$i-1]; ?></td>
  <td style="text-align:center"><?php echo $markedsum[$i-1] ; ?></td>
  <td style="text-align:center"><?php echo $markrevsum[$i-1] ; ?></td>
  <td style="text-align:center"><?php echo $unvissum[$i-1] ; ?></td>
  </tr>
  <?php
	}
  ?>
  </table>
  </div>
  </div>
  <div class="row">
  <br /><br /><br />
  <div class="col-xs-12">
  <p style="font-size:26px;color:grey;text-align:center">Graphical Analysis</p>
  <br /><br />
  </div>
  <div class="col-xs-12"  id="seccompanal">
   </div>
  </div>
  <?php
  if($num_sec > 1 )
  {
	  ?>
      <div class="row">
      <br />
      <div class="col-xs-12">
      <p style="text-align:center;font-size:22px;color:grey">Sectional Comparison of Attempt % </p>
      <br /><br />
      </div>
      <div class="col-xs-12">
      <div class="col-xs-2">
      </div>
      <div class="col-xs-8" style="background-color:white" id="secattempt">
      </div>
      <div class="col-xs-2">
      </div>
      </div>
      </div>
      <div class="row">
      <br /><br />
      </div>
      <script>
	  sections = <?php echo json_encode($namesection) ?>; 

var AttemptArray = <?php echo json_encode($attemptarrs) ; ?> //data in minutes
var no_sec = AttemptArray.length;
var width =0.5*window.innerWidth
var height = 500;

var y = d3.scale.linear()
			.domain([0,100]) //
			.range([0,100]);
var color = d3.scale.ordinal()
					.range(["#3c8dbc"]);


var widthScale = d3.scale.linear()
   					.range([0, 1.2*width]);


var canvas = d3.select("#secattempt")
	.append("svg")
	.attr("width", "100%")
	.attr("height", height);


for(i=1;i<=9;i++){
canvas.append("line")
.attr("x1",i*width/10+10)
.attr("y1",height + margin.top + margin.bottom)
.attr("x2",i*width/10+10)
.attr("y2",0)
.style("stroke","#000000")
.style("opacity",0.5)
.style("stroke-dasharray",5)
.style("fill","none");
}

for(i=1;i<=9;i++){
canvas.append("line")
.attr("x1",0)
.attr("y1",i*(height + margin.top + margin.bottom-50)/10)
.attr("x2",width)
.attr("y2",i*(height + margin.top + margin.bottom-50)/10)
.style("stroke","#000000")
.style("opacity",0.5)
.style("stroke-dasharray",5)
.style("fill","none");
}	
	
	
canvas.append("text")
		.attr("x",width/1.3)
		.attr("y",height/9-20)
		.html("x   -    Sections")
		.attr("text-anchor","left")
		.attr("font-size","18px")
		.style("fill","#3c8dbc");
		

canvas.append("text")
		.attr("x",width/1.3)
		.attr("y",height/9 + 10)
		.html("y   -    Attempt %")
		.attr("text-anchor","left")
		.attr("font-size","18px")
		.style("fill","#3c8dbc");
				

var axis = d3.svg.axis()
				.ticks(0)
				.tickSize(2)
				.scale(widthScale);

var bars = canvas.selectAll("rect")
				.data(AttemptArray)
				.enter();
				
bars.append("rect")
	.attr("width", 50)
	.attr("height",function(d){return y(d)*3;})
	.attr("x", function(d,i){return 30+ i*100;})
	.attr("y", function(d){return (450-y(d)*3);})
	.attr("fill", function(d,i){return color(i);})

bars.append("text")
	.attr("x",function(d,i){return 55+i*100;})
	.attr("y",function(d){return 445-y(d)*3;})
	.attr("text-anchor","middle")
	.text(function(d){return d +"%";})
	.attr("font-size","13px")
	.attr("fill","#3c8dbc");		

		
	

	
	
bars.append("text")
	.attr("x",function(d,i){return 55+i*100;})
	.attr("y",function(d){return 465;})
	.attr("text-anchor","middle")
	.text(function(d,i){return sections[i];})
	.attr("font-size","13px")
	.attr("fill","#3c8dbc");			


canvas.append("g")
		.attr("transform", "translate(30, 450)")
		.call(axis)
		.style("fill","#3c8dbc");
		
		
	  </script>
      <?php
  }
  ?>
 