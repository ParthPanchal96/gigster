<?php
include('cfg/cfg.php');

$projectId=filter_text($_GET['projectId']);
$projectDetails=get_gig_details($projectId);
$muInfo=get_user_Info($_SESSION['uId']);
$muser=$muInfo['userId'];
$msgto=filter_text($_GET['msgto']);
$msgfrom=filter_text($_GET['msgfrom']);
if($projectId)
{
	
	$messages=get_project_messages($projectId,$msgto,$msgfrom);
	
	if($messages['count']>0)
	{
		for($t=0;$t<$messages['count'];$t++)
		{
			$msgfrom=$messages['rows'][$t]['msgfrom'];
			$fromInfo=get_user_Info(filter_text(encrypt_str($msgfrom)));
			$fromuserimg=$fromInfo['profileimage'];
			$buserimage="";
			if(!$fromuserimg)
			{
				$buserimage=filter_text('img/avatar5.png');
			}
			else
			{
				$buserimage="uploads/profileimage/".$fromuserimg;
			}
			if($projectDetails['userId']==$msgfrom)
			{
				$cl="style='background-color:#eeeeee;padding:5px;border-radius:10px;-moz-box-shadow: 0px 0px 2px #000000;
-webkit-box-shadow: 0px 0px 2px #000000;
box-shadow: 0px 0px 2px #000000;'";
			}
			else
			{
				$cl="style='background-color:white;padding:5px;border-radius:10px;-moz-box-shadow: 0px 0px 2px #000000;
-webkit-box-shadow: 0px 0px 2px #000000;
box-shadow: 0px 0px 2px #000000;'";
			}
				
			?>

<div class="item" <?php echo $cl;?>>
 <img src="<?php echo $serverpath;?>image.php?image=/<?php echo $buserimage;?>&width=50&height=50&cropratio=1:1" alt="<?php echo get_user_name($msgfrom);?>" class="online"/>
 <br/>
  <p class="message">
  <a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i>&nbsp;
  <?php echo gmstrftime("%B %d %Y, %X %p",$messages['rows'][$t]['msgon']);?></small><br/>
  <?php echo get_user_name($msgfrom);?> </a><br/>
  <?php echo stripslashes(stripslashes($messages['rows'][$t]['msgcontent']));?><br/>
  </p>
</div>
<br/>
<?php
		}
	}
}
?>
