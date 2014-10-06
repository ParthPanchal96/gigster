<?php
 include('cfg/more-functions.php');
 $searchstr = $_POST['topsearch'];
 if(isset($_POST['searchtype']))
 {
	 $searchtype = $_POST['searchtype'];
	 if($searchtype == "gigs")
	 {
		$query = @db_query("SELECT * FROM btr_projects WHERE prjTitle like '%".$searchstr."%' or prjdesc like '%".$searchstr."%' or keywords like '%".$searchstr."%' ORDER BY postedon DESC"); ?>

<div class="box">
  <div class="box-body table-responsive">
    <?php	
 if($query['count']>0)
	{
		if($query)
		{
?>
    <table class="table table-bordered table-striped" id="mydatatable">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th>Proposed Amount (<i class="fa fa-dollar"></i> )</th>
          <th>Bid Closing On</th>
          <th>Skills</th>
        </tr>
      </thead>
      <tbody>
        <?php
	$sno=1;
	for($i=0;$i<$query['count'];$i++)
			{
		$muInfo=get_user_Info(encrypt_str($query['rows'][$i]['userId']));
?>
        <tr>
          <td><?php echo $sno++;?></td>
          <td><a href="<?php echo $serverpath;?>viewGig/<?php echo mera_url_encode($query['rows'][$i]['prjTitle']);?>/<?php echo $query['rows'][$i]['prjId'];?>" data-slidepanel="panel" onclick="view_proposals(<?php echo $serverpath;?>,'<?php echo $query['rows'][$i]['prjId'];?>');"> <?php echo ($query['rows'][$i]['prjTitle']); ?> </a></td>
          <td><?php echo ($query['rows'][$i]['prjdesc']); ?></td>
          <td><?php echo ($query['rows'][$i]['proposedbudget']); ?></td>
          <td><?php echo ($query['rows'][$i]['bidto']); ?></td>
          <td><?php echo $muInfo['skills']; ?></td>
        </tr>
        <?php
	}
	?>
      </tbody>
    </table>
    <script type="text/javascript" >
 $('[data-slidepanel]').slidepanel({
              orientation: 'right',
              mode: 'view'
          });
</script>
    <?php
	
		}
		}
		else
		{
?>
    <br/>
    <div class="alert alert-danger">Sorry , No Result Found.</div>
    <div class="clearfix"></div>
    <?php
}
?>
  </div>
</div>
<?php
	 }
	 elseif($searchtype == "gigsters")
	 {
		$query = @db_query("select u.*,p.* from btr_users as u, btr_userprofile as p where p.userId=u.userId and (u.username like '%".$searchstr."%' or p.skills like '%".$searchstr."%' or p.fname like '%".$searchstr."%' or p.lname like '%".$searchstr."%');");
		
 if($query['count']>0)
	{
		if($query)
		{
?>
<div class="box box-danger" id="loading-example"> <br />
  <br />
  <?php
			
			$sno=1;
			for($i=0;$i<$query['count'];$i++)
			{
?>
  <div class="box-body chat" id="chat-box">
    <?php
		$muInfo=get_user_Info(encrypt_str($query['rows'][$i]['userId']));
		$profileimage=filter_text($muInfo['profileimage']);
		$myimage="";
		if($profileimage)
		{
			$myimage="uploads/profileimage/".$profileimage;
		}
		else
		{
			$myimage="img/avatar5.png";
		}
		if($i%2==0)
		{
			$st="style='background-color:#f8f8f8;'";
		}
		else
		{
			$st="";
		}
?>
    <div class="item mpad" <?php echo $st;?>> <img src="<?=$serverpath;?>image.php?image=/<?=$myimage;?>&width=50&height=50&cropratio=1:1" alt="user image" />
      <p class="message"> <a href="<?=$serverpath;?>viewgigster/<?=urlencode($muInfo['fname']."-".$muInfo['lname']);?>/<?=$muInfo['userId'];?>" class="name"> </a> <a href="<?=$serverpath;?>viewgigster/<?=urlencode($muInfo['fname']."-".$muInfo['lname']);?>/<?=$muInfo['userId'];?>" class="name"> <?php echo $muInfo['fname']." ".$muInfo['lname'];?></a> <a href="<?=$serverpath;?>viewgigster/<?=urlencode($muInfo['fname']."-".$muInfo['lname']);?>/<?=$muInfo['userId'];?>" class="name"> (<i class="fa fa-user" ></i>&nbsp;<?php echo $muInfo['username'];?>)<br/>
        </a> <strong><?php echo $muInfo['tagline'];?></strong> <br/>
        <?php echo stripslashes(strip_string($muInfo['overview'],300));?> <br/>
        <a href="#"><?php echo get_country_name($muInfo['country']);?></a>
        <?php $skillsarray=explode(",",$muInfo['skills']);
											if(sizeof($skillsarray)>1)
											{
		?>
        &nbsp; Skills&nbsp;
        <?php
												foreach($skillsarray as $skill)
												{ 
		?>
        <a href="#" class="label label-primary"> <?php echo $skill;?></a>
        <?php
												}
											}
		?>
      </p>
    </div>
  </div>
  <?php
			}
?>
</div>
<?php		
		}
	}
	else
	{
		?>
<br/>
<div class="alert alert-danger">Sorry , No Result Found.</div>
<div class="clearfix"></div>
<?php
	}
	 }
 }
?>