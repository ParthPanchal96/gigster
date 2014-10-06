<?php
include('cfg/cfg.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="<?php echo $serverpath;?>js/jquery.min.js"></script>
</head>

<body>
<?php
$uId=$_SESSION['uId'];
$userInfo=get_user_Info($uId);
if($userInfo)
{
	$uId=filter_text($userInfo['userId']);
}
$gigtitle=filter_text($_POST['gigtitle']);
$description=filter_text($_POST['description']);
$price=filter_text($_POST['price']);
$keywords=filter_text($_POST['keywords']);
$jobtype=filter_text($_POST['jobtype']);
$startdate=date('y-m-d');
$bidto=filter_text($_POST['enddate']);

if($gigtitle && $price)
{
	$insertQuery="insert into btr_projects(userId,prjTitle,prjdesc,postedon,proposedbudget,bidfrom,bidto,keywords,jobtype)";
	$insertQuery.="values($uId,'$gigtitle','$description',".gmmktime().",$price,'".date('Y-m-d')."','$bidto','$keywords','$jobtype')";	
	$insertSql=@db_query($insertQuery,3);

	?>

    <?php
	if($insertSql)
	{
		add_keywords($keywords)
		?>
		<script type="text/javascript">
			window.parent.location="<?=$serverpath;?>allgigs";
		</script>
		<?php
	}
	else{
		print_r($GLOBALS['debug_sql']);
	}
	
}
?>
</body>
</html>