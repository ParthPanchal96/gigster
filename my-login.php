<?php include('cfg/cfg.php'); ?>
<?php include('cfg/more-functions.php'); ?>
<link href="<?=$serverpath;?>bssocial/assets/css/bootstrap.css" rel="stylesheet">
<link href="<?=$serverpath;?>bssocial/assets/css/font-awesome.css" rel="stylesheet">
<link href="<?=$serverpath;?>bssocial/assets/css/docs.css" rel="stylesheet" >
<link href="<?=$serverpath;?>bssocial/bootstrap-social.css" rel="stylesheet" >
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '<?=$fbAppId;?>', // replace your app id here
	channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', 
	status     : true, 
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogin(){
	FB.login(function(response){
		if(response.authResponse){
			getUserInfo();
		}
	}, {scope: 'email,user_likes'});
}
function getUserInfo() {
       FB.api('/me', function(response) {
 
        myuserId=response.id
		fname=response.first_name
		lname=response.last_name
		myemail=response.email
		
 		authorizeUser(myuserId,fname,lname,myemail);
        });
   }
   function authorizeUser(userId,fname,lname,email)
   {
	   
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp7567=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp7567=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp7567.onreadystatechange=function() {
    if (xmlhttp7567.readyState==4 && xmlhttp7567.status==200) {
 	
			mresponse=xmlhttp7567.responseText
			mresponse=mresponse.replace(/\s+/g,'');
			if(mresponse){
				window.parent.location.reload();
			}
			
		
    }
  }
  var m_url="<?=$serverpath;?>facebook-login.php?userId="+escape(userId)+"&fname="+escape(fname)+"&lname="+lname+"&email="+escape(email);

  xmlhttp7567.open("GET",m_url,true);
  xmlhttp7567.send();


   }
</script>
<div style="width:250px; margin:auto;">
<?php  if(isset($_GET['param']))
	  {
		  $_SESSION['param']=$_GET['param']; 
	  }
?>
  <h2>Login / Register</h2>
  <br />
  <a class="btn btn-block btn-social btn-facebook"  onClick="FBLogin()" > <i class="fa fa-facebook"></i> Login with Facebook </a>
  <a class="btn btn-block btn-social btn-twitter" target="_parent" href="<?=$serverpath;?>loginwithtwitter"> <i class="fa fa-twitter"></i> Login with Twitter </a>
  <a class="btn btn-block btn-social btn-google-plus" target="_parent" href="<?=$serverpath;?>loginwithgoogle"> <i class="fa fa-google-plus"></i> Login with Google </a>
  <a class="btn btn-block btn-social btn-linkedin" target="_parent" href="<?=$serverpath;?>loginwithtlinkedin"> <i class="fa fa-linkedin"></i> Login with LinkedIn </a> </div>
<script src="<?=$serverpath;?>bssocial/assets/js/jquery.js"></script> 
<script src="<?=$serverpath;?>bssocial/assets/js/docs.js"></script>