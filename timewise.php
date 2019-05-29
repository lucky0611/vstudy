<?php
$timearrs = array() ;
?>
<div class="row">
<div class="col-xs-12">
<p style="text-align:center;color:grey;font-size:20px">Overall Time Analysis</p>
<br />
</div>
<div class="col-xs-3">
<p style="font-size:14px">Test Duration : <b><?php echo $test_dur ?>&nbsp; Min</b></p>
</div>
<div class="col-xs-2">
<?php
if($timespent_min < $test_dur)
{
?>
<p style="font-size:14px">Time Spend : <b><?php echo $timespent_min; ?>&nbsp; Min</b></p>
<?php
}
if($timespent_min >= $test_dur)
{
?>
<p style="font-size:14px">Time Spend : <b><?php echo $test_dur; ?>&nbsp; Min</b></p>
<?php
}
?>
</div>
<div class="col-xs-1">
</div>
<div class="col-xs-4" id="times">
</div>
<div class="col-xs-2">
<div class="col-xs-12"  >
  <p style="font-size:14px;"><img src="blacks.png" style="height:15px;width:15px">&nbsp;&nbsp;% Time spend</p>
  </div>
  <div class="col-xs-12"  >
  <p style="font-size:14px;"><img src="blues.png" style="height:15px;width:15px">&nbsp;&nbsp;% Unused Time</p>
  </div>
</div>
</div>
<br />
<div class="row" >
<div class="col-xs-12" >
<p style="text-align:center;color:grey;font-size:22px">Sectional Time Analysis</p>
<br />
</div>
<?php
$sumtime = 0;
for($i = 0;$i<$num_sec;$i++)
{
	
	$timearrs[$i] = round(($sec_timestore[$i]/$test_dur)*100 ,2) ;
	$sumtime = $sumtime + $timearrs[$i] ;
	$j = $i +1 ;
	if($i == $num_sec -1)
	{
		if($sumtime > 100 )
		{
			$sumtime = $sumtime - $timearrs[$i] ;
			$timearrs[$i] = 100 - $sumtime ;
			$sumtime = $sumtime + $timearrs[$i] ;
		}
		
	}
?>
<div class="col-xs-4" >
<div class="col-xs-12" >
<p style="font-weight:bold;font-size:14px"><?php echo "Section".$j."&nbsp;"."-"."&nbsp;".$secname[$i] ; ?></p>
</div>
<?php
if($row5['time_limit'] == 1)
{
?>
<div class="col-xs-12" >
<p style="font-size:14px">Sectional Duration : <b><?php echo $seclimit[$i]; ?>&nbsp; Min</b></p>
</div>
<?php
}
?>
<div class="col-xs-12">
<?php
if($row5['time_limit'] == 1)
{
?>
<?php
if($sec_timestore[$i] <  $seclimit[$i] )
{
?>
<p style="font-size:14px">Time Spend : <b><?php echo $sec_timestore[$i]; ?>&nbsp; Min</b></p>
<?php
}
if($sec_timestore[$i] >=  $seclimit[$i] )
{
?>
<p style="font-size:14px">Time Spend : <b><?php echo $seclimit[$i]; ?>&nbsp; Min</b></p>
<?php
}
}
if($row5['time_limit'] == 0)
{
?>
<p style="font-size:14px">Time Spend : <b><?php echo $sec_timestore[$i]; ?>&nbsp; Min</b></p>
<?php
}
?>
</div>
</div>
<?php
}
?>
</div>
<?php
if($num_sec >1 && $row5['time_limit'] == 0)
{
?>
<div class="row">
<br /><br />
<div class="col-xs-12">
<p style="text-align:center;font-size:22px;color:grey">Sectional Time Spend as a Percentage of Total Time</p>

</div>
<div class="col-xs-12">
<br />
<div class="col-xs-3">
</div>
<div class="col-xs-6" id="noseclimit" style="background-color:white">
</div>
<div class="col-xs-3">
</div>
</div>
</div>
<div class="row">
<br /><br /><br />
</div>
<script>
//Name of sections
sections = <?php echo json_encode($namesection) ?>; 

var TimeArray = <?php echo json_encode($timearrs) ; ?> //data in minutes
var no_sec = TimeArray.length;
var width =0.5*window.innerWidth
var height = 500;

var y = d3.scale.linear()
			.domain([0,100]) //
			.range([0,100]);
var color = d3.scale.ordinal()
					.range(["#3c8dbc"]);


var widthScale = d3.scale.linear()
   					.range([0, 1.2*width]);


var canvas = d3.select("#noseclimit")
	.append("svg")
	.attr("width", "100%")
	.attr("height", height)
	for(i=1;i<=6;i++){
canvas.append("line")
.attr("x1",i*width/6)
.attr("y1",height + margin.top + margin.bottom)
.attr("x2",i*width/6)
.attr("y2",0)
.style("stroke","#000000")
.style("opacity",0.5)
.style("stroke-dasharray",5)
.style("fill","none");
}

for(i=1;i<=6;i++){
canvas.append("line")
.attr("x1",0)
.attr("y1",i*(height + margin.top + margin.bottom-50)/8)
.attr("x2",width + margin.right + 50)
.attr("y2",i*(height + margin.top + margin.bottom-50)/8)
.style("stroke","#000000")
.style("opacity",0.5)
.style("stroke-dasharray",5)
.style("fill","none");
}
	
canvas.append("text")
		.attr("x",width/1.9)
		.attr("y",height/7.5-10)
		.html("x   -    Sections")
		.attr("text-anchor","left")
		.attr("font-size","18px")
		.style("fill","#3c8dbc");
		

canvas.append("text")
		.attr("x",width/1.9)
		.attr("y",height/4-28)
		.html("y   -    % Time")
		.attr("text-anchor","left")
		.attr("font-size","18px")
		.style("fill","#3c8dbc");
				

var axis = d3.svg.axis()
				.ticks(0)
				.tickSize(2)
				.scale(widthScale);

var bars = canvas.selectAll("rect")
				.data(TimeArray)
				.enter();
				
bars.append("rect")
	.attr("width", 30)
	.attr("height",function(d){return y(d)*3;})
	.attr("x", function(d,i){return 50+ i*80;})
	.attr("y", function(d){return (450-y(d)*3);})
	.attr("fill", function(d,i){return color(i);})

bars.append("text")
	.attr("x",function(d,i){return 65+i*80;})
	.attr("y",function(d){return 445-y(d)*3;})
	.attr("text-anchor","middle")
	.text(function(d){return d +"%";})
	.attr("font-size","11px");		

bars.append("text")
	.attr("x",function(d,i){return 65+i*80;})
	.attr("y",function(d){return 465;})
	.attr("text-anchor","middle")
	.text(function(d,i){return sections[i];})
	.attr("font-size","11px");			


canvas.append("g")
		.attr("transform", "translate(50, 450)")
		.call(axis)
		.style("fill","#3c8dbc");
		


		

</script>
<?php
}
?>
<script type="text/javascript">
		  timespend = <?php echo json_encode($times_spent) ?>; 
	
		 </script>
	<script>
	var ra = 40;
	
// negative marks

// Section 1

	var color = d3.scale.ordinal()
					.range(["#222D32","#3c8dbc"]);

	var canvas1 = d3.select("#times").append("svg")
						.attr("width", "100%")
						.attr("height", 170)
						.attr("id","mysvg")
						
	
	r1a = 60 ;

	
	var group1 = canvas1.append("g")
	.attr("transform","translate(" + 120 + "," + 95 +")");				
	group1.append("text")
					.attr("transform", "translate(10,-85)")
					.text("Time spend as a fraction of test duration")
					.attr("font-size", 14)
					.attr("text-anchor","middle");																						
	var arc = d3.svg.arc()
				.innerRadius(r1a)
				.outerRadius(ra);									

	var pie = d3.layout.pie()
				.value(function(d) {return d; });

	var arcs = group1.selectAll(".arc")
					.data(pie(timespend[0]))
					.enter()
					.append("g")
					.attr("class", "arc");

	arcs.append("path")
		.attr("d", arc)
		.attr("fill", function(d,i){return color(i);});	

	arcs.append("text")
	.attr("transform", function(d) {
    var c = arc.centroid(d),
        x = c[0],
        y = c[1],

        // pythagorean theorem for hypotenuse
        h = Math.sqrt(x*x + y*y);

        if(y <= 0){ deg = Math.asin(x/h)*180/Math.PI ; b = (x/h * (60+8)); c = (y/h * (60+8)) } else { deg = -Math.asin(x/h)*180/Math.PI; b = (x/h * (60+12)); c = (y/h * (60+12))}
    return "translate(" + b +  ',' + c
       +  ")rotate(" +deg+")"

	;})
	.text(function(d){return d3.round(((d.data)/(timespend[0][0] + timespend[0][1])*100), 2) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle");


//var appendid = document.getElementById("appendlist") ;
//var canvas11 = d3.select("#tabs-2").append(appendid)
	</script>
   