<?php include('cfg/cfg.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$username=addslashes(filter_text($_POST['username']));
$activatemail=filter_text($_POST['activatemail']);
$password=filter_text($_POST['password']);
$aboutme=filter_text($_POST['aboutme']);
$fname=filter_text($_POST['fname']);
$lname=filter_text($_POST['lname']);
$contactno=filter_text($_POST['contactno']);
$address=filter_text($_POST['address']);
$city=filter_text($_POST['city']);
$zipcode=filter_text($_POST['zipcode']);
$country=filter_text($_POST['country']);
$overview=addslashes(filter_text($_POST['overview']));
$skills=addslashes(filter_text($_POST['skills']));
$tagline=addslashes(filter_text($_POST['tagline']));
$services=addslashes(filter_text($_POST['services']));
$uId=filter_text($_SESSION['uId']);
$userInfo=get_user_Info($uId);
$userId=$userInfo['userId'];

if($username)
{
	$checkQuery="select * from btr_users where username='$username' and userId<>$userId";
	$checkSql=@db_query($checkQuery);
	if($checkSql['count']>0)
	{
		?>
		<script type="text/javascript">
		window.parent.document.getElementById("errormsg").style.display="block";
		window.parent.document.getElementById("errormsg").innerHTML="Error, Username already registered.";
		</script>
		<?php	
		die();
	}
	else
	{
		$updateQuery="update btr_users set username='$username' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	}
}
if($activatemail)
{
	$checkQuery="select * from btr_users where usermail='$activatemail' and userId<>$userId";
	$checkSql=@db_query($checkQuery);
	if($checkSql['count']>0)
	{
		?>
		<script type="text/javascript">
		window.parent.document.getElementById("errormsg").style.display="block";
		window.parent.document.getElementById("errormsg").innerHTML="Error, Email already registered.";
		</script>
		<?php	
		die();
	}
	else
	{
		$updateQuery="update btr_users set usermail='$activatemail' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	}
}
if($password)
{
	$validate=valid_pass($password);
	if($validate != "ok")
	{
		?>
		<script type="text/javascript">
		window.parent.document.getElementById("errormsg").style.display="block";
		window.parent.document.getElementById("errormsg").innerHTML="<?=$validate;?>";
		</script>
		<?php
		die();
	}
	$password=encrypt_str($password);
		$updateQuery="update btr_users set userpass='$password' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($aboutme)
{
		$updateQuery="update btr_userprofile set aboutus='$aboutme' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}

if($fname)
{
		$updateQuery="update btr_userprofile set fname='$fname' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($lname)
{
		$updateQuery="update btr_userprofile set lname='$lname' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($contactno)
{
		$updateQuery="update btr_userprofile set contactno='$contactno' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($address)
{
		$updateQuery="update btr_userprofile set address='$address' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($city)
{
		$updateQuery="update btr_userprofile set city='$city' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($zipcode)
{
		$updateQuery="update btr_userprofile set zipcode='$zipcode' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($country)
{
		$updateQuery="update btr_userprofile set country='$country' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($overview)
{
		$updateQuery="update btr_userprofile set overview='$overview' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($skills)
{
		$updateQuery="update btr_userprofile set skills='$skills' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($skills)
{
		$updateQuery="update btr_userprofile set tagline='$tagline' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
if($skills)
{
		$updateQuery="update btr_userprofile set services='$services' where userId=$userId";
		$updateSql=@db_query($updateQuery);
	
}
$profileimage=$_FILES['profileimage'];

if($profileimage['size']>0)
{
	$ext=get_extension($profileimage['name']);
	if($ext=="jpg" || $ext=="png" || $ext=="gif")
	{
		$newname=$userId."XX".time().".".get_extension($profileimage['name']);;
		$newpath="uploads/profileimage/".$newname;
		$move=move_uploaded_file($profileimage['tmp_name'],$newpath);
		if($move)
		{
			
			$updateQuery="update btr_users set profileimage='$newname' where userId=$userId";
			$updateSql=@db_query($updateQuery);
		}
	}
}
if(sizeof($GLOBALS['debug_sql'])<=0)
{
	add_keywords($skills)
	?>
	<script type="text/javascript">
		window.parent.location="<?=$_SERVER['HTTP_REFERER'];?>";
	</script>
	<?php
}
?>
</body>
</html>