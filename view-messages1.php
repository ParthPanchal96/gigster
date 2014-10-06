<?php
include('cfg/cfg.php');
$projectId=filter_text($_GET['pId']);
$senderInfo=get_user_Info($_SESSION['uId']);
$projectDetails=get_gig_details($projectId);
$senderId=$senderInfo['userId'];
$msgto=filter_text($_GET['msgto']);
$msgfrom=filter_text($_GET['msgfrom']);
?>
  <a href="#" onClick="javascript:document.getElementById('msg<?=$senderId;?>').innerHTML=''">
	Back To Project
    </a>
   <div class="col-md-6">
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
            <div class="fileinput fileinput-new" data-provides="fileinput"> <span class="btn btn-default btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span>
              <input type="file" name="attachedfile" id="attachedfile">
              </span> <span class="fileinput-filename"></span> <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a> </div>
          </div>
        </div>
        <div class="box-footer" style="text-align:right;">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>
<div class="box " id="loading-example">
<div class="box-header"> <i class="fa fa-fa-stack-exchange"></i>
  <h3 class="box-title">Messages</h3>
</div>
<div class="box-body chat" id="chat-box">

</div>

</div>
<iframe name="myframe" id="myframe" class="mhidden"></iframe>