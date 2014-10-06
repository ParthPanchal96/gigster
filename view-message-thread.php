<br/>
<br/>

<?php
include('cfg/cfg.php');
include('main-header1.php');
$pId=filter_text($_GET['pId']);

?>
<section class="content-header">
  <h1>
   Messages
  </h1>
</section>
<div class="box-body chat" style="width:400px;" id="mchat-box"></div>
<script type="text/javascript">
	view_my_message_thread('<?php echo $serverpath;?>','<?=$pId;?>');
	
</script> 
