<div class="row">

 <div class="col-xs-6">
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
</div>
<?php
$easy = 0;
$diff = 0;
$mod = 0;
for($i=0;$i<count($level_tot);$i++)
{

	if($level_tot[$i] == 1)
	{
		$easy++ ;
	}
	if($level_tot[$i] == 2)
	{
		$mod ++ ;
	}
	if($level_tot[$i] == 3)
	{
		$diff++ ;
	}
}
$easy1 = 0;
$diff1 = 0;
$mod1 = 0;
for($i=0;$i<count($level_arr);$i++)
{
	if($level_arr[$i] == 1)
	{
		$easy1++ ;
	}
	if($level_arr[$i] == 2)
	{
		$mod1 ++ ;
	}
	if($level_arr[$i] == 3)
	{
		$diff1++ ;
	}
}
$easy2 = 0;
$diff2 = 0;
$mod2 = 0;

for($i=0;$i<count($level_arr1);$i++)
{
	if($level_arr1[$i] == 1)
	{
		$easy2++ ;
	}
	if($level_arr1[$i] == 2)
	{
		$mod2 ++ ;
	}
	if($level_arr1[$i] == 3)
	{
		$diff2++ ;
	}
}
$easy3 = 0;
$diff3 = 0;
$mod3 = 0;

for($i=0;$i<count($level_arr2);$i++)
{
	if($level_arr2[$i] == 1)
	{
		$easy3++ ;
	}
	if($level_arr2[$i] == 2)
	{
		$mod3 ++ ;
	}
	if($level_arr2[$i] == 3)
	{
		$diff3++ ;
	}
}
$easy4 = 0;
$diff4 = 0;
$mod4 = 0;

for($i=0;$i<count($level_arr3);$i++)
{
	if($level_arr3[$i] == 1)
	{
		$easy4++ ;
	}
	if($level_arr3[$i] == 2)
	{
		$mod4 ++ ;
	}
	if($level_arr3[$i] == 3)
	{
		$diff4++ ;
	}
}
$easy5 = 0;
$diff5 = 0;
$mod5 = 0;

for($i=0;$i<count($level_arr4);$i++)
{
	if($level_arr4[$i] == 1)
	{
		$easy5++ ;
	}
	if($level_arr4[$i] == 2)
	{
		$mod5 ++ ;
	}
	if($level_arr4[$i] == 3)
	{
		$diff5++ ;
	}
}
$easy6 = 0;
$diff6 = 0;
$mod6 = 0;


for($i=0;$i<count($level_arr5);$i++)
{
	if($level_arr5[$i] == 1)
	{
		$easy6++ ;
	}
	if($level_arr5[$i] == 2)
	{
		$mod6 ++ ;
	}
	if($level_arr5[$i] == 3)
	{
		$diff6++ ;
	}
}
if($easy1 == 0)
{
	$accueasy = 0 ;
}
if($easy1 != 0)
{
$accueasy = ($easy6/$easy1)*100 ;
}
if($mod1 == 0)
{
	$accumod = 0 ;
}
if($mod1 != 0)
{
$accumod = ($mod6/$mod1)*100 ;
}
if($diff1 == 0)
{
	$accudiff = 0 ;
}
if($diff1 != 0)
{
$accudiff = ($diff6/$diff1)*100 ;
}

?>
<div class="row">
<p style="text-align:center;color:grey;;font-size:22px">Overall Difficulty Analysis</p>

</div>
<div class="row">
<div class="col-xs-12">
<div class="col-xs-3">
<br />
<button type="button" class="btn  btn-lg" data-toggle="modal" data-target="#myModalss" style="font-size:18px;background-color:#337Ab7;color:white" onMouseOver="this.style.backgroundColor='#1265ab'" onMouseOut="this.style.backgroundColor='#337Ab7'"><i class="fa fa-table fa-fw"></i> &nbsp;&nbsp;View Marks Status</button>
</div>
</div>
      </div>
  <!-- Modal -->
  <div class="modal fade" id="myModalss" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#337Ab7;">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h2 class="modal-title" style="color:white;text-align:center">Difficulty Analysis</h2>
        </div>
        <br />
        <div class="modal-body">
        <?php
		for($j =1 ;$j<=3;$j++)
		{
		?>
         <table class=" table table-striped">
         <?php
	  if($j == 1)
	  {
	  ?>
   <caption style="text-align:center;font-size:20px">Easy</caption>
         <?php
	  }
	  if($j == 2)
	  {
	  ?>
   <caption style="text-align:center;font-size:20px">Moderate</caption>
         <?php
	  }
	  if($j == 3)
	  {
	  ?>
   <caption style="text-align:center;font-size:20px">Difficult</caption>
         <?php
	  }
	  ?>
      <tr>
      <th style="text-align:center">Total Questions</th>
      <th style="text-align:center">Attempted</th>
      <th style="text-align:center">Unattempted</th>
      <th style="text-align:center">Correct</th>
      <th style="text-align:center">Incorrect</th>
      <th style="text-align:center">Marks obtained</th>
      </tr>
       <tr>
      <?php
	  if($j == 1)
	  {
	  ?>
     
      <td style="text-align:center"><?php echo $easy ; ?></td>
  <td style="text-align:center"><?php echo $easy1 ; ?></td> 
  <td style="text-align:center"><?php echo $easy - $easy1 ; ?></td>     
  <td style="text-align:center"><?php echo $easy6 ; ?></td> 
  <td style="text-align:center"><?php echo $easy1 - $easy6 ; ?></td>
  <td style="text-align:center"><?php echo $easy6*$row5['correct_marks'] - ($easy1 - $easy6)*$row5['incorrect_marks'] ; ?></td>     
      <?php
	  }
	  
	  if($j == 2)
	  {
	  ?>
    
      <td style="text-align:center"><?php echo $mod ; ?></td>
  <td style="text-align:center"><?php echo $mod1 ; ?></td>
 <td style="text-align:center"><?php echo $mod - $mod1 ; ?></td>    
 <td style="text-align:center"><?php echo $mod6 ; ?></td>  <td style="text-align:center"><?php echo $mod1 - $mod6 ; ?></td>     
 <td style="text-align:center"><?php echo $mod6*$row5['correct_marks'] - ($mod1 - $mod6)*$row5['incorrect_marks'] ; ?></td> 
      <?php
	  }
	  if($j == 3)
	  {
	  ?>
      
      <td style="text-align:center"><?php echo $diff ; ?></td>
  <td style="text-align:center"><?php echo $diff1 ; ?></td>
 <td style="text-align:center"><?php echo $diff - $diff1 ; ?></td>    
 <td style="text-align:center"><?php echo $diff6 ; ?></td>  <td style="text-align:center"><?php echo $diff1 - $diff6 ; ?></td> 
 <td style="text-align:center"><?php echo $diff6*$row5['correct_marks'] - ($diff1 - $diff6)*$row5['incorrect_marks'] ; ?></td>    
      <?php
	  }
	  ?>
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
<div class="row">
<br />
<div class="col-xs-12">
<table class="table table-striped">
<caption>Level-wise Analysis</caption>
<tr>
<th style="text-align:center">Level</th>
  <th style="text-align:center">Total Attempts</th>
  <th style="text-align:center"><img src="green.png" alt="green" style="width:15px;height:15px" />&nbsp;&nbsp;Answered</th>
  <th style="text-align:center"><img src="red.png" alt="green" style="width:15px;height:15px" />&nbsp;&nbsp;Unanswered</th>
  <th style="text-align:center"><img src="purple.png" alt="green" style="width:18px;height:18px" />&nbsp;&nbsp;Review </th>
  <th style="text-align:center"><img src="purpletick.png" alt="green" style="width:20px;height:20px" />&nbsp;&nbsp;Mark & Review</th>
   <th style="text-align:center"><img src="white.jpg" alt="green" style="width:17px;height:17px" />&nbsp;&nbsp;Not Visited</th>
</tr>
<tr>
<td style="text-align:center">Easy</td>
<td style="text-align:center"><?php echo $easy1 ; ?></td>
<td style="text-align:center"><?php echo $easy3 ; ?></td>
<td style="text-align:center"><?php echo $easy4 ; ?></td>
<td style="text-align:center"><?php echo $easy5 ; ?></td>
<td style="text-align:center"><?php echo $easy2 ; ?></td>
<td style="text-align:center"><?php echo $easy - $easy1 -$easy4 -$easy5 ; ?></td>
</tr>
<tr>
<td style="text-align:center">Moderate</td>
<td style="text-align:center"><?php echo $mod1 ; ?></td>
<td style="text-align:center"><?php echo $mod3 ; ?></td>
<td style="text-align:center"><?php echo $mod4 ; ?></td>
<td style="text-align:center"><?php echo $mod5 ; ?></td>
<td style="text-align:center"><?php echo $mod2 ; ?></td>
<td style="text-align:center"><?php echo $mod - $mod1 -$mod4 -$mod5 ; ?></td>
</tr>
<tr>
<td style="text-align:center">Difficult</td>
<td style="text-align:center"><?php echo $diff1 ; ?></td>
<td style="text-align:center"><?php echo $diff3 ; ?></td>
<td style="text-align:center"><?php echo $diff4 ; ?></td>
<td style="text-align:center"><?php echo $diff5 ; ?></td>
<td style="text-align:center"><?php echo $diff2 ; ?></td>
<td style="text-align:center"><?php echo $diff - $diff1 -$diff4 -$diff5 ; ?></td>
</tr>
</table>
</div>
<br />
</div>
<div class="row">
<br />
<p style="text-align:center;color:grey;;font-size:20px">Graphical Representation of Level-wise Accuracy Analysis </p>
<br />
</div>
<div class="row">
<br /><br />
<div class="col-xs-12">
<div class="col-md-4" >
<div class="col-xs-12"  id="1easyaccu">
<p style="text-align:center;font-size:20px;font-size:20px">Easy Level</p>
</div>
<div class="col-xs-12" id="easyaccu">
</div>
</div>
<div class="col-md-4">
<div class="col-xs-12" >
<p style="text-align:center;font-size:20px;font-size:20px">Moderate Level</p>
</div>
<div class="col-xs-12" id="modaccu">
</div>
</div>
<div class="col-md-4">
<div class="col-xs-12" >
<p style="text-align:center;font-size:20px;font-size:20px">Difficult Level</p>
</div>
<div class="col-xs-12" id="diffaccu">
</div>
</div>
</div>
</div>

	<script>
	
var rl = 110;
	
sectionname1 = [<?php echo $easy6 ?>,<?php echo $easy1 - $easy6 ?>,<?php echo $easy - $easy1 ?>];
// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
	var canvas = d3.select("#easyaccu").append("svg")
						.attr("width", "100%")
						.attr("height", 350)
						.attr("id","mysvg");
wds = 0.12*window.innerWidth ;
//alert(wdss)
	var group = canvas.append("g")
	
					.attr("transform","translate(" + wds + "," + 150 +")");
					if(sectionname1[0] == 0 && sectionname1[1] == 0 && sectionname1[2] == 0)
					{	
					}
					else
					{
					group.append("text")
					.attr("transform", "translate(0,0)")
					.text("% Accuracy = " + <?php echo round($accueasy,2) ; ?> + "%")
					.attr("font-size", 12)
					.attr("text-anchor","middle");	
					
																							
	var arc = d3.svg.arc()
				.innerRadius(85)
				.outerRadius(rl);									

	var pie = d3.layout.pie()
				.value(function(d) {return d; });

	var arcs = group.selectAll(".arc")
					.data(pie(sectionname1))
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

        if(y <= 0){ deg = Math.asin(x/h)*180/Math.PI ; b = (x/h * (110+8)); c = (y/h * (110+8)) } else { deg = -Math.asin(x/h)*180/Math.PI; b = (x/h * (110+12)); c = (y/h * (110+12))}
    return "translate(" + b +  ',' + c
       +  ")rotate(" +deg+")"

	;})
	.text(function(d){ return d3.round((d.data)/(sectionname1[0] + sectionname1[1] +sectionname1[2])*100, 2) + "%";})
	.attr("fill","#000000")
	.style("text-anchor","middle");
}
	//var appendid = document.getElementById("appendlist") ;
//var canvas1 = d3.select("#tabs-2").append(appendid)
	</script>
    <script>
var rl = 110;
	
sectionname1 = [<?php echo $mod6 ?>,<?php echo $mod1 - $mod6 ?>,<?php echo $mod - $mod1 ?>];
// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
	var canvas = d3.select("#modaccu").append("svg")
						.attr("width", "100%")
						.attr("height", 350)
						.attr("id","mysvg")
wds = 0.12*window.innerWidth ;
	var group = canvas.append("g")
					.attr("transform","translate(" + wds + "," + 150 +")");	
				if(sectionname1[0] == 0 && sectionname1[1] == 0 && sectionname1[2] == 0)
					{	
					}
					else
					{
					group.append("text")
					.attr("transform", "translate(0,0)")
					.text("% Accuracy = " + <?php echo round($accumod,2) ; ?> + "%")
					.attr("font-size", 15)
					.attr("text-anchor","middle");			
					
	var arc = d3.svg.arc()
				.innerRadius(85)
				.outerRadius(rl);									

	var pie = d3.layout.pie()
				.value(function(d) {return d; });

	var arcs = group.selectAll(".arc")
					.data(pie(sectionname1))
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

        if(y <= 0){ deg = Math.asin(x/h)*180/Math.PI ; b = (x/h * (110+8)); c = (y/h * (110+8)) } else { deg = -Math.asin(x/h)*180/Math.PI; b = (x/h * (110+12)); c = (y/h * (110+12))}
    return "translate(" + b +  ',' + c
       +  ")rotate(" +deg+")"

	;})
	.text(function(d){ return d3.round((d.data)/(sectionname1[0] + sectionname1[1] +sectionname1[2])*100, 2) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle");
}
	//var appendid = document.getElementById("appendlist") ;
//var canvas1 = d3.select("#tabs-2").append(appendid)
	</script>
    
     <script>
var rl = 110;
	
sectionname1 = [<?php echo $diff6 ?>,<?php echo $diff1 - $diff6 ?>,<?php echo $diff - $diff1 ?>];
// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
	var canvas = d3.select("#diffaccu").append("svg")
						.attr("width", "100%")
						.attr("height", 350)
						.attr("id","mysvg")
wds = 0.12*window.innerWidth ;
	var group = canvas.append("g")
					.attr("transform","translate(" + wds+5 + "," + 150 +")");	
					if(sectionname1[0] == 0 && sectionname1[1] == 0 && sectionname1[2] == 0)
					{
					}
					else
					{
					group.append("text")
					.attr("transform", "translate(0,0)")
					.text("% Accuracy = " + <?php echo round($accudiff,2); ?> + "%")
					.attr("font-size", 15)
					.attr("text-anchor","middle");		
					
	var arc = d3.svg.arc()
				.innerRadius(85)
				.outerRadius(rl);									

	var pie = d3.layout.pie()
				.value(function(d) {return d; });

	var arcs = group.selectAll(".arc")
					.data(pie(sectionname1))
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

        if(y <= 0){ deg = Math.asin(x/h)*180/Math.PI ; b = (x/h * (110+8)); c = (y/h * (110+8)) } else { deg = -Math.asin(x/h)*180/Math.PI; b = (x/h * (110+12)); c = (y/h * (110+12))}
    return "translate(" + b +  ',' + c
       +  ")rotate(" +deg+")"

	;})
	.text(function(d){ return d3.round((d.data)/(sectionname1[0] + sectionname1[1] +sectionname1[2])*100, 2) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle");
}
	//var appendid = document.getElementById("appendlist") ;
//var canvas1 = d3.select("#tabs-2").append(appendid)
	</script>
    
  <?php
  include("seclevelwise.php");
  ?>