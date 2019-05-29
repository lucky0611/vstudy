<?php
$toppersten = array() ;
$flag_user = false ;
?>
<div class="row">
<br />
<div class="col-xs-12">
<p style="text-align:center;font-size:22px;color:grey">Overall Comparison With Toppers</p>
</div>
</div>
<div class="row">
<br />
<div class="col-xs-12">
<table class="table table-striped">
<tr>
<th style="text-align:center">Student's Name</th>
<th style="text-align:center">Rank</th>
<th style="text-align:center">Total Questions</th>
<th style="text-align:center">Attempted</th>
 <th style="text-align:center">Unattempted</th>
<th style="text-align:center">Correct</th>
<th style="text-align:center">Incorrect</th>
 <th style="text-align:center">Marks obtained</th>
 <th style="text-align:center">Accuracy %</th>
</tr>
<?php
$k = 0 ;
$avgscores = 0;
for($i=0;$i<count($rank);$i++)
{
	$avgscores = $avgscores + $rank[$i]['score'];
	
	if($i <= 9)
	{
   $toppersten[0][$i] = $rank[$i]['score'];
	$toppersten[1][$i] = $rank[$i]['user_id'];
	
	$users_id =$rank[$i]['user_id'] ;
$sqls ="SELECT * FROM user_details WHERE user_id='$users_id'";
$results = mysqli_query($con,$sqls);
$rows = mysqli_fetch_array($results);  
$toppersten[2][$i] = $rows['firstname'] ;
$firstn = strtoupper($rows['firstname']);
$lastn = strtoupper($rows['lastname']);
?>
<tr>
<td style="text-align:center"><?php echo $firstn."&nbsp;".$lastn ;
if($user_id == $users_id)
{
	$flag_user = true ;
	?>
   <span>(</span><span style="color:green">You</span><span>)</span>
    <?php
}
 ?></td>
<td style="text-align:center"><?php echo $i + 1 ; ?></td>
<td style="text-align:center"><?php echo $totques ; ?></td>
<td style="text-align:center"><?php echo $rank[$i]['attempt'] ; ?></td>
<td style="text-align:center"><?php echo $totques - $rank[$i]['attempt'] ; ?></td>
<td style="text-align:center"><?php echo $rank[$i]['correct'] ; ?></td>
<td style="text-align:center"><?php echo $rank[$i]['incorrect'] ; ?></td>
<td style="text-align:center"><?php echo $rank[$i]['score'] ; ?></td>
<?php
if($rank[$i]['attempt'] != 0)
{
	$accu = round(($rank[$i]['correct']/$rank[$i]['attempt'])*100,2);
}
if($rank[$i]['attempt'] == 0)
{
	$accu = 0 ;
}
?>
<td style="text-align:center"><?php echo $accu."&nbsp;"."%"; ?></td>
</tr>
<?php
$k++ ;
	}
}
if($flag_user == false)
{
	$toppersten[0][$k] = $user;
	$toppersten[1][$k] = $user_id;
$toppersten[2][$k] = "You" ;
?>
<tr>
<td style="text-align:center"><?php echo strtoupper($_SESSION['firstname'])."&nbsp;".strtoupper($_SESSION['lastname']) ;

	?>
   <span>(</span><span style="color:red">You</span><span>)</span>
    <?php

 ?></td>
<td style="text-align:center"><?php echo $ranksecured ; ?></td>
<td style="text-align:center"><?php echo $totques ; ?></td>
<td style="text-align:center"><?php echo $totattempt ; ?></td>
<td style="text-align:center"><?php echo $totques - $totattempt ; ?></td>
<td style="text-align:center"><?php echo $corattempt ; ?></td>
<td style="text-align:center"><?php echo $totques - $totattempt; ?></td>
<td style="text-align:center"><?php echo $marksgained - $markslost ; ?></td>
<?php
if($totattempt != 0)
{
	$accu = round(($corattempt/$totattempt)*100,2);
}
if($totattempt == 0)
{
	$accu = 0 ;
}
?>
<td style="text-align:center"><?php echo $accu."&nbsp;"."%"; ?></td>
</tr>
<?php
$k++ ;
}
?>
</table>
</div>
</div>
<div class="row">
<br /><br />
<div class="col-xs-5">
</div>
<div class="col-xs-3 well" style="height:40px;">
<p style="text-align:center;font-size:18px;margin-top:-15px">Average Score = <span style="color:#1472cc;font-weight:bold"><?php echo round(($avgscores/count($rank)),2) ?></span></p> 
</div>
</div>
<div class="row">
<br />
<p style="text-align:center;color:grey;font-size:22px">Comparison of Your Performance with Topper's Performance</p>
</div>
<div class="row">
<br /><br />
<div class="col-xs-12" id="appendten">
</div>
</div>
<div class="row">
<br /><br />
</div>
<script>
var totusers = <?php echo $k ?>;
var color = d3.scale.ordinal()
					.domain([minmarks,maxmarks])
					.range(["#3c8dbc"]);

var xdata = Array(parseInt(totusers )+ 1).fill().map((x,i)=>i),
    ydata = <?php echo json_encode($toppersten) ?>;
  var user = "<?php echo $user ?>";
   var userid = "<?php echo $userid ?>";
   
 var max_val = d3.max(ydata[0]);

 //console.log(xdata[6])

var margin = {top: 20, right: 15, bottom: 60, left: 60}
  , width = document.getElementById("contents").clientWidth  - margin.left - margin.right
  , height = 650 - margin.top - margin.bottom;

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
var chart = d3.select('#appendten')
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
.text("Total Candidates Compared("+ totusers+")" )
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
  .enter().append("svg:circle")
.attr('class', 'chartdots1')
  .attr("score1", function (d,i) {  return ydata[0][i]; } )
   .attr("naming1", function (d,i) {  return ydata[2][i]; } )  // create a new circle for each value
      .attr("cy", function (d,i) { return y(ydata[0][i]); } ) // translate y value to a pixel
      .attr("cx", function (d,i) { return x(xdata[i+1]); } ) // translate x value
      .attr("r",function(d,i){ if(d==user && ydata[1][i] == userid ){return 8} if(d==max_val){return 6} else{return 4};}) // radius of circle
      .style("opacity", 1) // opacity of circle
      .attr("fill", function(d,i){if(d==user && ydata[1][i] == userid){return "#0099ff"} if(d==max_val){return "#00cc99"} else{return color(y(d))};})
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
  $('.chartdots1').tipsy({ 
        gravity: 'w', 
        html: true, 
        title: function() {
         text = this.getAttribute('naming1') + "-" + "&nbsp;" + this.getAttribute('score1') ; 
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
