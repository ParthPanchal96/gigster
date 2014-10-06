<?php
session_start();
//require_once 'dbcontroller.php';

$serverpath="http://bettr.80startups.com/bettr/";
 
//Google API PHP Library includes
require_once 'php_google_oauth_login/google-api-php-client/src/Google/Client.php';
require_once 'php_google_oauth_login/google-api-php-client/src/Google/Service/Oauth2.php';

// Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
 $client_id = '677311827748-tolentdlpk1lk7pltvc1gneqqv470ef5.apps.googleusercontent.com';
 $client_secret = '-j8ddC9b6XbYteWQqkcgh_GR';
 $redirect_uri = $serverpath."loginwithgoogle";
 $simple_api_key = 'AIzaSyBoaDZY3BnIgjNvHp4NQfDiGrH5T1REOAo';
 
//Create Client Request to access Google API
$client = new Google_Client();
$client->setApplicationName("Login to Gigster");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setDeveloperKey($simple_api_key);

$client->addScope("https://www.googleapis.com/auth/userinfo.email");
$client->setScopes("https://www.googleapis.com/auth/tasks");
$client->setScopes("https://www.googleapis.com/auth/tasks.readonly");

//Send Client Request
$objOAuthService = new Google_Service_Oauth2($client);

//Logout
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
  $client->revokeToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL)); //redirect user back to page
}

//Authenticate code from Google OAuth Flow
//Add Access Token to Session
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
?>
<script type="text/javascript">
	window.location="<?= filter_var($google_redirect_url, FILTER_SANITIZE_URL);?>";
</script>
<?php
}

//Set Access Token to make Request
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
}

//Get User Data from Google Plus
//If New, Insert to Database
if ($client->getAccessToken()) {
  $userData = $objOAuthService->userinfo->get();
  /* if(!empty($userData)) {
	$objDBController = new DBController();
	$existing_member = $objDBController->getUserByOAuthId($userData->id);
	if(empty($existing_member)) {
		$objDBController->insertOAuthUser($userData);
	}
  } */
  $_SESSION['access_token'] = $client->getAccessToken();
} else {
  $authUrl = $client->createAuthUrl();
}
if(isset($authUrl)) //user is not logged in, show login button
{
	?>
<script type="text/javascript">window.location="<?=$authUrl;?>";</script>
<?php
//	echo '<a class="login" href="'.$authUrl.'"><img src="images/google-login-button.png" /></a>';
} 
else{}
?>