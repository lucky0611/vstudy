<?php
$subarray = array() ;
$subarray1 = array() ;
$datarrays = array() ;
$easylevatt = array() ;
$modlevatt = array();
$difflevatt = array();
$easylevatt1 = array();
$modlevatt1 = array();
$difflevatt1 = array();
$easylevatt2 = array();
$modlevatt2 = array();
$difflevatt2 = array();
?>
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
<div class="row">
<p style="font-size:22px;color:grey;text-align:center">Overall Subject-wise Analysis </p>
</div>

<?php
$sql20 ="SELECT DISTINCT subject_id FROM $table2 WHERE mock_id='$mock_id'";
$result20 = mysqli_query($con,$sql20);
$i = 0 ;
while($row20 = mysqli_fetch_array($result20))
{
	$easylevatt[$i] = 0 ; 
	$modlevatt[$i] = 0 ; 
	$difflevatt[$i] = 0 ;
	$easylevatt1[$i] = 0 ; 
	$modlevatt1[$i] = 0 ; 
	$difflevatt1[$i] = 0 ;
	$easylevatt2[$i] = 0 ; 
	$modlevatt2[$i] = 0 ; 
	$difflevatt2[$i] = 0 ;
	 $subject_id = $row20['subject_id'] ;
	$sql21 = "SELECT * FROM qp_sections WHERE section_id='$subject_id'" ;
	$result21 = mysqli_query($con,$sql21);
	$row21 = mysqli_fetch_array($result21);
	?>
	<p style='text-align:center;font-size:22px;'><?php echo $row21['section_name'] ; ?></p>
    <br /><br />
    <?php
	$subarray1[$i] = $row20['subject_id'] ;
	$subarray[$i] = $row21['section_name'] ;
	$sql22 = "SELECT * FROM $table2 WHERE subject_id ='$subject_id' AND mock_id='$mock_id'";
	$result22 = mysqli_query($con,$sql22);
	$subjecttot = 0;
	$subjectatt = 0 ;
	$subjectcor = 0;
	while($row22 = mysqli_fetch_array($result22))
	{
		if($row22['level_id'] == 1)
	{
		$easylevatt[$i]++ ;
	}
	if($row22['level_id'] == 2)
	{
		$modlevatt[$i]++ ;
	}
	if($row22['level_id'] == 3)
	{
		$difflevatt[$i]++ ;
	}
		$subjecttot ++ ;
		$ques_id = $row22['question_id'] ;
		$sql23 =  "SELECT * FROM $table5 WHERE question_id = '$ques_id' AND mock_id='$mock_id' AND user_id='$user_id'" ;
		$result23 = mysqli_query($con,$sql23);
		if(mysqli_num_rows($result23) == 1)
		{
		
			$row23 = mysqli_fetch_array($result23);
			if($row23['tita'] == 0)
			{
			if($row23['status'] >= 3 && $row23['response'] > 0 )
			{
				if($row22['level_id'] == 1)
	{
		$easylevatt1[$i]++ ;
	}
	if($row22['level_id'] == 2)
	{
		$modlevatt1[$i]++ ;
	}
	if($row22['level_id'] == 3)
	{
		$difflevatt1[$i]++ ;
	}
				if($row22['Correct_choice'] == $row23['response'])
				{
					if($row22['level_id'] == 1)
	{
		$easylevatt2[$i]++ ;
	}
	if($row22['level_id'] == 2)
	{
		$modlevatt2[$i]++ ;
	}
	if($row22['level_id'] == 3)
	{
		$difflevatt2[$i]++ ;
	}
					$subjectcor++ ;
				}
				$subjectatt++ ;
			}
			}
			if($row23['tita'] == 1)
			{
			if($row23['status'] >= 3 && $row23['tita_score'] !== "" )
			{
				if($row22['level_id'] == 1)
	{
		$easylevatt1[$i]++ ;
	}
	if($row22['level_id'] == 2)
	{
		$modlevatt1[$i]++ ;
	}
	if($row22['level_id'] == 3)
	{
		$difflevatt1[$i]++ ;
	}
				if($row22['tita_correct'] == $row23['tita_score'])
				{
					if($row22['level_id'] == 1)
	{
		$easylevatt2[$i]++ ;
	}
	if($row22['level_id'] == 2)
	{
		$modlevatt2[$i]++ ;
	}
	if($row22['level_id'] == 3)
	{
		$difflevatt3[$i]++ ;
	}
					$subjectcor++ ;
				}
				$subjectatt++ ;
			}
			}
		}
	}
	$corsubmarks = $subjectcor*$row5['correct_marks'];
	$incorsubmarks = ($subjectatt - $subjectcor)*$row5['incorrect_marks'];
	$submarks = $corsubmarks -$incorsubmarks ;
?>
<div class="row">
<br />
<div class="col-xs-12">
<table class="table table-striped">
<tr>
      <th style="text-align:center">Total Questions</th>
      <th style="text-align:center">Attempted</th>
      <th style="text-align:center">Unattempted</th>
      <th style="text-align:center">Correct</th>
      <th style="text-align:center">Incorrect</th>
      <th style="text-align:center">Marks obtained</th>
      </tr>
      <tr>
      <td style="text-align:center"><?php echo $subjecttot ; ?></td>
      <td style="text-align:center"><?php echo $subjectatt ; ?></td>
      <td style="text-align:center"><?php echo $subjecttot -$subjectatt ; ?></td>
      <td style="text-align:center"><?php echo $subjectcor ; ?></td>
      <td style="text-align:center"><?php echo $subjectatt - $subjectcor ; ?></td>
      <td style="text-align:center"><?php echo $submarks ; ?></td>
      </tr>
 </table>
 </div>
</div>
<?php

$datarrays[$i][0] = $subjectcor ;
$datarrays[$i][1] =$subjectatt - $subjectcor ;
$datarrays[$i][2] = $subjecttot - $subjectatt ;
$i++ ;
}
?>

<div class="row">
<br />
<p style="text-align:center;font-size:22px;color:grey">Graphical Analysis of Subjects</p>
</div>
<div class="row">
<br /><br />
<div class="col-xs-12"id="oversub">
</div>
</div>
<div class="row">
<p style="text-align:center;font-size:22px;color:grey">SUBJECT WISE ANALYSIS IN TERMS OF DIFFICULTY</p>
</div>

<?php
for($k=0 ;$k<count($subarray);$k++)
{
	if($easylevatt1[$k] == 0)
{
	$accueasysec1 = 0 ;
}
if($easylevatt1[$k] != 0)
{
$accueasysec1 = round(($easylevatt2[$k]/$easylevatt1[$k])*100,2) ;
}
if($modlevatt1[$k] == 0)
{
	$accumodsec1 = 0 ;
}
if($modlevatt1[$k] != 0)
{
$accumodsec1 = round(($modlevatt2[$k]/$modlevatt1[$k])*100,2) ;
}
if($difflevatt1[$k] == 0)
{
	$accudiffsec1 = 0 ;
}
if($difflevatt1[$k] != 0)
{
$accudiffsec1 = round(($difflevatt2[$k]/$difflevatt1[$k])*100,2) ;
}
?>
<div class="row">
<br /><br />
<div class="col-xs-12">
<p style="text-align:center;font-size:20px"><?php echo $subarray[$k] ?></p>
<br />
<table class="table table-striped">
<caption>Level-wise</caption>
<tr>
      <th style="text-align:center">Level</th>
      <th style="text-align:center">Total Questions</th>
      <th style="text-align:center">Attempted</th>
      <th style="text-align:center">Unattempted</th>
      <th style="text-align:center">Correct</th>
      <th style="text-align:center">Incorrect</th>
      <th style="text-align:center">Marks obtained</th>
      </tr>
      <tr>
      <td style="text-align:center">Easy</td>
      <td style="text-align:center"><?php echo $easylevatt[$k] ; ?></td>
      <td style="text-align:center"><?php echo $easylevatt1[$k] ; ?></td>
      <td style="text-align:center"><?php echo  $easylevatt[$k] - $easylevatt1[$k] ; ?></td>
      <td style="text-align:center"><?php echo  $easylevatt2[$k]; ?></td>
      <td style="text-align:center"><?php echo $easylevatt1[$k] - $easylevatt2[$k] ; ?></td>
      <td style="text-align:center"><?php echo $easylevatt2[$k]*$row5['correct_marks'] - ($easylevatt1[$k] - $easylevatt2[$k])*$row5['incorrect_marks'] ; ?></td>
      </tr>
      <tr>
      <td style="text-align:center">Moderate</td>
      <td style="text-align:center"><?php echo $modlevatt[$k] ; ?></td>
      <td style="text-align:center"><?php echo $modlevatt1[$k] ; ?></td>
      <td style="text-align:center"><?php echo $modlevatt[$k] -$modlevatt1[$k] ; ?></td>
      <td style="text-align:center"><?php echo  $modlevatt2[$k] ; ?></td>
      <td style="text-align:center"><?php echo $modlevatt1[$k] -$modlevatt2[$k] ; ?></td>
      <td style="text-align:center"><?php echo $modlevatt2[$k]*$row5['correct_marks'] - ($modlevatt1[$k] - $modlevatt2[$k])*$row5['incorrect_marks'] ; ?></td>
      </tr>
      <tr>
      <td style="text-align:center">Difficult</td>
      <td style="text-align:center"><?php echo $difflevatt[$k] ; ?></td>
      <td style="text-align:center"><?php echo $difflevatt1[$k] ; ?></td>
      <td style="text-align:center"><?php echo $difflevatt[$k] -$difflevatt1[$k] ; ?></td>
      <td style="text-align:center"><?php echo  $difflevatt2[$k] ; ?></td>
      <td style="text-align:center"><?php echo $difflevatt1[$k] -$difflevatt2[$k] ; ?></td>
      <td style="text-align:center"><?php echo $difflevatt2[$k]*$row5['correct_marks'] - ($difflevatt1[$k] - $difflevatt2[$k])*$row5['incorrect_marks'] ; ?></td>
      </tr>
 </table>
 </div>
 </div>
 <div class="row">
 <br />
 <div class="col-md-4">
 <div class="col-xs-12">
  <p style="text-align:center;font-size:18px">Easy Level</p>
  <br />
 </div>
 <div class="col-xs-12" id="subanaeasy<?php echo $k ; ?>">
 </div>
 </div>
 <div class="col-md-4">
 <div class="col-xs-12">
  <p style="text-align:center;font-size:18px">Moderate Level</p>
  <br />
 </div>
 <div class="col-xs-12" id="subanamod<?php echo $k ; ?>">
 </div>
 </div>
 <div class="col-md-4">
 <div class="col-xs-12">
 <p style="text-align:center;font-size:18px">Difficult Level</p>
<br />
 </div>
 <div class="col-xs-12" id="subanadiff<?php echo $k ; ?>">
 </div>
 </div>
 </div>
 <script>
var rl = 110;
	
sectionname1 = [<?php echo $easylevatt2[$k] ?>,<?php echo $easylevatt1[$k] - $easylevatt2[$k] ?>,<?php echo $easylevatt[$k] - $easylevatt1[$k] ?>];
// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
	var canvas = d3.select("#subanaeasy<?php echo $k ?>").append("svg")
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
					.text("% Accuracy = " + <?php echo $accueasysec1; ?> + "%")
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
	.attr("fill","black")
	.style("text-anchor","middle");
}
</script>
<script>
var rl = 110;
	
sectionname1 = [<?php echo $modlevatt2[$k] ?>,<?php echo $modlevatt1[$k] - $modlevatt2[$k] ?>,<?php echo $modlevatt[$k] - $modlevatt1[$k] ?>];;
// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
	var canvas = d3.select("#subanamod<?php echo $k ?>").append("svg")
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
					.text("% Accuracy = " + <?php echo $accumodsec1 ; ?> + "%")
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
	.attr("fill","black")
	.style("text-anchor","middle");
}
</script>
<script>
var rl = 110;
	
sectionname1 = [<?php echo $difflevatt2[$k] ?>,<?php echo $difflevatt1[$k] - $difflevatt2[$k] ?>,<?php echo $difflevatt[$k] - $difflevatt1[$k] ?>];;
// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
	var canvas = d3.select("#subanadiff<?php echo $k ?>").append("svg")
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
					.text("% Accuracy = " + <?php echo $accudiffsec1 ; ?> + "%")
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
	.text(function(d){ return d3.round((d.data)/(sectionname1[0] + sectionname1[1] +sectionname1[2])*100, 2) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle");
}
</script>
<?php
}
?>
<script type="text/javascript">
		 
		  dataArrays = <?php echo json_encode($datarrays) ?>;
		  subname = <?php echo json_encode($subarray) ?>; 
		 </script>
	<script>


	var r = 100;
	
// negative marks
    var c =  <?php echo $row5['correct_marks'] ?>; 
	var j = <?php echo $row5['incorrect_marks'] ?>;

// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
var hei = 180 + parseInt((subname.length-1)/3)*310 + 200
	var canvas = d3.select("#oversub").append("svg")
						.attr("width", 1000)
						.attr("height", hei)
						.attr("id","mysvg")

	var ids = window.innerWidth ;
	r1 = 0.6*0.10*ids ;
var z = 0;
var m = -1;

	for (var i = 0; i <subname.length ; i++) 
	{
		if(dataArrays[i][0] + dataArrays[i][1] !== 0)
		{
			
	accuracy =	d3.round(dataArrays[i][0]/(dataArrays[i][0] + dataArrays[i][1])*100, 2)
		}
		else
		{
			accuracy = 0 ;
		}
		if(i%3 == 0)
		{
			m++
			 z = 0 ;
			 yas = 180 + 310*m ;
		}
     xas = ((15 + z*23)/100)*ids ;
     

    ;
	var group = canvas.append("g")
					.attr("transform","translate(" + xas + "," + yas +")");

	group.append("text")
					.attr("transform", "translate(0,-160)")
					.text(subname[i])
					.attr("font-size", 20)
					.attr("text-anchor","middle");
	group.append("text")
					.attr("transform", "translate(0,-30)")
					.text("% Accuracy = " + accuracy + "%")
					.attr("font-size", 12)
					.attr("text-anchor","middle");

	group.append("text")
					.attr("transform", "translate(0,0)")
					.html("Marks Obtained = " + (c*dataArrays[i][0]-j*dataArrays[i][1]))
					.attr("font-size", 12)
					.attr("text-anchor","middle");	
	group.append("text")
					.attr("transform", "translate(0,35)")
					.text("% Marks = " + d3.round((c*dataArrays[i][0]-j*dataArrays[i][1])/(c*(dataArrays[i][2] + dataArrays[i][0]+ dataArrays[i][1]))*100, 2) + "%")
					.attr("font-size", 12)
					.attr("text-anchor","middle");					
																							
	var arc = d3.svg.arc()
				.innerRadius(r1)
				.outerRadius(r);									

	var pie = d3.layout.pie()
				.value(function(d) {return d; });

	var arcs = group.selectAll(".arc")
					.data(pie(dataArrays[i]))
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

        if(y <= 0){ deg = Math.asin(x/h)*180/Math.PI ; b = (x/h * (r+8)); c = (y/h * (r+8)) } else { deg = -Math.asin(x/h)*180/Math.PI; b = (x/h * (r+12)); c = (y/h * (r+12))}
    return "translate(" + b +  ',' + c
       +  ")rotate(" +deg+")"

	;})
	.text(function(d){return d3.round(((d.data)/(dataArrays[i][0] + dataArrays[i][1] +dataArrays[i][2])*100), 2) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle")
	.style("font-size",13);;

	z++;
}
//var appendid = document.getElementById("appendlist") ;
//var canvas1 = d3.select("#tabs-2").append(appendid)
	</script>
