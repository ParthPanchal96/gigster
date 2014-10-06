<?php
include("cfg/cfg.php");
include('sdk/facebook.php');
include('cfg/more-functions.php');

	$appid 		= "$fbAppId";
	$appsecret  = "$fbAppSecret";
	$facebook   = new Facebook(array(
  		'appId' => $appid,
  		'secret' => $appsecret,
  		'cookie' => TRUE,
	));
	$fbuser = $facebook->getUser();
	if ($fbuser) {
		try {
		    $user_profile = $facebook->api('/me');
		}
		catch (Exception $e) {
			echo $e->getMessage();
			exit();
		}
		$user_fbid	= $fbuser;
		$user_email = $user_profile["email"];
		$user_fnmae = $user_profile["first_name"];
		$user_image = "https://graph.facebook.com/".$user_fbid."/picture?type=large";
		$check_select = mysql_num_rows(mysql_query("SELECT * FROM `fblogin` WHERE email = '$user_email'"));
		
		echo "entered";
	}
	?>