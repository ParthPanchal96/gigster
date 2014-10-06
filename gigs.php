<?php include('cfg/cfg.php'); ?>
<link href="<?php echo $serverpath;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<div style="text-align: center;padding: 20px;">
<h3 style="margin-top: 20px;">All Gigs</h3>
<?php
 $uId=$_SESSION['uId'];
 $userInfo=get_user_Info($uId);
 if($userInfo)
 {
	 $uId=$userInfo['userId'];
 }
 $all=$_GET['all'];
 if(!$all)
 {
	$all='0';
 }
 $gigs=get_all_projects($uId,1);
 if($gigs['count']>0)
 {
	?>
    <div class="box">
     <div class="box-body table-responsive">
	 <table class="table table-bordered table-striped" id="mydatatable">
	  <tr>
		<th>#</th>
		<th>Title</th>
		<th>Proposed Price (<i class="fa fa-dollar"></i> )</th>
		<th>Posted On</th>
	  </tr>
	  <?php
		$sno=1;
		for($i=0;$i<$gigs['count'];$i++)
		{
			$muInfo=get_user_Info(encrypt_str($gigs['rows'][$i]['userId']));
	  ?>
	  <tr>
		<td><?php echo $sno++;?></td>
		<td><?php echo ($gigs['rows'][$i]['prjTitle']); ?> </a></td>
		<td><?php echo ($gigs['rows'][$i]['proposedbudget']); ?></td>
		<td><?php echo convert_time($gigs['rows'][$i]['postedon']); ?></td>
	  </tr>
	  <?php
		}
	  ?>
	</table>
    </div>
    </div>
	<?php
 }
 else
	{
		?>
		<br/>
		<div class="alert alert-danger">Sorry , No gigs right now.</div>
		<div class="clearfix"></div>
		
		<?php
	}
		?>
</div>