<?php
include('cfg/cfg.php');
$projectId=filter_text($_GET['projectId']);
$projectDetails=get_gig_details($projectId);
$projectbids=get_project_bids($projectId);
if($projectbids['count']>0)
{
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
<div class="box-body" >

      <blockquote class="mbottom">
        <p class="mfont"><?php echo $projectbids['rows'][$i]['bidcontent'];?></p>
        <img src="<?=$serverpath;?>image.php?image=/<?=$buserimage;?>&width=60&height=60" />
        <small>From : <cite title="Source Title"><?php echo get_user_name($projectbids['rows'][$i]['bidfrom']);?></cite></small>
        <small>On : <cite><?php echo gmstrftime("%B %d %Y, %X ",$projectbids['rows'][$i]['bidon']);?></cite></small>
        <?php if(encrypt_str($buinfo['userId'])==$_SESSION['uId'])
		{
			?>
			<strong><small>Quote Price(<?php echo $currency ; ?>) : <cite><?php echo $projectbids['rows'][$i]['bidprice'];?></cite></small></strong>
			<?php
		}
		elseif(encrypt_str($projectDetails['userId'])==$_SESSION['uId'])
		{
			?>
			
			<strong><small>Quote Price(<?php echo $currency ; ?>) : <cite><?php echo $projectbids['rows'][$i]['bidprice'];?></cite></small></strong>
			
			<?php
		}
		?>
     <br/>
         </blockquote>
<br/>
    </div>
    <?php
	}
}
	?>