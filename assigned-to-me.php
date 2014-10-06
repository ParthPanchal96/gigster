<?php
include('cfg/cfg.php');
$mUid=$_SESSION['uId'];
$muInfo=get_user_Info($mUid);
$mUid=filter_text($muInfo['userId']);
$checkQuery="select * from btr_assignment where awardedto=$mUid";
$checkSql=@db_query($checkQuery);
if($checkSql['count']>0)
{
?>

<table class="table table-hover">
  <tr>
    <th>#</th>
    <th>Title</th>
    <th>Owner</th>
    <th>Price (<i class="fa fa-dollar"></i> )</th>
    <th>Due Date</th>
    <th>Status</th>
  </tr>
  <?php
     $sno=1;
     for($i=0;$i<$checkSql['count'];$i++)
       {
		  $muInfo=get_user_Info(encrypt_str($checkSql['rows'][$i]['projectowner']));
		  $prjDetails=get_gig_details($checkSql['rows'][$i]['projectId']);
		  $mId=encrypt_str($checkSql['rows']['0']['id']);
		  $awardedto=$checkSql['rows']['0']['awardedto'];
  ?>
  <tr>
    <td><?php echo $sno++;?></td>
    <td><a href="<?php echo $serverpath;?>viewmyGig/<?php echo mera_url_encode($prjDetails['prjTitle']);?>/<?php echo $checkSql['rows'][$i]['id'];?>" data-slidepanel="panel" onclick="view_proposals(<?php echo $serverpath;?>,'<?php echo $gigs['rows'][$i]['prjId'];?>');"> <?php echo ($prjDetails['prjTitle']); ?> </a></td>
    <td></a><?php echo $muInfo['username']; ?></td>
    <td><?php echo ($checkSql['rows'][$i]['amount']); ?></td>
    <td><?php echo convert_date($checkSql['rows'][$i]['completiondate']); ?></td>
    <td><?php echo get_p_status($prjDetails['prjId']); ?>
    <?php if(get_p_status1($checkSql['rows'][$i]['projectId'])==1)
	{?>
    <a href="<?=$serverpath;?>acceptGig/<?=$mId;?>/<?=encrypt_str($awardedto);?>">&nbsp;Terms and conditions</a>
    <?php
	}
	$havereview=get_project_review($checkSql['rows'][$i]['projectId']);
	if($havereview)
	{
		?>
		&nbsp;
        <a href="#">
		<?php
		for($i=0;$i<$havereview['rating'];$i++)
		{
		?>
		<i class="fa fa-star" style="color:#F90;"></i>
		<?php
		}
		?>
		</a>
		<?php
	}
	?>
    </td>
    
  </tr>
  <?php
	}
  ?>
</table>
<?php
	}
?>
