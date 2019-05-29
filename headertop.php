

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
 <link rel="stylesheet" href="dist/css/AdminLTE.min.css?v=1.05">
 
 <style>
 body {
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
 }
.background
   {
	   background-image: url("loadingback.gif");
	   background-repeat: no-repeat;
	   background-size: 30px 30px ;
	   background-position:left;
   }
</style>
<?php
$model = $_SESSION['model'];
if($model == 0)
 {
	 ?>
	 <script>
	 document.location="logout.php"
	 </script>
	 <?php
 }
?>

 <header class="main-header">
    <!-- Logo -->
    <span class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src ="logo2.png" style="height:45px;width:50px" alt="logo" /><b>vStudy</b></span>
    </span>
    <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
		   
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
              <img src="<?php echo $im ;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $firstname ;?></span>&nbsp;<span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="margin-top:5px;font-size:1.2em"></i>
            </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $im ;?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $firstname ;?>
				  <?php
				  if($_SESSION['demo'] == 1)
				  {
				  ?>
                 <small>Premium Test Taker since <?php echo $time_action ; ?></small>
				 <?php
				  }
				  else
				  {
				  ?>
                 <small id="blink_me" style="font-weight:bolder;color:white">Become our Premium Test taker to explore new and exciting features .</small> 
				 <script>
				 (function blink() { 
  $('#blink_me').fadeOut(500).fadeIn(500, blink); 
})();
				 </script>
				 
				 <?php
				  }
				 ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat"><b>Profile</b></a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat"><b>Sign out</b></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
	  <div align="center" class="navbar-custom-menu">
	  <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
              <i class="fa fa-x fa-credit-card"  style="font-size:1.3em"></i>
			  <?php
			  $saq = "SELECT * FROM user_recharge WHERE user_id='$user_id'";
			  $rey = mysqli_query($con,$saq);
			  $roy = mysqli_fetch_array($rey);
			  ?>
              <span class="label label-success" style="position:relative;top:-10px" ><big >&#8377 <span id="wallet"><?php echo $roy['amount'] ?></span></big></span>
            </a>
			 <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#" style="cursor:default">
                     <div class="pull-left ">
                        <img src="wallet.png" style="height:40px;width:40px" alt="Wallet">
                      </div> 
                      <p style="font-size:20px;">
                        Wallet Amount - <b >&#8377 <span id="wallet1"><?php echo $roy['amount'] ?></span></b>
                      </p>
					  <div class="col-xs-12" id = "walleterror" style="color:#3170A9;width:98%;background-color:#D9EDF7;font-weight:bolder;border:1px dotted #BCE8F1;display:none;border-radius:5px;margin-bottom:10px;margin-top:5px" align="center" ><span ></span></div>
                      
					  <div class="row"  style="margin-top:15px">
					  <div class="col-xs-10" align="center" >
					  
					  <button type="button" onclick="document.location = 'rechargeyourwallet.php'"  class="btn btn-default btn-flat" style="width:80%;outline:none;margin-left:25px" >Recharge Wallet</button>
					
					  </div>
					
					  </div>
					  <div class="row"  style="margin-top:5px">
					  <div class="row" align="center"  >
					  <b style="">OR</b>
					  </div>
					  <div class="col-xs-10" >
					  <div class="col-xs-9">
					  <input id="amountwall" type="text" class="form-control" Placeholder="Recharge Token" style="margin-top:5px;" />
					  </div>
					  <div class="col-xs-3" align="left">
					  <button type="button" class="btn btn-default btn-flat " style="outline:none;margin-top:5px;" onclick="rechargewallet()">Ok</button>
					  </div>
					  </div>
					  <div class="col-xs-2" id="rechargeload" style="height:20px;margin-top:20px">
					  </div>
					  </div>
					  
                    </a>
                  </li>
                  <!-- end message -->
                  
                </ul>
              </li>
            </ul>
			<script>
			$('.dropdown-menu').click(function(e) {
    e.stopPropagation();
});
			</script>
              
</div>
	  <div align="center" class="navbar-custom-menu">
	  <?php
	  if($_SESSION['demo'] == 1)
				  {
				if($wallet_amount == 0)	 
				{
				  ?>
              <p id="blink_me1" style="font-weight:bolder;margin-top:15px;color:white;font-size:14px;margin-right:10px">Click on wallet icon to Recharge</p> 
				 <script>
				 (function blink() { 
  $('#blink_me1').fadeOut(500).fadeIn(500, blink); 
})();
				 </script>
				 <?php
				}
				if(0 < $wallet_amount  && $wallet_amount < 20)	 
				{
				  ?>
              <p id="blink_me1" style="font-weight:bolder;margin-top:15px;color:white;font-size:14px;margin-right:10px">Balance low! Recharge vS wallet</p> 
				 <script>
				 (function blink() { 
  $('#blink_me1').fadeOut(500).fadeIn(500, blink); 
})();
				 </script>
				 <?php
				}
				  }
				  if($_SESSION['demo'] == 0)
				  {
				  ?>
              <p id="blink_me1" style="font-weight:bolder;color:white;margin-top:15px;font-size:14px;margin-right:10px">Recharge your vS wallet</p> 
				 <script>
				 (function blink() { 
  $('#blink_me1').fadeOut(500).fadeIn(500, blink); 
})();
				 </script>
				 <?php
				  }
	  ?>
	  </div>

    </nav>
  </header>
   <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $im ;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $firstname ;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">OPTIONS</li>
        <li id="homs">
          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Home</span>
            
          </a>
    
        </li>
<li id="testinfo">
          <a href="testsched.php?subcourse_id=<?php echo $x ;?>&course_id=<?php echo $y ;?>">
            <i class="fa fa-info-circle"></i> <span>Test Info</span>
            
          </a>
    
        </li>
		<li id="mtest">
          <a href="mocktest.php?subcourse_id=<?php echo $x ;?>&course_id=<?php echo $y ;?>">
            <i class="fa fa-laptop"></i> <span>Mock Tests</span>
            
          </a>
    
        </li>
		<li id="solkeys">
          <a href="answerkey.php?subcourse_id=<?php echo $x ;?>&course_id=<?php echo $y ;?>">
            <i class="fa fa-edit"></i> <span>Key & Solutions</span>
            
          </a>
    
        </li>
		<li id="analtest">
          <a href="testresult.php?subcourse_id=<?php echo $x ;?>&course_id=<?php echo $y ;?>">
            <i class="fa fa-pie-chart"></i> <span>Test Analytics</span>
            
          </a>
    
        </li>
		<li id="libread">
          <a href="readinghall.php">
            <i class="fa fa-book"></i> <span>Reading Library</span>
            
          </a>
    
        </li>
		<li id="markbook">
          <a href="bookmark.php">
            <i class="fa fa-folder"></i> <span>Bookmark Questions</span>
            
          </a>
    
        </li>
		<li id="upgk">
          <a href="gkupdate.php">
            <i class="fa fa-sun-o"></i> <span>G.K Updates</span>
            
          </a>
    
        </li>
		<li id="redet">
          <a href="rechargedetails.php">
            <i class="fa fa-sun-o"></i> <span>Recharge Details</span>
            
          </a>
    
        </li>
         </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script>
   
    function createRequest() {
try {
request = new XMLHttpRequest();
} catch (tryMS) {
try {
request = new ActiveXObject("Msxml2.XMLHTTP");
} catch (otherMS) {
try {
request = new ActiveXObject("Microsoft.XMLHTTP");
} catch (failed) {
request = null;
}
}
}
return request;
}
  function rechargewallet()
{ 
//document.getElementById("username2").style.visibility = "hidden";
 // document.getElementById("username3").style.visibility = "hidden";
    var b = document.getElementById("amountwall").value
	var a = document.getElementById("amountwall").value.length ;
	if(a>0)
	{
	 
		 checkrecharge(b);
		
	 } 
else 
{
document.getElementById("walleterror").innerHTML = "Please Enter Token" ;
document.getElementById("walleterror").style.display = "block"  
setTimeout(function(){ 
document.getElementById("walleterror").style.display ="none";
}, 5000);
}
}
function checkrecharge(b)
{
request2 = createRequest();
if (request2== null) {
alert("Unable to create request");
return;
}
else
{	
document.getElementById("rechargeload").className = "background col-xs-2  " ;
var url= "wallrecharge.php";
var requestData1 = "value=" +
escape(b) + "&user_id=" + <?php echo $user_id ?>;
request2.open("POST",url,true);
request2.onreadystatechange = function displayDetails1() {
	alert(request2.responseText)
if (request2.readyState == 4) {
if (request2.status == 200) {

document.getElementById("walleterror").innerHTML = request2.responseText ;
 document.getElementById("rechargeload").className = "col-xs-2" ;
document.getElementById("walleterror").style.display = "block"  
setTimeout(function(){ 
document.getElementById("walleterror").style.display ="none";
}, 5000); 
		
}
}
}
request2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
request2.send(requestData1);
}
} 
  
logincond();
 function logincond()
 {
	 $.ajax({
     type: "POST",
     url: 'logincondition.php',
     data: {"user_id":"<?php echo $user_id ; ?>"},
     success: function(response){
        // alert(response);
		
     }
     });
	 
 }
 setInterval(function(){ 
logincond();
}, 7000);
  </script>