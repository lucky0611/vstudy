<script>
var first_run = true;
  /**
   * Handler for the signin callback triggered after the user selects an account.
   */

   /* function onSignInCallback(resp) {
		 alert(1)
  if(!first_run)
  {
    gapi.client.load('plus', 'v1', apiClientLoaded);
	
	}
	first_run = false ;
  }
  */
  function onSignInCallback(resp){
	  if(resp['status']['signed_in'])
	  {
		  
		  if(resp['status']['method'] == 'PROMPT')
		  {
			  gapi.client.load('plus', 'v1', apiClientLoaded);
		  }
	  }
  }

  /**
   * Sets up an API call after the Google API client loads.
   */
  function apiClientLoaded() {
	   
    gapi.client.plus.people.get({userId: 'me'}).execute(handleEmailResponse);
  }

  /**
   * Response callback for when the API client receives a response.
   *
   * @param resp The API response object with the user email and profile information.
   */
  function handleEmailResponse(resp) {
  
	$.post('googleData.php', {oauth_provider:'google',userData: JSON.stringify(resp)}, function(data,status){ 
	//alert(data)
	if(data == "Login with this email already exist")
	{
		var data1 = {
      message: data +"  !",
      timeout: 5000,
      actionText: 'Undo'
    };
		 snackbarContainer.MaterialSnackbar.showSnackbar(data1);
		 snackbarContainer1.MaterialSnackbar.showSnackbar(data1);
	}
	else
	{
		document.location = "home.php";
	}

	
});
   
  }

  </script>