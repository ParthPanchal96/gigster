<?php
include('cfg/cfg.php');
$mUid=$_SESSION['uId'];
$muInfo=get_user_Info($mUid);
$mUid=filter_text($muInfo['userId']);
$checkQuery="select * from btr_projects where bidto<now()";
$gigs=@db_query($checkQuery);
if($gigs['count']>0)
{
?>
<table class="table table-bordered table-striped" id="mydatatable">
<thead>
  <tr>
    <th>#</th>
    <th>Title</th>
     <th>PostedBy</th>
    <th>Amount</th>
    <th>Status</th>
   
  </tr>
  </thead>
  <tbody>
  <?php
	$sno=1;
	for($i=0;$i<$gigs['count'];$i++)
	{
		$muInfo=get_user_Info(encrypt_str($gigs['rows'][$i]['userId']));
		$isawarded=get_project_winner_details($gigs['rows'][$i]['prjId']);
  ?>
  <tr>
    <td><?php echo $sno++;?></td>
    <td>
    <a href="<?php echo $serverpath;?>viewGig/<?php echo mera_url_encode($gigs['rows'][$i]['prjTitle']);?>/<?php echo $gigs['rows'][$i]['prjId'];?>" data-slidepanel="panel" onclick="view_proposals(<?php echo $serverpath;?>,'<?php echo $gigs['rows'][$i]['prjId'];?>');"> <?php echo ($gigs['rows'][$i]['prjTitle']); ?> </a>
    </td>
    <td><?php echo get_user_name($gigs['rows'][$i]['userId']);?></td>
      <td><?php echo $gigs['rows'][$i]['proposedbudget'];?></td>
    <td><?php
	if($gigs['rows'][$i]['status']=="0")
	{
		echo "Gig Closed";
	}
	else
	{
		
		echo get_p_status($gigs['rows'][$i]['prjId']);
	}
	?>
	</td>
  </tr>
  <?php
	}
	?>
    </tbody>
</table>
<?php
	}
?>