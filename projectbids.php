<?php
include('cfg/cfg.php');
$projectId=filter_text($_GET['projectId']);
$projectDetails=get_gig_details($projectId);
$projectbids=get_project_bids($projectId);
if($projectbids['count']>0)
{
?>

<div class="box " id="loading-example">
  <div class="box-header"> <i class="fa fa-fa-stack-exchange"></i>
    <h3 class="box-title">Proposals</h3>
  </div>
  <div class="box-body chat"> 
    <script type="text/javascript" src="<?php echo $serverpath;?>jsscripts"></script> 
    <!--Add the css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $serverpath;?>css/jquery.slidepanel.css">
    <?php
	for($i=0;$i<$projectbids['count'];$i++)
	{
		if($i%2==0)
		{
			$class="";
		}
		else
		{
			$class="pull-right";
		}
		$buinfo=get_user_Info(encrypt_str($projectbids['rows'][$i]['bidfrom']));

	   $buserimage=filter_text($buinfo['profileimage']);

		if($buserimage)
		{
			$buserimage="uploads/profileimage/".$buserimage;
		}
		else
		{
			$buserimage=filter_text('img/avatar5.png');	
		}
		
		
?>
    <br/>
    <div class="item" style="border-bottom:dashed 1px black;">
    
	  <?php if( encrypt_str($projectDetails['userId'] ) == $_SESSION['uId']){?>
      <img src="<?php echo $serverpath;?><?php echo $buserimage;?>" alt="<?php echo get_user_name($projectbids['rows'][$i]['bidfrom']);?>" />
      <p class="message"> <a href="#" class="name"> <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>&nbsp;<?php echo gmstrftime("%B %d %Y, %X %p",$projectbids['rows'][$i]['bidon']);?></small> <?php echo get_user_name($projectbids['rows'][$i]['bidfrom']);?> </a> <?php echo stripslashes(stripslashes($projectbids['rows'][$i]['bidcontent']));?><br/>
      <?php } elseif(encrypt_str($buinfo['userId']) == $_SESSION['uId']) { ?>
      <img src="<?php echo $serverpath;?><?php echo $buserimage;?>" alt="<?php echo get_user_name($projectbids['rows'][$i]['bidfrom']);?>" />
      <p class="message"> <a href="#" class="name"> <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>&nbsp;<?php echo gmstrftime("%B %d %Y, %X %p",$projectbids['rows'][$i]['bidon']);?></small> <?php echo get_user_name($projectbids['rows'][$i]['bidfrom']);?> </a> <?php echo stripslashes(stripslashes($projectbids['rows'][$i]['bidcontent']));?><br/>
      <?php } else { ?>
       <img src="<?php echo $serverpath;?><?php echo $buserimage;?>" alt="<?php echo get_user_name($projectbids['rows'][$i]['bidfrom']);?>" />
      <p class="message"> <a href="#" class="name"> <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>&nbsp;<?php echo gmstrftime("%B %d %Y, %X %p",$projectbids['rows'][$i]['bidon']);?></small> <?php echo get_user_name($projectbids['rows'][$i]['bidfrom']);?> </a> <?php //echo stripslashes(stripslashes($projectbids['rows'][$i]['bidcontent']));?><br/>
      
        <?php } if(encrypt_str($buinfo['userId'])==$_SESSION['uId'])
		{
			?>
      
      <h4 class="text-muted pull-left"><i class="fa fa-dollar"></i><?php echo $projectbids['rows'][$i]['bidprice'];?></h4>
      <?php
		}
		elseif(encrypt_str($projectDetails['userId'])==$_SESSION['uId'])
		{
			?>
      <h4 class="text-muted pull-left"><i class="fa fa-dollar"></i><?php echo $projectbids['rows'][$i]['bidprice'];?></h4>
      <?php
		}
		
		?>
      <?php 
   	
   if(encrypt_str($projectDetails['userId'])==$_SESSION['uId'])
		{
			$m_time=rand(0,1000000);
			?>
      <div class="text-muted pull-right mbottom" > <a href="#" onClick="view_message_thread('<?=$serverpath;?>','<?php echo $projectbids['rows'][$i]['projectId'];?>','<?php echo $projectbids['rows'][$i]['bidfrom'];?>','<?php echo $projectDetails['userId'];?>','<?php echo $m_time;?>')"> <i class="fa fa-comments-o" style="font-size:2em;"></i> </a> <br/>
        <br/>
        <?php 
			  if(is_project_awarded($projectbids['rows'][$i]['projectId']))
			  {
				  
			  }else
			  {
			  ?>
        <a href="<?php echo $serverpath;?>awardproject/<?php echo encrypt_str($buinfo['userId']);?>/<?php echo $projectbids['rows'][$i]['projectId'];?>" class="btn btn-primary" >Award</a>
        <?php
			  }
			    if(is_project_awarded_to_user($projectbids['rows'][$i]['projectId'],$buinfo['userId']))
					{
						?>
       					<span style="font-size:2em;"><i class="fa fa-trophy" ></i>&nbsp; Awarded</span>
        <?php
					}
			  ?>
      </div>
      <div class="clearfix"></div>
      <div id="msg<?=$m_time;?>" class="m_display"></div>
      <?php
		}
		else
		{
			$usermessages=check_user_messages($_SESSION['uId'],$projectbids['rows'][$i]['projectId']);
		
			if(($usermessages['count']>0) && ($_SESSION['uId']==encrypt_str($projectbids['rows'][$i]['bidfrom'])))
			{
				$m_time=rand(0,1000000);
				?>
      <div class="text-muted pull-right"> <a href="#" onClick="view_message_thread('<?=$serverpath;?>','<?php echo $projectbids['rows'][$i]['projectId'];?>','<?php echo $projectDetails['userId'];?>','<?php echo $projectbids['rows'][$i]['bidfrom'];?>','<?php echo $m_time;?>')"> <i class="fa fa-comments-o" style="font-size:2em;"></i> </a>
        <div id="msg<?=$m_time;?>" class="m_display"></div>
      </div>
      <?php
			}
		}
		?>
      </p>
    </div>
    <?php
	}
	?>
  </div>
</div>
<?php
}
else
{
	?>
<p class="alert alert-danger alert-dismissable">Sorry, No proposals recieved yet.</p>
<?php
}
	?>
