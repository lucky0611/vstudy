<!-- Tabs -->
<div class="container-fluid">
<?php
$namesection = array();
$datarray = array(array());
$secname = array();
$sql5 = "SELECT * FROM $table1 WHERE mock_id = '$mock_id'" ;
	$result5 = mysqli_query($con,$sql5);
	$row5 = mysqli_fetch_array($result5);
	
?>
<div class="row " align="center">
<h2 class="demoHeaders " style="text-align:center">Performance Analytics</h2>
<p style="font-size:16px">Mock Name - <span style="color:grey"><?php echo $row5['mock_name']; ?></span></p>
 
</div>
<br />
<script src="d3.min.js" charset="utf-8"></script>

	<ul class="nav nav-pills " style="border: 1px dotted black">
		<li class="active"><a data-toggle = "pill" href="#tabs-1" style="font-size:20px">Overall Analysis</a></li>
      

		<li><a data-toggle = "pill" href="#tabs-2" style="font-size:20px">Sectional Analysis</a></li>
		
     <li><a data-toggle = "pill" href="#tabs-4" style="font-size:20px">Question-wise </a></li>
     <li><a data-toggle = "pill" href="#tabs-3" style="font-size:20px">Level-wise </a></li>
     <li><a data-toggle = "pill" href="#tabs-5" style="font-size:20px">Time-wise </a></li>
     <li><a data-toggle = "pill" href="#tabs-6" style="font-size:20px">Subject-wise </a></li>
      <li><a data-toggle = "pill" href="#tabs-7" style="font-size:20px">Topic-wise </a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle = "dropdown"  href="#" style="font-size:20px">Comparative<span class="caret"></span> </a>
      <ul class="dropdown-menu ">
      <li><a href="#tabs-9" data-toggle = "pill">Overall</a></li>
      <li><a href="#tabs-10" data-toggle = "pill" >Sectional</a></li>
      <li><a href="#tabs-11" data-toggle = "pill" >Question-wise</a></li>
     
      </ul>
      </li> <li><a data-toggle = "pill" href="#tabs-12" style="font-size:20px">Remarks </a></li>
   
	</ul>    
   <div class="col-xs-row"> 
    <div class="tab-content">
	<div id="tabs-1" class="tab-pane fade in active col-xs-12">
    
    <br />
    <?php
	include("overallwise.php") ;
	?>
    </div>
    
	<div id="tabs-2"  class="tab-pane fade col-xs-12">
    <br /><br />
	
    <?php
   include("sectionwise.php") ;
	?>
   </div>
   <div id="tabs-4" class="tab-pane fade col-xs-12">
    <br /><br />
    <?php
	include("questionwise.php") ;
	?>
    </div>
	<div id="tabs-3" class="tab-pane fade">
    <br /><br />
    <?php
	include("levelwise.php") ;
	?>
    </div>
    
    <div id="tabs-5" class="tab-pane fade col-xs-12">
    <br /><br />
    <?php
	include("timewise.php") ;
	?>
    </div>
    <div id="tabs-6" class="tab-pane fade col-xs-12">
    <br /><br />
    <?php
	include("subjectwise.php") ;
	?>
    </div>
     <div id="tabs-7" class="tab-pane fade col-xs-12">
    <br /><br />
    <?php
	include("topicwise.php") ;
	?>
    </div>
    
    <div id="tabs-9" class="tab-pane fade in  col-xs-12">
    <br /><br />
    <?php
	include("compareoverall.php");
	?>
    </div>
    
    <div id="tabs-10" class="tab-pane fade col-xs-12">
    <br /><br />
    <?php
	include("comparesection.php");
	?>
    </div>
    
    <div id="tabs-11" class="tab-pane fade col-xs-12">
    <br /><br />
    <?php
	include("comparequestion.php");
	?>
     </div>
     <div id="tabs-12" class="tab-pane fade col-xs-12">
    <br /><br />
    <?php
	include("remarks.php");
	?>
     </div>
</div>

</div>
</div>

<script type="text/javascript">
		  dataArray = <?php echo json_encode($datarray) ?>;
		 var sectionname = <?php echo json_encode($secname) ?>; 
		 </script>
         
	<script>


	var r = 100;
	
// negative marks
    var c =  <?php echo $row5['correct_marks'] ?>; 
	var j = <?php echo $row5['incorrect_marks'] ?>;

// Section 1

	var color = d3.scale.ordinal()
					.range(["#222d32","orange","#3c8dbc"]);
var hei = 180 + parseInt((sectionname.length - 1)/3)*310 + 200
	var canvas = d3.select("#seccompanal").append("svg")
						.attr("width", 1000)
						.attr("height", hei)
						.attr("id","mysvg")

	var ids = window.innerWidth ;
	r1 = 0.6*0.10*ids ;
var z = 0;
var m = -1;

	for (var i = 0; i <sectionname.length ; i++) 
	{
		if(dataArray[i][0] + dataArray[i][1] !== 0)
		{
			
	accuracy =	d3.round(dataArray[i][0]/(dataArray[i][0] + dataArray[i][1])*100, 2)
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
					.text(sectionname[i])
					.attr("font-size", 20)
					.attr("text-anchor","middle");
	group.append("text")
					.attr("transform", "translate(0,-30)")
					.text("Accuracy = " + accuracy + "%")
					.attr("font-size", 12)
					.attr("text-anchor","middle");

	group.append("text")
					.attr("transform", "translate(0,0)")
					.html("Marks Obtained = " + (c*dataArray[i][0]-j*dataArray[i][1]))
					.attr("font-size", 12)
					.attr("text-anchor","middle");	
	group.append("text")
					.attr("transform", "translate(0,35)")
					.text("% Marks = " + d3.round((c*dataArray[i][0]-j*dataArray[i][1])/(c*(dataArray[i][2] + dataArray[i][0]+ dataArray[i][1]))*100, 2) + "%")
					.attr("font-size", 12)
					.attr("text-anchor","middle");					
																							
	var arc = d3.svg.arc()
				.innerRadius(r1)
				.outerRadius(r);									

	var pie = d3.layout.pie()
				.value(function(d) {return d; });

	var arcs = group.selectAll(".arc")
					.data(pie(dataArray[i]))
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
	.text(function(d){return d3.round(((d.data)/(dataArray[i][0] + dataArray[i][1] +dataArray[i][2])*100), 2) + "%";})
	.attr("fill","black")
	.style("text-anchor","middle")
	.style("font-size",13);;

	z++;
}

//var appendid = document.getElementById("appendlist") ;
//var canvas1 = d3.select("#tabs-2").append(appendid)
	</script>
<script>
$( "#tabs" ).tabs();

// Hover states on the static widgets
$( "#dialog-link, #icons li" ).hover(
	function() {
		$( this ).addClass( "ui-state-hover" );
	},
	function() {
		$( this ).removeClass( "ui-state-hover" );
	}
);
</script>