<div class="row">
<div class="col-xs-12">
<p style="text-align:center;font-size:22px;color:grey">Sectional comparision of Attempt% at each level</p>
</div>
</div>
<div class="row">
<br /><br />
<div class="col-xs-12">
<div class="col-md-4" >
<div class="col-xs-12">
<p style="text-align:center;font-size:18px">Easy Level</p>
</div>
<div class="col-xs-12" id="levelcompeasy" style="background-color:white;margin-right:10px">
</div>
</div>
<div class="col-md-4">
<div class="col-xs-12">
<p style="text-align:center;font-size:18px">Moderate Level</p>
</div>
<div class="col-xs-12" id="levelcompmod" style="background-color:white;margin-right:10px">
</div>
</div>
<div class="col-md-4">
<div class="col-xs-12">
<p style="text-align:center;font-size:18px">Difficult Level</p>
</div>
<div class="col-xs-12" id="levelcompdiff" style="background-color:white;margin-right:10px">
</div>
</div>
</div>
</div>
<div class="row">
<br /><br />
</div>
<script>
//Name of sections
sections = <?php echo json_encode($namesection) ?>; 

var TimeArray = <?php echo json_encode($seceasycomp) ; ?> //data in minutes
var no_sec = TimeArray.length;
var width =0.2*window.innerWidth
var height = 500;

var y = d3.scale.linear()
			.domain([0,100]) //
			.range([0,100]);
var color = d3.scale.ordinal()
					.range(["#3c8dbc"]);


var widthScale = d3.scale.linear()
   					.range([0, 1.2*width]);


					
					
					
					
var canvas = d3.select("#levelcompeasy")
	.append("svg")
	.attr("width", "100%")
	.attr("height", height);
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
		.attr("x",width/1.5)
		.attr("y",height/7.5-20)
		.html("x   -    Sections")
		.attr("text-anchor","left")
		.attr("font-size","18px")
		.style("fill","#3c8dbc");
		

canvas.append("text")
		.attr("x",width/1.5)
		.attr("y",height/4-38)
		.html("y   -    Attempt%")
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
	.attr("x", function(d,i){return 50+ i*50;})
	.attr("y", function(d){return (450-y(d)*3);})
	.attr("fill", function(d,i){return color(i);})

bars.append("text")
	.attr("x",function(d,i){return 65+i*50;})
	.attr("y",function(d){return 445-y(d)*3;})
	.attr("text-anchor","middle")
	.text(function(d){return d +"%";})
	.attr("font-size","13px");		

bars.append("text")
	.attr("x",function(d,i){return 65+i*50;})
	.attr("y",function(d){return 465;})
	.attr("text-anchor","middle")
	.text(function(d,i){return sections[i];})
	.attr("font-size","11px");			


canvas.append("g")
		.attr("transform", "translate(30, 450)")
		.call(axis)
		.style("fill","#3c8dbc");
		
</script>
<script>
//Name of sections
sections = <?php echo json_encode($namesection) ?>; 

var TimeArray = <?php echo json_encode($secmodcomp) ; ?> //data in minutes
var no_sec = TimeArray.length;
var width =0.2*window.innerWidth
var height = 500;

var y = d3.scale.linear()
			.domain([0,100]) //
			.range([0,100]);
var color = d3.scale.ordinal()
					.range(["#3c8dbc"]);


var widthScale = d3.scale.linear()
   					.range([0, 1.2*width]);


var canvas = d3.select("#levelcompmod")
	.append("svg")
	.attr("width", "100%")
	.attr("height", height);
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
		.attr("x",width/1.5)
		.attr("y",height/7.5-20)
		.html("x   -    Sections")
		.attr("text-anchor","left")
		.attr("font-size","18px")
		.style("fill","#3c8dbc");
		

canvas.append("text")
		.attr("x",width/1.5)
		.attr("y",height/4-38)
		.html("y   -    Attempt%")
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
	.attr("x", function(d,i){return 50+ i*50;})
	.attr("y", function(d){return (450-y(d)*3);})
	.attr("fill", function(d,i){return color(i);})

bars.append("text")
	.attr("x",function(d,i){return 65+i*50;})
	.attr("y",function(d){return 445-y(d)*3;})
	.attr("text-anchor","middle")
	.text(function(d){return d +"%";})
	.attr("font-size","13px");		

bars.append("text")
	.attr("x",function(d,i){return 65+i*50;})
	.attr("y",function(d){return 465;})
	.attr("text-anchor","middle")
	.text(function(d,i){return sections[i];})
	.attr("font-size","11px");			


canvas.append("g")
		.attr("transform", "translate(30, 450)")
		.call(axis)
		.style("fill","#3c8dbc");
		</script>
        
 <script>
//Name of sections
sections = <?php echo json_encode($namesection) ?>; 

var TimeArray = <?php echo json_encode($secdiffcomp) ; ?> //data in minutes
var no_sec = TimeArray.length;
var width =0.2*window.innerWidth
var height = 500;

var y = d3.scale.linear()
			.domain([0,100]) //
			.range([0,100]);
var color = d3.scale.ordinal()
					.range(["#3c8dbc"]);


var widthScale = d3.scale.linear()
   					.range([0, 1.2*width]);


var canvas = d3.select("#levelcompdiff")
	.append("svg")
	.attr("width", "100%")
	.attr("height", height);

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
		.attr("x",width/1.5)
		.attr("y",height/7.5-20)
		.html("x   -    Sections")
		.attr("text-anchor","left")
		.attr("font-size","18px")
		.style("fill","#3c8dbc");
		

canvas.append("text")
		.attr("x",width/1.5)
		.attr("y",height/4-38)
		.html("y   -    Attempt%")
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
	.attr("x", function(d,i){return 50+ i*50;})
	.attr("y", function(d){return (450-y(d)*3);})
	.attr("fill", function(d,i){return color(i);})

bars.append("text")
	.attr("x",function(d,i){return 65+i*50;})
	.attr("y",function(d){return 445-y(d)*3;})
	.attr("text-anchor","middle")
	.text(function(d){return d +"%";})
	.attr("font-size","13px");		

bars.append("text")
	.attr("x",function(d,i){return 65+i*50;})
	.attr("y",function(d){return 465;})
	.attr("text-anchor","middle")
	.text(function(d,i){return sections[i];})
	.attr("font-size","11px");			


canvas.append("g")
		.attr("transform", "translate(30, 450)")
		.call(axis)
		.style("fill","#3c8dbc");
		
</script>