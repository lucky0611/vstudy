<?php
$topicsubarr = array( array());
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
<p style="font-size:22px;color:grey;text-align:center"> Topic-wise Analysis </p>
</div>
<div class="row">
<div class="col-xs-12">
<?php
for($i=0;$i<count($subarray);$i++)
{
$topicarray = array() ;
$topattarr = array();
?>
<br />
<p style="font-size:18px;text-align:center">Subject - <b><?php echo $subarray[$i] ; ?></b></p>
<table class="table table-striped">
<tr>
      <th style="text-align:center">Topic</th>
      <th style="text-align:center">Total Questions</th>
      <th style="text-align:center">Attempted</th>
      <th style="text-align:center">Unattempted</th>
      <th style="text-align:center">Correct</th>
      <th style="text-align:center">Incorrect</th>
      <th style="text-align:center">Marks obtained</th>
      </tr>
      
<?php
$sql30 = "SELECT DISTINCT topic FROM $table2 WHERE mock_id='$mock_id' AND subject_id = '$subarray1[$i]'";
$result30 = mysqli_query($con,$sql30);
$m = 0;
while($row30 = mysqli_fetch_array($result30))
{    $topicarray[$m] = $row30['topic'] ;
	$topic = $row30['topic'] ;
	$topicadd = 0 ;
	$topicatt = 0;
	$topiccor = 0;
	$sql31 = "SELECT * FROM $table2 WHERE topic='$topic' AND mock_id='$mock_id' AND subject_id = '$subarray1[$i]'";
	$result31 = mysqli_query($con,$sql31);
	while($row31 = mysqli_fetch_array($result31))
	{
		$ques_id = $row31['question_id'];
		$sql32 ="SELECT * FROM $table5 WHERE question_id ='$ques_id' AND mock_id='$mock_id' AND user_id='$user_id'";
		$result32 = mysqli_query($con,$sql32);
		if(mysqli_num_rows($result32) == 1)
		{
		$row32 = mysqli_fetch_array($result32);
		if($row32['tita'] == 0)
			{
			if($row32['status'] >= 3 && $row32['response'] > 0 )
			{
					if($row31['Correct_choice'] == $row32['response'])
				{
					$topiccor++ ;
				}
				$topicatt++ ;
			}
			if($row32['tita'] == 1)
			{
			if($row32['status'] >= 3 && $row32['tita_score'] !== "" )
			{
				if($row31['tita_correct'] == $row32['tita_score'])
				{
					$topiccor++ ;
				}
				$topicatt++ ;
			}
			}
			}
		}
		$topicadd++ ;
	}
?> 

      <tr>
      <td style="text-align:center"><b><?php echo $row30['topic'] ; ?></b></td>
      <td style="text-align:center"><?php echo $topicadd ; ?></td>
      <td style="text-align:center"><?php echo $topicatt ; ?></td>
      <td style="text-align:center"><?php echo $topicadd -$topicatt ; ?></td>
      <td style="text-align:center"><?php echo $topiccor ; ?></td>
      <td style="text-align:center"><?php echo $topicatt - $topiccor ; ?></td>
      <td style="text-align:center"><?php echo $topiccor*($row5['correct_marks']) -($topicatt - $topiccor)*$row5['incorrect_marks'] ; ?></td>
      </tr>
      <?php
	  $topattarr[$m][0] = $topiccor;
$topattarr[$m][1] = $topicatt - $topiccor ;
$topattarr[$m][2] = $topicadd -$topicatt ;
$topicsubarr[$i][$m] = $row30['topic'] ;
	  $m++ ;
}

	  ?>
      
 </table>
 
 <br /><br />
 <div class="col-xs-12" id="appendtopic<?php echo $i ; ?>">
 </div>

 <script>
 dataArrays1 = <?php echo json_encode($topattarr) ?>;
  topicname = <?php echo json_encode($topicarray) ?>; 
 var r = 100;
	
// negative marks
    var c =  <?php echo $row5['correct_marks'] ?>; 
	var j = <?php echo $row5['incorrect_marks'] ?>;

// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
var hei = 180 + parseInt((topicname.length - 1)/3)*310 + 200
	var canvas = d3.select("#appendtopic<?php echo $i ; ?>").append("svg")
						.attr("width", 1000)
						.attr("height", hei)
						.attr("id","mysvg")

	var ids = window.innerWidth ;
	r1 = 0.6*0.10*ids ;
var z = 0;
var m = -1;

	for (var i = 0; i <topicname.length ; i++) 
	{
		if(dataArrays1[i][0] + dataArrays1[i][1] !== 0)
		{
			
	accuracy =	d3.round(dataArrays1[i][0]/(dataArrays1[i][0] + dataArrays1[i][1])*100, 2)
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
					.text(topicname[i])
					.attr("font-size", 20)
					.attr("text-anchor","middle");
	group.append("text")
					.attr("transform", "translate(0,-30)")
					.text("% Accuracy = " + accuracy + "%")
					.attr("font-size", 12)
					.attr("text-anchor","middle");

	group.append("text")
					.attr("transform", "translate(0,0)")
					.html("Marks Obtained = " + (c*dataArrays1[i][0]-j*dataArrays1[i][1]))
					.attr("font-size", 12)
					.attr("text-anchor","middle");	
	group.append("text")
					.attr("transform", "translate(0,35)")
					.text("% Marks = " + d3.round((c*dataArrays1[i][0]-j*dataArrays1[i][1])/(c*(dataArrays1[i][2] + dataArrays1[i][0]+ dataArrays1[i][1]))*100, 2) + "%")
					.attr("font-size", 12)
					.attr("text-anchor","middle");					
																							
	var arc = d3.svg.arc()
				.innerRadius(r1)
				.outerRadius(r);									

	var pie = d3.layout.pie()
				.value(function(d) {return d; });

	var arcs = group.selectAll(".arc")
					.data(pie(dataArrays1[i]))
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
	.text(function(d){return d3.round(((d.data)/(dataArrays1[i][0] + dataArrays1[i][1] +dataArrays1[i][2])*100), 2) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle")
	.style("font-size",13);;

	z++;
}
 </script>
 
<?php		

}
?>
</div>
</div>