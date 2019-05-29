 <br /><br />
<p id="msg" style="text-align:center;color:red"> Your Generated password has been activated.Either use generated password to login or update your password below.</p>
<br /><br />
<div style="width:48%;margin:auto;border:1px solid black;   background-image:url(reset.jpg);background-repeat:no-repeat;background-size:100% auto"><br /><br /><br />
<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method= "POST" style="padding-left:5%;padding-bottom:2%;">
<p >Enter your Username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text"  name="username" style="width:30%" required /></p>
<p >Enter Generated Password &nbsp;&nbsp; <input type="text"  name="sendpass" style="width:30%" required /></p>
<p>Enter New Password &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="password" name="passwords" style="width:30%" required onblur="showpassword()" onfocus="passwordhint()" /><img src= "border.png" id ="password3" style="position:absolute;top:54%;left:57%;width:20px;visibility:hidden"></span><span id="password2" style="position:absolute;top:54.1%;left:58.3%;width:25%;background-color:#fbd6e4"></span>&nbsp;&nbsp;<img width="20px" height="20px" id="passwordpic" src="tick.gif" style="visibility:hidden"/>&nbsp;<span id="password1" style="color:red;font-size:12px"></span></p>
<p>Confirm new Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="confirm" name="confirms" style="width:30%" required onblur="showconfirm()" />&nbsp;&nbsp;<img width="20px" height="20px" id="confirmpic" src="tick.gif" style="visibility:hidden"/>&nbsp;<span id="confirm1" style="color:red;font-size:12px"></span></p>
<p style="text-align:center"><input type="submit" class="login1" value=" Set password" name="submitpass" STYLE=" font-size:12px;padding:10px 35px; color: white;border-radius:10px" /></p>
</form>
</div>