<?php include('cfg/cfg.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$username=filter_text($_POST['username']);
$activatemail=filter_text($_POST['activatemail']);
$password=filter_text($_POST['password']);
$fname=filter_text($_POST['fname']);
$lname=filter_text($_POST['lname']);
$contactno=filter_text($_POST['contactno']);
$address=filter_text($_POST['address']);
$city=filter_text($_POST['city']);
$zipcode=filter_text($_POST['zipcode']);
$country=filter_text($_POST['country']);
$uId=filter_text($_SESSION['uId']);

$userInfo=get_user_Info($uId);
$userid=$userInfo['userId'];
$profileimage=$_FILES['profileimage'];
if($profileimage['size']>0)
{
$ext=get_extension($profileimage['name']);
$ext=strtolower($ext);
if($ext != "jpg" && $ext != "png" && $ext != "gif")
{
	?>
	<script type="text/javascript">
	window.parent.document.getElementById("errormsg").style.display="block";
	window.parent.document.getElementById("errormsg").innerHTML="Error, Invalid profile image";
	</script>
	<?php
	die();
}
}
if($userInfo)
{
	$userid=filter_text($userInfo['userId']);
	$userId=filter_text($userInfo['userId']);
}
$valid_pass=valid_pass($password);
if($valid_pass != "ok")
{
	?>
	<script type="text/javascript">
	window.parent.document.getElementById("errormsg").innerHTML="<?=$valid_pass;?>";
	window.parent.document.getElementById("errormsg").style.display="block";
	</script>
	<?php
}
$password=encrypt_str($password);
$checkQuery="select * from btr_users where (username='$username' or usermail='$activatemail') and userId<>$userid";
$checkSql=@db_query($checkQuery);
if($checkSql['count']>0)

{
	?>
	<script type="text/javascript">
	window.parent.document.getElementById("errormsg").innerHTML="Error, Username/Email already exists.";
	window.parent.document.getElementById("errormsg").style.display="block";
	</script>
	<?php
die();
}
$checkQuery1="select * from btr_userprofile where contactno='$contactno' and userId<>$userid";
$checkSql1=@db_query($checkQuery1);
if($checkSql1['count']>0)
{
	?>
	<script type="text/javascript">
	window.parent.document.getElementById("errormsg").innerHTML="Error, Contact Number already exists.";
	window.parent.document.getElementById("errormsg").style.display="block";
	</script>
	<?php
die();
}
$updateQuery1="update btr_users set username='$username',usermail='$activatemail',userpass='$password' where userId=$userId";
$updateSql1=@db_query($updateQuery1);
$delQuery1="delete from btr_userprofile where userId=$userId";
$delSql1=@db_query($delQuery1);
$insertQuery="insert into btr_userprofile(userId,fname,lname,address,city,zipcode,country,contactno)";
$insertQuery.="values($userid,'$fname','$lname','$address','$city','$zipcode',$country,'$contactno')";
$insertSql=@db_query($insertQuery);
if($profileimage['size']>0)
{
	$newname=$userid."XX".time().".$ext";
	$newpath="uploads/profileimage/".$newname;
	$move=move_uploaded_file($profileimage['tmp_name'],$newpath);
	if($move)
	$updateQuery1=@db_query("update btr_users set profileimage='$newname' where userId=$userid");
	
}
$updateQuery2=@db_query("update btr_users set isactive='1' where userid=$userId");
if(sizeof($GLOBALS['debug_sql'])<=0)
{
	?>
	<script type="text/javascript">
	window.parent.location="<?php echo $serverpath;?>dashboard";
	</script>
	<?php
}
else
print_r($GLOBALS['debug_sql']);
?>
</body>
</html>