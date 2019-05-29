		
//var snackbarContainer2 = document.querySelector('#demo-snackbar-example2');		
		function contact(){
			try{
			xhr=new XMLHttpRequest();
			}
			catch(err) {
			xhr=new ActiveXObject('Microsoft.XMLHTTP');
			}
			if(xhr==null)
			{
				var data1 = {
      message: "Ajax is not supported by your browser. Please upgrade to a better browser." +"  !",
      timeout: 5000,
      actionText: 'Undo'
    };
				snackbarContainer2.MaterialSnackbar.showSnackbar(data1);
				
				return;
			}
			xhr.onreadystatechange=function()
			{
				if(xhr.readyState==4 && xhr.status==200)
				{
					var data1 = {
      message: xhr.responseText +"  !",
      timeout: 5000,
      actionText: 'Undo'
    };
					snackbarContainer2.MaterialSnackbar.showSnackbar(data1)
				}
			}
			nam=document.getElementById("cont-name").value;
			if(nam=="" || nam== null)
			{
				var data1 = {
      message: "Please fill in your name" +"  !",
      timeout: 5000,
      actionText: 'Undo'
    };
				snackbarContainer2.MaterialSnackbar.showSnackbar(data1)
				return false;
			}
			sub=document.getElementById("cont-sub").value;
			if(sub=="" || sub== null)
			{
				var data1 = {
      message:'The subject cannot be empty.' +"  !",
      timeout: 5000,
      actionText: 'Undo'
    };
				snackbarContainer2.MaterialSnackbar.showSnackbar(data1)
				return false;
			}
			b=document.getElementById("cont-email").value;			
			var a = b.length ;
			if(a == 0)
			{
				var data1 = {
      message: 'Please fill in your email so that we can get back to you.' +"  !",
      timeout: 5000,
      actionText: 'Undo'
    };
				snackbarContainer2.MaterialSnackbar.showSnackbar(data1)
				return false;	
			}
			if(a!=0)
			{
				var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
				if(!pattern.test(b))
				{
					var data1 = {
      message: 'The email you entered does not belong to any account.' +"  !",
      timeout: 5000,
      actionText: 'Undo'
    };
					snackbarContainer2.MaterialSnackbar.showSnackbar(data1)
					return false;
				}
			}
			
	parameters='name='+encodeURIComponent(nam)+'&email='+encodeURIComponent(b)+'&sub='+encodeURIComponent(sub)+'&msg='+encodeURIComponent(document.getElementById("cont-msg").value);
			xhr.open('POST','email.php',true);
			xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			xhr.send(parameters);
			return false;
		}

