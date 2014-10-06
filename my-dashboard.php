<section class="content-header">
  <h1> Dashboard </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $serverpath;?>dashboard"><i class="fa fa-dashboard"></i> My Account</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="col-lg-5 connectedSortable">
  <div class="box box-danger" id="loading-example">
    <div class="box-header"> 
      <i class="fa fa-comments-o"></i>
      <h3 class="box-title">Messages</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="row"> </div>
      <!-- /.row - inside box --> 
    </div>
    <!-- /.box-body -->
    <?php 
		$usermessages=get_user_messages($uId);
		
	?>
    <div class="box-body chat" id="chat-box"> 
      <?php
	  
	   for($i=0;$i<$usermessages['count'];$i++)
	  {
		$userImage=get_user_image($usermessages['rows'][$i]['msgfrom']);
		  ?>
      <div class="item"> <img src="<?=$serverpath;?><?=$userImage;?>" alt="user image" class="online"/>
        <p class="message"> <a href="#" class="name"> <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?=get_time($usermessages['rows'][$i]['msgon']);?></small>  <?=get_user_name($usermessages['rows'][$i]['msgfrom']);?></a><?=strip_string($usermessages['rows'][$i]['msgcontent'],50);?></p>
      </div>
     <?php
	  }
	 ?>
    </div>
    <!-- /.chat --> 
    
  </div>
</section>
