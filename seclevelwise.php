<?php
$seceasycomp = array() ;
$secmodcomp = array() ;
$secdiffcomp = array() ;
?>
<div class="row" >
<div class="col-xs-12">
<p style="text-align:center;font-size:22px;color:grey">Sectional Difficulty Analysis</p>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<?php
for($i =1;$i<=$num_sec;$i++)
{
	$eassec = 0 ;
	$modsec = 0;
	$diffsec = 0 ;
	if(!empty($level_sec1[$i-1]))
	{
	for($k =0;$k< count($level_sec1[$i-1]);$k++)
	{
		if($level_sec1[$i-1][$k] == 1)
		{
			$eassec ++ ;
		}
		if($level_sec1[$i-1][$k] == 2)
		{
			$modsec ++ ;
		}

        if($level_sec1[$i-1][$k] == 3)
		{
			$diffsec ++ ;
		}
}
	}
	$eassec1 = 0 ;
	$modsec1 = 0;
	$diffsec1 = 0 ;
	if(!empty($level_sec2[$i-1]))
	{
	for($k =0;$k< count($level_sec2[$i-1]);$k++)
	{
		if($level_sec2[$i-1][$k] == 1)
		{
			$eassec1 ++ ;
		}
		if($level_sec2[$i-1][$k] == 2)
		{
			$modsec1 ++ ;
		}

        if($level_sec2[$i-1][$k] == 3)
		{
			$diffsec1 ++ ;
		}
}
	}
	$eassec2 = 0 ;
	$modsec2 = 0;
	$diffsec2 = 0 ;
	if(!empty($level_sec3[$i-1]))
	{
	for($k =0;$k< count($level_sec3[$i-1]);$k++)
	{
		if($level_sec3[$i-1][$k] == 1)
		{
			$eassec2 ++ ;
		}
		if($level_sec3[$i-1][$k] == 2)
		{
			$modsec2++ ;
		}

        if($level_sec3[$i-1][$k] == 3)
		{
			$diffsec2 ++ ;
		}
}
	}
	$eassec3 = 0 ;
	$modsec3 = 0;
	$diffsec3 = 0 ;
	if(!empty($level_sec4[$i-1]))
	{
	for($k =0;$k< count($level_sec4[$i-1]);$k++)
	{
		if($level_sec4[$i-1][$k] == 1)
		{
			$eassec3 ++ ;
		}
		if($level_sec4[$i-1][$k] == 2)
		{
			$modsec3++ ;
		}

        if($level_sec4[$i-1][$k] == 3)
		{
			$diffsec3 ++ ;
		}
}
	}
	$eassec4 = 0 ;
	$modsec4 = 0;
	$diffsec4 = 0 ;
	if(!empty($level_sec5[$i-1]))
	{
	for($k =0;$k< count($level_sec5[$i-1]);$k++)
	{
		if($level_sec5[$i-1][$k] == 1)
		{
			$eassec4 ++ ;
		}
		if($level_sec5[$i-1][$k] == 2)
		{
			$modsec4++ ;
		}

        if($level_sec5[$i-1][$k] == 3)
		{
			$diffsec4 ++ ;
		}
}
	}
	$eassec5 = 0 ;
	$modsec5 = 0;
	$diffsec5 = 0 ;
	if(!empty($level_sec6[$i-1]))
	{
	for($k =0;$k< count($level_sec6[$i-1]);$k++)
	{
		if($level_sec6[$i-1][$k] == 1)
		{
			$eassec5 ++ ;
		}
		if($level_sec6[$i-1][$k] == 2)
		{
			$modsec5++ ;
		}

        if($level_sec6[$i-1][$k] == 3)
		{
			$diffsec5 ++ ;
		}
}
	}
	$eassec6 = 0 ;
	$modsec6 = 0;
	$diffsec6 = 0 ;
	if(!empty($level_sec7[$i-1]))
	{
	for($k =0;$k< count($level_sec7[$i-1]);$k++)
	{
		if($level_sec7[$i-1][$k] == 1)
		{
			$eassec6 ++ ;
		}
		if($level_sec7[$i-1][$k] == 2)
		{
			$modsec6++ ;
		}

        if($level_sec7[$i-1][$k] == 3)
		{
			$diffsec6 ++ ;
		}
}
	}
	if($eassec == 0)
{
	$accueasysec = 0 ;
}
if($eassec != 0)
{
$accueasysec = round(($eassec6/$eassec)*100,1) ;
}
if($modsec == 0)
{
	$accumodsec = 0 ;
}
if($modsec != 0)
{
$accumodsec = round(($modsec6/$modsec)*100,1) ;
}
if($diffsec == 0)
{
	$accudiffsec = 0 ;
}
if($diffsec != 0)
{
$accudiffsec = round(($diffsec6/$diffsec)*100,1) ;
}
if($eassec5 != 0)
{
$seceasycomp[$i-1] = round(($eassec/$eassec5)*100,1) ;
}
if($eassec5 == 0)
{
$seceasycomp[$i-1] = 0 ;
}
if($modsec5 != 0)
{
$secmodcomp[$i-1] = round(($modsec/$modsec5)*100,1) ;
}
if($modsec5 == 0)
{
$secmodcomp[$i-1] = 0 ;
}
if($diffsec5 != 0)
{
$secdiffcomp[$i-1] = round(($diffsec/$diffsec5)*100,1) ;
}
if($diffsec5 == 0)
{
$secdiffcomp[$i-1] = 0 ;
}

	?>
    <br />
     <p style="text-align:center;font-size:20px">Section<?php echo $i ; ?></p>
    
  <div class="row">
<div class="col-xs-12">
<div class="col-xs-3">
<br />
<button type="button" data-toggle="modal" data-target="#myModalsec<?php echo $i ?>" class="btn btn-lg" style="font-size:18px;background-color:#337Ab7;color:white" onMouseOver="this.style.backgroundColor='#1265ab'" onMouseOut="this.style.backgroundColor='#337Ab7'"><i class="fa fa-table fa-fw"></i> &nbsp;&nbsp;View Marks Status</button>
</div>
</div>
      </div>
  <!-- Modal -->
  <div class="modal fade" id="myModalsec<?php echo $i ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#3c8dbc;">
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
     
      <td style="text-align:center"><?php echo $eassec5 ; ?></td>
  <td style="text-align:center"><?php echo $eassec ; ?></td> 
  <td style="text-align:center"><?php echo $eassec5 - $eassec ; ?></td>     
  <td style="text-align:center"><?php echo $eassec6 ; ?></td> 
  <td style="text-align:center"><?php echo $eassec - $eassec6 ; ?></td>
  <td style="text-align:center"><?php echo $eassec6*$row5['correct_marks'] - ($eassec - $eassec6)*$row5['incorrect_marks'] ; ?></td>     
      <?php
	  }
	  
	  if($j == 2)
	  {
	  ?>
    
      <td style="text-align:center"><?php echo $modsec5 ; ?></td>
  <td style="text-align:center"><?php echo $modsec ; ?></td>
 <td style="text-align:center"><?php echo $modsec5 - $modsec ; ?></td>    
 <td style="text-align:center"><?php echo $modsec6 ; ?></td>  <td style="text-align:center"><?php echo $modsec - $modsec6 ; ?></td>     
 <td style="text-align:center"><?php echo $modsec6*$row5['correct_marks'] - ($modsec - $modsec6)*$row5['incorrect_marks'] ; ?></td> 
      <?php
	  }
	  if($j == 3)
	  {
	  ?>
      
      <td style="text-align:center"><?php echo $diffsec5 ; ?></td>
  <td style="text-align:center"><?php echo $diffsec ; ?></td>
 <td style="text-align:center"><?php echo $diffsec5 - $diffsec ; ?></td>    
 <td style="text-align:center"><?php echo $diffsec6 ; ?></td>  <td style="text-align:center"><?php echo $diffsec - $diffsec6 ; ?></td> 
 <td style="text-align:center"><?php echo $diffsec6*$row5['correct_marks'] - ($diffsec - $diffsec6)*$row5['incorrect_marks'] ; ?></td>    
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
    <br />
   
    <table class="table table-striped">
<caption> Sectional Level-wise Analysis</caption>
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
<td style="text-align:center"><?php echo $eassec ; ?></td>
<td style="text-align:center"><?php echo $eassec1 ; ?></td>
<td style="text-align:center"><?php echo $eassec2 ; ?></td>
<td style="text-align:center"><?php echo $eassec3 ; ?></td>
<td style="text-align:center"><?php echo $eassec4 ; ?></td>
<td style="text-align:center"><?php echo $eassec5 - $eassec -$eassec2 -$eassec3 ; ?></td>
</tr>
<tr>
<td style="text-align:center">Moderate</td>
<td style="text-align:center"><?php echo $modsec ; ?></td>
<td style="text-align:center"><?php echo $modsec1 ; ?></td>
<td style="text-align:center"><?php echo $modsec2 ; ?></td>
<td style="text-align:center"><?php echo $modsec3 ; ?></td>
<td style="text-align:center"><?php echo $modsec4 ; ?></td>
<td style="text-align:center"><?php echo $modsec5 - $modsec -$modsec2 -$modsec3 ; ; ?></td>
</tr>
<tr>
<td style="text-align:center">Difficult</td>
<td style="text-align:center"><?php echo $diffsec ; ?></td>
<td style="text-align:center"><?php echo $diffsec1 ; ?></td>
<td style="text-align:center"><?php echo $diffsec2 ; ?></td>
<td style="text-align:center"><?php echo $diffsec3 ; ?></td>
<td style="text-align:center"><?php echo $diffsec4 ; ?></td>
<td style="text-align:center"><?php echo $diffsec5 - $diffsec -$diffsec2 -$diffsec3 ; ?></td>
</tr>
</table>
<div class="row">
<br /><br />
<div class="col-xs-12">
<div class="col-md-4" align="center">
<div class="col-xs-12">
<p style="text-align:center;font-size:20px">Easy Level</p>
</div>
<div class="col-xs-12" id="levelseceasy<?php echo $i ?>">
</div>
</div>
<div class="col-md-4" align="center">
<div class="col-xs-12">
<p style="text-align:center;font-size:20px">Moderate Level</p>
</div>
<div class="col-xs-12" id="levelsecmod<?php echo $i ?>">
</div>
</div>
<div class="col-md-4" align="center">
<div class="col-xs-12">
<p style="text-align:center;font-size:20px">Difficult Level</p>
</div>
<div class="col-xs-12" id="levelsecdiff<?php echo $i ?>">
</div>
</div>
</div>
</div>
<script>
var rl = 110;
	
sectionname1 = [<?php echo $eassec6 ?>,<?php echo $eassec - $eassec6 ?>,<?php echo $eassec5 - $eassec ?>];
// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
	var canvas = d3.select("#levelseceasy<?php echo $i ?>").append("svg")
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
					.text("% Accuracy = " + <?php echo $accueasysec ; ?> + "%")
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
	.text(function(d){ return d3.round((d.data)/(sectionname1[0] + sectionname1[1] +sectionname1[2])*100, 1) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle");
}
</script>
<script>
var rl = 110;
	
sectionname1 = [<?php echo $modsec6 ?>,<?php echo $modsec - $modsec6 ?>,<?php echo $modsec5 - $modsec ?>];
// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
	var canvas = d3.select("#levelsecmod<?php echo $i ?>").append("svg")
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
					.text("% Accuracy = " + <?php echo $accumodsec ; ?> + "%")
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
	.text(function(d){ return d3.round((d.data)/(sectionname1[0] + sectionname1[1] +sectionname1[2])*100, 1) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle");
}
</script>
<script>
var rl = 110;
	
sectionname1 = [<?php echo $diffsec6 ?>,<?php echo $diffsec - $diffsec6 ?>,<?php echo $diffsec5 - $diffsec ?>];
// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
	var canvas = d3.select("#levelsecdiff<?php echo $i ?>").append("svg")
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
					.text("% Accuracy = " + <?php echo $accudiffsec ; ?> + "%")
					.attr("font-size", 12);	
				
																							
	var arc = d3.svg.arc()
				.innerRadius(85)
				.outerRadius(rl);									

	var pie = d3.layout.pie()
				.value(function(d) {return d; });

	var arcs = group.selectAll(".arc")
					.data(pie(sectionname1))
					.enter()
					.append("g")
					.attr("class", "arc")
					.attr("text-anchor","middle");

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
	.text(function(d){ return d3.round((d.data)/(sectionname1[0] + sectionname1[1] +sectionname1[2])*100, 1) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle");
}
</script>
    <?php
}
include("seccomparelevel.php");
?>
</div>
</div>