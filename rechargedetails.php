<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RECHARGE DETAILS</title>
<!--jquery links -->

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
<style>
#topheader
{
background-color:#03376a;
border-radius:5px;
height:50px	;
background: linear-gradient(#054888 ,#1472cc);
background: -webkit-linear-gradient(#054888 ,#1472cc);
background: -o-linear-gradient(#054888 ,#1472cc);
background: -moz-linear-gradient(#054888 ,#1472cc);
}
a:link {
	text-decoration:none ;
}
/* mouse over link */
a:visited {
    text-decoration:none ;
}
a:hover {
    text-decoration:none ;
}
#homediv:hover,#profilediv:hover
{
	background-color:#054888 ;
	text-decoration:none;
}
#down:hover
{
	cursor:pointer;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
</style>
<script>
$(document).ready(function() {
 $('#down').click(function(evt) {
    $('#show').css("display","block");
	evt.stopPropagation();
}); 
$(document).click(function() {
    $('#show').css("display","none");
});  
});

function changecol(y)
{
	y.style.backgroundColor = "#1472cc";
	document.getElementById("editprof1").style.color = "white"
}
function changecol1(y)
{
	y.style.backgroundColor = "white"
	document.getElementById("editprof1").style.color = "black"
}
function changecol2(y)
{
	y.style.backgroundColor = "#1472cc";
	document.getElementById("logout1").style.color = "white"
}
function changecol21(y)
{
	y.style.backgroundColor = "white";
	document.getElementById("logout1").style.color = "black"
}

</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
 session_start();
 include("connect.php");
 if(isset($_SESSION['username']) && isset($_SESSION['password']))
{
	date_default_timezone_set("Asia/Kolkata");
	include("sess_var.php") ;
   include("profiletop.php") ;
	 $school = $_SESSION['school_name'] ;
	 $class = $_SESSION['class_name'] ; 
	 $section = $_SESSION['section'] ;
	 $table1 = "mocktest_details_".$school;
	 $table2 = "time_remaining_".$school;
	 $x = 1 ;
$y = 1 ;
	 ?>
	 <div class="wrapper">
	   <?php
	  include("headertop.php");
	  ?>
	  <script>
document.getElementById("redet").className = "active treeview";
</script>
   <div class="content-wrapper" >
   <section class="content" id="contents">
	    <div class="container-fluid">
     <br />
	 <table class="table table-striped">
	
  <?php
$r = 1;
		$sql = "SELECT * FROM recharge_record WHERE user_id = '$user_id'";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			?>
			<tr>
	<th>S.No</th>
<th>Amount</th>
<th>Token Number</th>
<th>Order Id</th>
<th>Recharge Date</th>
	</tr>
<tr>	
			<caption style="text-align:center"><b>Online Recharge</b></caption>
			<br />
			<?php
			while($row = mysqli_fetch_array($result))
			{
				$token_id = $row['token_id'];
			?>
			<td><?php echo $r ; ?></td>
			<?php
			$sql1 = "SELECT * FROM cyber_token WHERE token_id = '$token_id'";
			$result1 = mysqli_query($con,$sql1);
			if(mysqli_num_rows($result1) == 1)
			{
			$row1 = mysqli_fetch_array($result1) ;
			?>
			<td><?php echo "Rs"."  ".$row1['amount'] ; ?></td>
			<td><?php echo $row1['token'] ; ?></td>
			<?php
			}
			else
			{
			
			?>
			<td></td>
			<td></td>
			<?php
			}
			$date= $row['date_recharge'];
			//$dates = strtotime($date);
		$date1 = new DateTime($date);
	$date2 = DATE_FORMAT($date1, 'd M Y h:i:s A');
			?>
			<td><?php echo $row['order_number'] ;?></td>
			<td><?php echo $date2 ;?></td>
			<?php
		}
		?>
		</tr>
		<?php
		}
		
  ?>
  
  </table>
   <br /><br /><br />
	 <table class="table table-striped">
	
  <?php
$r = 1;
		$sql = "SELECT * FROM recharge_record_b2c WHERE user_id = '$user_id'";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			?>
			<tr>
	<th>S.No</th>
<th>Amount</th>
<th>Order Id</th>
<th>Recharge Date</th>
	</tr>
<tr>	

			<caption style="text-align:center"><b>Recharge From Token</b></caption>
			<br />
			<?php
			while($row = mysqli_fetch_array($result))
			{
				$token_id = $row['token_id'];
			?>
			<td><?php echo $r ; ?></td>
			<?php
			
			$date= $row['date_recharge'];
			//$dates = strtotime($date);
		$date1 = new DateTime($date);
	$date2 = DATE_FORMAT($date1, 'd M Y h:i:s A');
			?>
			<td><?php echo $row['amount'] ;?></td>
			<td><?php echo $row['order_number'] ;?></td>
			<td><?php echo $date2 ;?></td>
			<?php
		}
		?>
		 </tr>
		<?php
		}
		
  ?>
 
  </table>
  
         </div>
		 <script>
		 updatewallet();
 function updatewallet()
 {
	 $.ajax({
     type: "POST",
     url: 'updatewallet.php',
     data: {"user_id":"<?php echo $user_id ; ?>"},
     success: function(response){
        // alert(response);
		document.getElementById("wallet").innerHTML = response ;
     }
     });
	 
 }
 setInterval(function(){ 
updatewallet();
}, 7000);
  </script>
		 </section>
		 </div>
		
		 <!-- /wrapper -->
 
 
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
		 <div class="control-sidebar-bg"></div>
 </div>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<?php
}
else
{
	?>
<script type="text/javascript">
document.location = "login.php";
</script>
<?php
}
 ?>
</body>
</html>