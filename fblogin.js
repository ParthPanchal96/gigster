function doLogin(){
  FB.getLoginStatus(function(response) {
   if (response.authResponse) {
        testAPI() ;
      } else {
        // cancelled
      }
  });
}