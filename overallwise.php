<?php
$rank = array(array());
$rank1 = array();
$user_arr = array() ;
$user_arr1 = array() ;
$quesid_arr = array() ;
$ques_type = array();
$cor_arr = array();
$cor_choice = array();
$time_arr = array();
$ranks = array( array()) ;
$times_spent = array( array() ) ;
$level_arr = array() ;
$level_arr1 = array() ;
$level_arr2 = array() ;
$level_arr3 = array() ;
$level_arr4 = array() ;
$level_arr5 = array() ;
$tita_att = 0;
$notita_att = 0;
$tita_corr = 0;
$notita_corr = 0;
?>
<div class="row">
<table class=" table table-striped" >
<tr>
<th style="text-align:center;font-size:12px">ATTEMPT SUMMARY</th>
<th style="text-align:center;font-size:12px">MARKS SUMMARY</th>
<th style="text-align:center;font-size:12px">TIME SUMMARY</th>
<th style="text-align:center;font-size:12px">STATUS SUMMARY</th>
</tr>
<tr>
<?php
$sql9 = "SELECT * FROM $table3 WHERE mock_id= '$mock_id'" ;
$result9 = mysqli_query($con,$sql9);
$totques =0 ;
while($row9 = mysqli_fetch_array($result9))
{
$totques = $totques + $row9['no_of_question'] ;
}
$sql10 = "SELECT * FROM $table5 WHERE mock_id= '$mock_id' AND user_id ='$user_id'"  ;
$result10 = mysqli_query($con,$sql10);
$totattempt = 0 ;
$corattempt = 0 ;
$marksgained = 0;
$markslost = 0 ;
$timespent = 0;
$answered = 0 ;
$unanswered = 0 ;
$markreview = 0;
$mark = 0 ;
$y1 = 0 ;
$y11 = 0 ;
$y12 =0 ;
$y13 = 0 ;
$y14 = 0 ;
$y15 = 0 ;
$y16 = 0 ;
while($row10 = mysqli_fetch_array($result10))
	 {
		 $time_arr[$y1] = $row10['response_time']/60;
		$cor_arr[$y1] = "" ;
		
		 $quesid_arr[$y1] = $row10['question_id'];
		if($row10['status'] == 3)
		{
			$answered ++ ;
			$ques_type[$y1] = "Answered" ;
			
		}
		if($row10['status'] == 2)
		{
			$ques_id = $row10['question_id'] ;
			$sql111 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result111 = mysqli_query($con,$sql111);
	$row111 = mysqli_fetch_array($result111);
	$level_arr3[$y14] = $row111['level_id'] ;
	$y14++ ;
			$unanswered ++ ;
			$ques_type[$y1] = "Not Answered" ;
			
		}
		$timespent = $timespent + $row10['response_time'] ;
		 if($row10['tita'] == 0)
		 {
			 $cor_choice[$y1] = $row10['response'] ;
			 
			 if($row10['status'] == 4 && $row10['response'] ==  0)
		{
			$ques_id = $row10['question_id'] ;
			$sql11 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result11 = mysqli_query($con,$sql11);
	$row11 = mysqli_fetch_array($result11);
	$level_arr4[$y15] = $row11['level_id'] ;
	$y15++ ;
			$mark++ ;
			$ques_type[$y1] = "Review" ;
			
		}
		 }
		 if($row10['tita'] == 0)
		 {
		if($row10['status'] >= 3 && $row10['response'] >0)
		{ 
			$notita_att ++ ;
			$ques_id = $row10['question_id'] ;
			$sql11 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result11 = mysqli_query($con,$sql11);
	$row11 = mysqli_fetch_array($result11);
	$level_arr[$y11] = $row11['level_id'] ;
	$y11++ ;
	if($row10['status'] == 4)
			{
				$markreview ++ ;
				$ques_type[$y1] = "Mark & Review" ;
				$level_arr1[$y12] = $row11['level_id'] ;
	$y12++ ;
			}
			if($row10['status'] == 3)
			{
				$level_arr2[$y13] = $row11['level_id'] ;
	$y13++ ;
			}
	if($row10['response'] == $row11['Correct_choice'])
	{
		$notita_corr++ ;
		$level_arr5[$y16] = $row11['level_id'] ;
	$y16++ ;
		$cor_arr[$y1] = "Correct" ;
		$corattempt++;
		$marksgained = $marksgained + $row5['correct_marks'];
	}
	else
	{
		$cor_arr[$y1] = "Incorrect" ;
		$markslost = $markslost + $row5['incorrect_marks'];
	}
	$totattempt ++ ;
			
		}
		}
		if($row10['tita'] == 1)
		 {
			 $cor_choice[$y1] = $row10['tita_score'] ;
			 
		 if($row10['status'] == 4 && $row10['tita_score'] ===  "")
		{
			$ques_id = $row10['question_id'] ;
			$sql11 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result11 = mysqli_query($con,$sql11);
	$row11 = mysqli_fetch_array($result11);
	$level_arr4[$y15] = $row11['level_id'] ;
	$y15++ ;
			$mark++ ;
			$ques_type[$y1] = "Review" ;
			
		}
		 }
		if($row10['tita'] == 1)
		 {
		if($row10['status'] >= 3 && $row10['tita_score']!== "")
		{
			$tita_att++ ;
			$ques_id = $row10['question_id'] ;
			$sql11 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result11 = mysqli_query($con,$sql11);
	$row11 = mysqli_fetch_array($result11);
	$level_arr[$y1] = $row11['level_id'] ;
	$y11++ ;
	if($row10['status'] == 4)
			{
				$markreview ++ ;
				$ques_type[$y1] = "Mark & Review" ;
				$level_arr1[$y12] = $row11['level_id'] ;
	$y12++ ;
			}
			if($row10['status'] == 3)
			{
				$level_arr2[$y13] = $row11['level_id'] ;
	$y13++ ;
			}
	if($row10['tita_score'] == $row11['tita_correct'])
	{
		$tita_corr++ ;
		$level_arr5[$y16] = $row11['level_id'] ;
	$y16++ ;
		$cor_arr[$y1] = "Correct" ;
		$corattempt++;
		$marksgained = $marksgained + $row5['correct_marks'];
	}
	else
	{
		$cor_arr[$y1] = "Incorrect" ;
		$markslost = $markslost + $row5['incorrect_marks'];
	}
	$totattempt ++ ;
			
		}
		}
		$y1++ ;
	 }
	 $timespent_min = round(($timespent/60) , 1) ;
	 $test_dur = round(($row5['test_duration']/60) , 1) ;
	 $notseen = $totques - $answered - $unanswered -$markreview - $mark ;
	 $maxmarks = ($row5['correct_marks'])*$totques ;
$minmarks = -($row5['incorrect_marks'])*$totques ;
?>
<td style="text-align:left;font-size:14px">
<div class="col-xs-1">
</div>
<div class="col-xs-7">
Total Questions
</div>
<div class="col-xs-1">
<b><?php echo $totques ; ?></b>
</div> 
<br /><br />
<div class="col-xs-1">
</div>
<div class="col-xs-7">
Total Attempts
</div>
<div class="col-xs-1">
<b><?php echo $totattempt; ?></b>
</div>  
<br /><br />
<div class="col-xs-1">
</div>
<div class="col-xs-7">
Correct</div> 
<div class="col-xs-1">
<b><?php echo $corattempt; ?></b>
</div>
<br /><br />

 <div class="col-xs-1">
</div>
<div class="col-xs-7">
Incorrect 
</div>
<div class="col-xs-1">
<b><?php echo $totattempt - $corattempt; ?></b>
</div>
<br /><br />
<div class="col-xs-1">
</div>
<div class="col-xs-7">
UnAttempt
</div>
<div class="col-xs-1">
<b><?php echo $totques - $totattempt; ?></b>
</div> 
</td>
<td style="text-align:left;font-size:14px">
<div class="col-xs-2">
</div>
<div class="col-xs-7">
Marks Gained
</div>
<div class="col-xs-1">
<b><?php echo $marksgained ; ?></b>
</div> 
<br /><br />
<div class="col-xs-2">
</div>
<div class="col-xs-7">
Marks Lost
</div>
<div class="col-xs-1">
<b><?php echo $markslost; ?></b>
</div>  
<br /><br />
<div class="col-xs-2">
</div>
<div class="col-xs-7">
Marks Scored</div> 
<div class="col-xs-1">
<b><?php echo $marksgained - $markslost; ?></b>
<script>
marksscored = "<?php echo $marksgained - $markslost ?>" ;
</script>
</div>
<br /><br />
<div class="col-xs-2">
</div>
<div class="col-xs-7">
Maximum Marks 
</div>
<div class="col-xs-1">
<b><?php echo $maxmarks; ?></b>
</div>  
</td>
<td style="text-align:left;font-size:14px">

<div class="col-xs-6">
Duration
</div>
<div class="col-xs-2">
<b><?php echo $test_dur."&nbsp;"."Min" ; ?></b>
</div> 
<br /><br />
<div class="col-xs-6">
 Time Spend
</div>
<div class="col-xs-2">
<?php
if($test_dur > $timespent_min)
{
?>
<b><?php echo $timespent_min."&nbsp;"."Min" ; ?></b>
<?php
}
if($test_dur <= $timespent_min)
{
?>
<b><?php echo $test_dur."&nbsp;"."Min" ; ?></b>
<?php
}
?>
</div> 
</td>
<td style="text-align:left;font-size:14px">
<div class="col-xs-1">
<img src="green.png" alt="green" style="width:15px;height:15px" />
</div>
<div class="col-xs-7">
 Answered
</div>
<div class="col-xs-2">
<b><?php echo $answered ;?></b>
</div>
<br /><br />
<div class="col-xs-1">
<img src="red.png" alt="green" style="width:15px;height:15px" />
</div>
<div class="col-xs-7">
Unanswered
</div>
<div class="col-xs-2">
<b><?php echo $unanswered ;?></b>
</div>
<br /><br />
<div class="col-xs-1">
<img src="purpletick.png" alt="green" style="width:20px;height:20px" />
</div>
<div class="col-xs-7">
Marked & Review
</div>
<div class="col-xs-2">
<b><?php echo $markreview ;?></b>
</div>
<br /><br />
<div class="col-xs-1">
<img src="purple.png" alt="green" style="width:18px;height:18px" />
</div>
<div class="col-xs-7">
Review
</div>
<div class="col-xs-2">
<b><?php echo $mark ;?></b>
</div>
<br /><br />
<div class="col-xs-1">
<img src="white.jpg" alt="green" style="width:17px;height:17px" />
</div>
<div class="col-xs-7">
Not Visited
</div>
<div class="col-xs-2">
<b><?php echo $notseen ;?></b>
</div>
</td>
</tr>
</table>
<br /><br />
</div>

<?php
if($test_dur > $timespent_min)
{
$times_spent[0][0] = $timespent_min ;
}
if($test_dur <= $timespent_min)
{
$times_spent[0][0] = $test_dur ;
}
$times_spent[0][1] = $test_dur - $times_spent[0][0] ;
$sql12 ="SELECT * FROM user_login WHERE section_id='$section_id' AND class_id='$class_id' AND school_id='$school_id' ";
$result12 = mysqli_query($con,$sql12);
$totuser = 0;

while($row12 = mysqli_fetch_array($result12))
{
	$testflag4= false;

	$user_id1 = $row12['user_id'];
	if($testflag1 == true || $testflag3 == true) 
	{
	
	$sql85= "SELECT * FROM $table4 WHERE user_id='$user_id1' AND mock_id ='$mock_id' AND mock_state='2'" ;
	$result85 = mysqli_query($con,$sql85);
	if(mysqli_num_rows($result85) == 1)
	{
		$testflag4= true;
	}
	}
	else if($testflag2 == true) 
	{

		$testflag4= true;
	}
	
	$correct1 = 0 ;
$incorrect1 = 0 ;
$marksgained1 = 0;
$markslost1 = 0 ;
if($testflag4 == true)
{
$sql13 = "SELECT * FROM $table5 WHERE mock_id= '$mock_id' AND user_id ='$user_id1'"  ;
$result13 = mysqli_query($con,$sql13);
if(mysqli_num_rows($result13) > 0)
{
	
	while($row13 = mysqli_fetch_array($result13))
	 {
		
		 if($row13['tita'] == 0)
		 {
		if($row13['status'] >= 3 && $row13['response'] >0)
		{
			$ques_id = $row13['question_id'] ;
			$sql14 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result14 = mysqli_query($con,$sql14);
	$row14 = mysqli_fetch_array($result14);
	if($row13['response'] == $row14['Correct_choice'])
	{
		$correct1++;
		$marksgained1 = $marksgained1 + $row5['correct_marks'];
	}
	else
	{
		$incorrect1++;
		$markslost1 = $markslost1 + $row5['incorrect_marks'];
	}
			
		}
		}
		if($row13['tita'] == 1)
		 {
		if($row13['status'] >= 3 && $row13['tita_score']!== "")
		{
			$ques_id = $row13['question_id'] ;
			$sql14 = "SELECT * FROM $table2 WHERE question_id = '$ques_id' AND mock_id='$mock_id'" ;	
	$result14 = mysqli_query($con,$sql14);
	$row14 = mysqli_fetch_array($result14);
	if($row13['tita_score'] == $row14['tita_correct'])
	{
		$correct1++;
		$marksgained1 = $marksgained1 + $row5['correct_marks'];
	}
	else
	{
		$incorrect1++;
		$markslost1 = $markslost1 + $row5['incorrect_marks'];
	}
	
			
		}
		}
	 }
	 $score = $marksgained1 - $markslost1 ;
	$rank[$totuser]['score'] = $score ;
	$rank[$totuser]['user_id'] = $user_id1 ;
	$rank[$totuser]['correct'] = $correct1 ;
	$rank[$totuser]['incorrect'] = $incorrect1 ;
	$rank[$totuser]['attempt'] = $correct1 + $incorrect1 ;
	//$ranks[0][$totuser] = $score ;
	//$ranks[1][$totuser] = $user_id1 ;
	//$user_arr[$totuser] = $user_id1 ;
	?>
    <script>
	
	</script>
    <?php
$totuser++ ;	 
}
}
}
?>

<script>
totusers = "<?php echo $totuser ; ?>" ;
 maxmarks = "<?php echo $maxmarks ; ?>" ;
  minmarks = "<?php echo $minmarks ; ?>" ;

</script>
<?php
function sortByOrder($i, $j)
 {
     $a = $i['score'];
    $b = $j['score'];
    if ($a == $b) return 0;
    elseif ($a > $b) return 1;
    else return -1;
}
usort($rank, 'sortByOrder');
rsort($rank);
 for($m=0;$m<count($rank);$m++)
 {
	$ranks[0][$m]= $rank[$m]['score']; 
	$ranks[1][$m] = $rank[$m]['user_id'];
	$usid = $ranks[1][$m] ;
	$quer = "SELECT firstname FROM user_details WHERE user_id = '$usid'";
		$ress = mysqli_query($con,$quer);
		$rew = mysqli_fetch_array($ress);
		$ranks[2][$m] = $rew['firstname'];
		if($user_id == $usid)
		{
		$ranks[2][$m] = "You";	
		}
 }
?>
<div class="row">
<div class="col-xs-12 ">
<div class="col-xs-3">

</div>
<div class="col-xs-3 well" style="text-align:center;height:27px">
<p class="" style="font-size:16px;margin-top:-15px">Total Test Taker = <span style="font-weight:bold;color:grey;font-size:16px"><?php echo $totuser ; ?></span></p>
</div>
<div class="col-xs-1">
</div>
<div class="col-xs-3 well" style="text-align:center;height:27px">
<?php
$z = 0 ;
for($m=0;$m<$totuser;$m++)
{
	$z++ ;
	if($rank[$m]['user_id'] == $user_id)
	{ 
		$user = $rank[$m]['score'] ;
		$userid = $rank[$m]['user_id'];
		$ranksecured = $z ;
?> 
<p style="font-size:16px;margin-top:-15px">Rank secured = <span style="color:grey;font-weight:bold;font-size:16px"><?php echo $z."&nbsp;"."/"."&nbsp;" .$totuser?></span></p>
<?php
	}
}
?>
</div>
</div>
<br /><br />
</div>
<div class="row" style="text-align:center">
<br />
<p style="font-size:20px;color:grey">Marks Distribution of Students<p>
<br />
</div>
<div class="row">
<div class="col-xs-12" id="perfgraph" style="margin-bottom:50px">

</div>

</div>

<script>
var color = d3.scale.ordinal()
					.domain([minmarks,maxmarks])
					.range(["#3c8dbc"]);

var xdata = Array(parseInt(totusers )+ 1).fill().map((x,i)=>i),
    ydata = <?php echo json_encode($ranks) ?>;
  var user = <?php echo $user ?>;
   var userid = <?php echo $userid ?>;
 var max_val = d3.max(ydata[0]);
var margin = {top: 20, right: 15, bottom: 60, left: 60}
  , width = document.getElementById("contents").clientWidth  - margin.left - margin.right
  , height = 650 - margin.top - margin.bottom;
console.log(ydata[1][4])
console.log(ydata[0][4])
//maxmarks = 300 ;
var x = d3.scale.linear()
          .domain([1, totusers ]) //no. of students  
          .range([0, width-150 ]);        

var y = d3.scale.linear()
          .domain([minmarks, maxmarks]) //max marx of test
          .range([ height, 0 ]);
		  
var ws = 0.58*window.innerWidth ;
var ws2 = 0.67*window.innerWidth ;
var ws1 = 0.32*window.innerWidth ;

//alert(ws)
var chart = d3.select('#perfgraph')
.append('svg:svg')
.attr('width', "85%")
.attr('height', height + margin.top + margin.bottom)
.attr('class', 'chart')
.style("border", "1px solid white")
.style("background-color","white" );


var main = chart.append('g')
.attr('transform', 'translate(' + margin.left + ',' + margin.top + ')')
.attr('width', width)
.attr('height', height)
.attr('class', 'main') 

 

var xAxis = d3.svg.axis()
.scale(x)
.ticks(0)
.tickSize(1)
.orient('bottom');

var line = d3.svg.line()
.x(function (d,i) { return x(xdata[i+1]); })
.y(function (d,i) {  return y(ydata[0][i]); });

main.append("svg:path").attr("d",line(ydata[0]))
.style("fill","none")
.style("stroke","#3c8dbc");

var group = main.append('g')
.attr('transform', 'translate(0,' + height + ')')
.attr('class', 'main axis date')
.style("fill","#3c8dbc")
.call(xAxis);

group.append("text")
.text("Total Candidates Participated("+ totusers+")" )
.attr("transform","translate("+(width-350)+",35)");

var yAxis = d3.svg.axis()
.scale(y)
.ticks(15)
.tickSize(1)
.orient('left');


for(i=1;i<=9;i++){
chart.append("line")
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
chart.append("line")
.attr("x1",0)
.attr("y1",i*(height + margin.top + margin.bottom-50)/10)
.attr("x2",width)
.attr("y2",i*(height + margin.top + margin.bottom-50)/10)
.style("stroke","#000000")
.style("opacity",0.5)
.style("stroke-dasharray",5)
.style("fill","none");
}


main.append('g')
.attr('transform', 'translate(0,0)')
.attr('class', 'main axis date')
.style("fill","#3c8dbc")
.style("shape-rendering","crispEdges")
.call(yAxis);

var g = main.append("svg:g"); 

 g.selectAll("scatter-dots")

  .data(ydata[0])  
  .enter().append("svg:circle")  // create a new circle for each value
  .attr('class', 'chartdots')
  .attr("score", function (d,i) {  return ydata[0][i]; } )
   .attr("naming", function (d,i) {  return ydata[2][i]; } )
      .attr("cy", function (d,i) {  return y(ydata[0][i]); } )// translate y value to a pixel
      .attr("cx", function (d,i) { return x(xdata[i+1]); } ) // translate x value
       .attr("r",function(d,i){ if(d == user && ydata[1][i] == userid  ){ return 8}  if(d==max_val){return 6} else{return 4};}) // radius of circle
      .style("opacity", 1) // opacity of circle
      .attr("fill", function(d,i){if(d==user && ydata[1][i] == userid ){return "#0099ff"} if(d==max_val){return "#00cc99"} else{return color(y(d))};})
      .attr('transform', 'translate(0,0)');
 
 g.append("text")
 .attr('transform',"translate("+ ws + ",10)")
 .text("Highest Scorer")
 .style("font-weight","bolder")
 .style("fill","#3c8dbc");

 g.append("circle")
 .attr("cx",ws2-20)
 .attr("cy",7)
 .attr("r",6)
 .attr("fill","#00cc99");

g.append("text")
 .attr('transform',"translate("+ ws + ",60)")
 .text("My Score"+"("+marksscored +")" )
.style("font-weight","bolder")
 .style("fill","#3c8dbc");

 g.append("circle")
 .attr("cx",ws2-20)
 .attr("cy",56)
 .attr("r",6)
 .attr("fill","#0099ff");
 
 
 if(user== max_val)
 {
	 g.append("text")
 .attr('transform',"translate("+ ws1 + ",20)")
 .text("You are the Highest Scorer");
 }
 
 $('.chartdots').tipsy({ 
        gravity: 'w', 
        html: true, 
        title: function() {
         text = this.getAttribute('naming') + "-" + "&nbsp;" + this.getAttribute('score') ; 
		 return text ;
        }
      }); 
chart.on({
      "mouseover": function(d) {
        d3.select(this).style("cursor", "pointer")
      },
      "mouseout": function(d) {
        d3.select(this).style("cursor", "default")
      }
    });

</script>

