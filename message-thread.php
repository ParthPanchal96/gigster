<?php
include('cfg/cfg.php');
include('cfg/functions.php');
$pId=filter_text($_GET['pId']);
$query="select * from btr_messages where msgId=$pId";
$sql=@db_query($query);
if($sql['count']>0)
{
	$projectId=$sql['rows']['0']['projectId'];	
	$muId=$_SESSION['uId'];
	$muInfo=get_user_Info($muId);

	$muId=$muInfo['userId'];
		$other=get_oponent($pId,$muId);
	$projectMessages="select * from btr_messages where projectId=$projectId and (msgfrom=$muId or msgto=$muId) order by msgId DESC";
	$projectMessages=@db_query($projectMessages);
	if($projectMessages['count']>0)
	{
		?>
        <div class="box-body chat" style="width:400px;" >
<form role="form" method="post" action="<?php echo $serverpath;?>postingmessage" enctype="multipart/form-data" id="msgForm" target="myframe">
        <div class="box-body">
          <div class="form-group">
            <label for="message">Message</label>
            <input type="hidden" name="projectId" id="projectId" value="<?=$projectId;?>" />
            <input type="hidden" name="msgfrom" id="msgfrom" value="<?php echo $muId;?>" />
			 <input type="hidden" name="msgto" id="msgto" value="<?php echo $other;?>" />            
            <br/>
            <textarea name="message" id="message" class="form-control" rows="5" cols="6"></textarea>
          </div>
          <div class="form-group">
            <label for="message">Attachment(If Any)</label>
            <Br/>
           <input type="file" name="attachedfile" id="attachedfile">
          </div>
        </div>
         <div class="form-group" align="right">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      <iframe name="myframe" id="myframe" class="mhidden"></iframe>
</div>
		<div class="box-body chat" style="width:400px;" id="mchat-box"></div>
      
		<?php
		$messages=$projectMessages;
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
			if($t%2==0)
			{
				$cl="style='background-color:#f8f8f8;padding:5px;border-radius:10px;-moz-box-shadow: 0px 0px 2px #000000;
-webkit-box-shadow: 0px 0px 2px #000000;
box-shadow: 0px 0px 2px #000000;'";
			}
			else
			{
				$cl="style='background-color:white;padding:5px;border-radius:10px;-moz-box-shadow: 0px 0px 2px #000000;
-webkit-box-shadow: 0px 0px 2px #000000;
box-shadow: 0px 0px 2px #000000;'";
			}
			$updatemessage=@db_query("update btr_messages set isread='1' where msgId=".$messages['rows'][$t]['msgId']);	
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
	?>

    
	<?php
	}
}
?>