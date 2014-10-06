<?php
include('cfg/cfg.php');
$projectId=filter_text($_GET['pId']);
$senderInfo=get_user_Info($_SESSION['uId']);
$projectDetails=get_gig_details($projectId);
$senderId=$senderInfo['userId'];
$msgto=filter_text($_GET['msgto']);
$msgfrom=filter_text($_GET['msgfrom']);
$mtime=filter_text($_GET['mtime']);
?>
   <link rel="stylesheet" type="text/css" href="<?php echo $serverpath;?>custom.css">
<div class="mmessages">
<div align="right">
  <a href="#" onClick="javascript:document.getElementById('msg<?=$mtime;?>').innerHTML=''">
	Hide Messages
    </a>
</div>


     <form role="form" method="post" action="<?php echo $serverpath;?>sendmessage" enctype="multipart/form-data" id="msgForm" target="myframe">
        <div class="box-body">
          <div class="form-group">
            <label for="message">Message</label>
            <input type="hidden" name="projectId" id="projectId" value="<?=$projectId;?>" />
            <input type="hidden" name="msgfrom" id="msgfrom" value="<?php echo $msgfrom;?>" />
			 <input type="hidden" name="msgto" id="msgto" value="<?php echo $msgto;?>" />            
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
  <div id="mchat-box">
  <?php
  $msgto=filter_text($_GET['msgto']);
$msgfrom=filter_text($_GET['msgfrom']);
  ?>
  </div>
  
  </div>
  <iframe class="mhidden" name="myframe" id="myframe"></iframe>