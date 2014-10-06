<?php 
include('cfg/cfg.php');
include('cfg/functions.php');
if(isset($_SESSION['uId']))
{
	$uId=filter_text($_SESSION['uId']);
	$userInfo=get_user_Info($uId);
	$uId=$userInfo['userId'];
	if(!$userInfo)
	{
			?>
	<script type="text/javascript">
	window.location="<?php echo $serverpath;?>";
	</script>
	<?php
	die();
	}
	
}
else
{

	if(isset($_GET['pg']))
	{
		$pg=$_GET['pg'];
	if($pg=="accept")
	{
		
	}
	else
	{
		?>
	<script type="text/javascript">
	window.location="<?php echo $serverpath;?>";
	</script>
	<?php
	die();
	}
	}
	else
	{
	?>
	<script type="text/javascript">
	window.location="<?php echo $serverpath;?>";
	</script>
	<?php
	die();	
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gigster | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php include('main-header.php'); ?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo $serverpath;?>" class="logo">
                <img src="<?php echo $serverpath;?>images/logo-small.png" />
            </a>
            <?php include('top-navigation.php');?>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php
			$pg="";
			 if(isset($_GET['pg']))
			 {
			$pg=filter_text($_GET['pg']);
			 }
			 include('sidebar.php');
			 
			  ?>
            <aside class="right-side">
             <?php
			 	
			
			 if(!$pg)
			 {
				 include('my-dashboard.php');
			 }
			 elseif($pg=="allgigs")
			 {
				 include('allgig-feeds.php');
			 }
			  elseif($pg=="gigsdue")
			 {
				 include('gigsdue.php');
			 }
			 elseif($pg=="mygigs")
			 {
				 include('mygig-feeds.php');
			 }
			 elseif($pg=="profile")
			 {
				 include('manage-profile.php');
			 }
			 elseif($pg=="award")
			 {
				 include('award-project.php');
			 }
			  elseif($pg=="accept")
			 {
				 include('accept-gig.php');
			 }
			 elseif($pg=="assignedgigs")
			 {
				 include('assigned-gigs.php');
			 }
			 elseif($pg=="allmessages")
			 {
				 include('all-messages.php');
			 }
			  elseif($pg=="oldgigs")
			 {
				 include('oldgigs.php');
			 }
			  elseif($pg=="newgig")
			 {
				 include('new-gig.php');
			 }
			  elseif($pg=="gigsters")
			 {
				 include('all-gigsters.php');
			 }
			  elseif($pg=="gigster")
			 {
				 include('view-gigster.php');
			 }
			 elseif($pg=="search")
			 {
				 include('recordsearch.php');
			 }
		
			elseif($pg=="logout")
			 {
				 session_destroy();
				 ?>
				 <script type="text/javascript">
				 window.location="<?=$serverpath;?>";
				 </script>
				 <?php
			 }
			 ?>
            </aside>
        </div>
   <?php
   include('add-gig-modal.php'); 
    include('main-footer.php');
    ?>


    </body>
</html>