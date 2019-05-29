
<br /><br /><br />
 <p id = "error" style="color:red;text-align:center;position:absolute;top:11%;left:10%"></p>
<div id ="signup" style="position:relative;width:540px;margin:auto;height:460px;">
<form  action= "<?php echo $_SERVER['PHP_SELF'];?>"  method="POST" onsubmit=" return finalsubmit()" style="float:left;width:100%;background-image: url('updates.png');background-repeat: no-repeat;background-size:100% auto;padding-left:30px"> 
<br /><br /><br /><br />

<div style ="float:left;width:50%;padding:10px;padding-left:3%;padding-bottom:0px;" >
<span id="name1" style="color:red;"></span>
<br />

<input type="text" id="name" name="firstname" placeholder="First Name"  onblur="showname()" style="width:80%" value="<?php echo $_SESSION['firstname']; ?>" />&nbsp;<span style="color:red">*&nbsp;&nbsp;<img width="20px" height="20px" id="namepic" src="tick.gif" style="visibility:hidden"/></span>
</div>
<div style ="float:left;width:50%;padding:10px;padding-left:3%;padding-bottom:0px;" >
<span id="lastname1" style="color:red"></span><br />
<input type="text" id="lastname" name="lastname" placeholder="Last Name"  style="width:80%" value="<?php echo $_SESSION['lastname']; ?>" />&nbsp;&nbsp;<img width="20px" height="20px" id="lastnamepic1" src="tick.gif" style="visibility:hidden"/>
</div>
<div style ="float:left;width:50%;padding:10px;padding-left:3%;padding-bottom:0px;" >
<span id="username1" style="color:red;"></span><br />
<input type="text" id="username" placeholder="Username" name="username"  onblur="showusername()" onfocus ="userhint()" style="width:80%" value="<?php echo $_SESSION['username']; ?>" />&nbsp;<img src= "border.png" id ="username3" style="position:absolute;top:33%;left:45%;width:20px;visibility:hidden"></span><span id="username2" style="position:absolute;top:31%;left:46%;width:46%;background-color:#fbd6e4"></span><span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="usernamepic" src="tick.gif" style="visibility:hidden"/>
</div>
<div style ="float:left;width:50%;padding:10px;padding-left:3%;padding-bottom:0px;" >
<span id="email1" style="color:red;"></span><br />
<input type="text" id="email"name="email" placeholder="E-mail"  onblur="showemail()"  style="width:80%" value="<?php echo $_SESSION['email']; ?>"/>&nbsp;<span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="emailpic" src="tick.gif" style="visibility:hidden"/>
</div>
 
<div style ="float:left;width:50%;padding:10px;padding-left:3%;padding-bottom:0px;" >
<span id="phone1" style="color:red;"></span><br />
<input type="text" name="phone" placeholder="Mobile No." id="phone"  onblur="showphone()" style="width:80%" value="<?php echo $_SESSION['phone']; ?>" />
&nbsp;<span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="phonepic" src="tick.gif" style="visibility:hidden"/>
</div>

  <div style ="float:left;width:50%;padding:10px;padding-left:3%;padding-bottom:0px;" >
<span id="password1" style="color:red;"></span><br />
  <input type ="password" name ="password" id="password" placeholder="Password" value="<?php echo $_SESSION['password']; ?>" onblur="showpassword()" onfocus="passwordhint()" style ="width:80%"  />&nbsp;<img src= "border1.png" id ="password3" style="position:absolute;top:63%;right:48%;width:20px;visibility:hidden"></span><span id="password2" style="position:absolute;top:61%;right:49%;width:46%;background-color:#fbd6e4"></span><span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="passwordpic" src="tick.gif" style="visibility:hidden"/><span id="password1" style="color:red" ></span>
  </div>

<div style ="float:left;width:50%;padding:10px;padding-left:3%;padding-bottom:0px" >
<span id="confirm1" style="color:red;"></span><br />
<input type ="password" name ="confirm" id="confirm" placeholder="Confirm Password" value="<?php echo $_SESSION['password']; ?>"  onblur="showconfirm()" style="width:80%" />
&nbsp;<span style="color:red">*</span>&nbsp;&nbsp;<img width="20px" height="20px" id="confirmpic" src="tick.gif" style="visibility:hidden"/>
</div>

<div style =";float:left;width:100%;padding-left:35%;padding-top:10%" >
<input type="submit" class="signup1" value=" UPDATE " name="edit" STYLE=" font-size:16px;padding:10px 35px; color: white;" />
</div>

<br />
<div style="float:right;margin-top:-2%;">
<span style="position:relative;color:red">
* Mandatory fields</span>
</div>
</form>
</div>