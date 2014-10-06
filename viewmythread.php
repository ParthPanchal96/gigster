<?php
include('cfg/cfg.php');
$userId=$_SESSION['uId'];
$userInfo=get_user_Info($userId);
if(!$userInfo['usermail'] || !$userInfo['username'])
{
	?>

<div class="alert alert-danger"> You need to complete your profile details at least 70% to submit a proposal. </div>
<?php
}
else
{
$gigId=filter_text($_GET['pId']);
$gigdetails=get_gig_details($gigId);
if($gigdetails)
{
//	include('main-header1.php');
	?>
<br/>
<br/>
<section class="content-header">
  <h1>
    <?php 

  echo $gigdetails['prjTitle']; ?>
  </h1>
</section>
<div class="row m450" >
  <div class="col-md-12 fullwidth">
    <p><?php echo $gigdetails['prjdesc'];?></p>
    <p><strong>Proposed Price(<?php echo $currency ; ?>) / Hour</strong><Br/>
      <?php echo $gigdetails['proposedbudget'];?></p>
     
  </div>
</div>
<hr class="m450">
<br/>
<?php
		if(encrypt_str($gigdetails['userId'])!=$_SESSION['uId'])
		{
			$userbid=check_user_bid($gigId,$_SESSION['uId']);
			if($userbid)
			{
				$cl="mhidden";
			}
			else
			{
				$cl="";
			}

		?>
<div class="row m450">
  <div class="col-md-12">
    <?php
	if(is_project_awarded($gigId))
	{
		?>
    <div class="alert alert-info ">This gig is already awarded.</div>
    <?php
	}else
	{
	 if($userbid)
		{
			?>
    <div class="alert alert-info alert-dismissable">You have already submited a proposal on this Gig.</div>
    <div align="right">
      <button type="button" class="btn btn-primary" onclick="javascript:document.getElementById('bidForm').style.display='block';">Update Your Proposal</button>
    </div>
    <?php
			$bidInfo=get_bid_info($gigId,$_SESSION['uId']);
		}
		?>
    <form  class="<?php echo $cl;?>"action="<?php echo $serverpath;?>saveProposal" id="bidForm" method="post" enctype="multipart/form-data" target="submitframe" >
      <input type="hidden" name="projectId" id="projectId" value="<?php echo $gigId;?>" />
      <div class="form-group">
        <label>Please write your proposal</label>
        <br/>
        <textarea id="proposal" name="proposal" rows="5" class="form-control"></textarea>
      </div>
      <div class="form-group" >
        <label>Price(In <?php echo $currency ; ?>)</label>
        <br/>
        <input type="text" id="pprice" name="pprice" class="form-control small-control" onkeydown='return only_numbers(event);' required >
      </div>
      <div class="form-group" >
        <label>Attachment(If Any)</label>
        <br/>
        <input type="file" name="attachedfile" id="attachedfile">
      </div>
      <br/>
      <br/>
      <div class="form-group" style="text-align:right;">
        <input type="submit" class="btn btn-primary" style="float:right;" value="Submit My Proposal" />
      </div>
    </form>
    <?php
	}
	?>
  </div>
</div>
<?php
	}
?>
<br/>
<div class="row m450" >
  <div class="col-md-12">
    <div class="box-header"> </div>
    <div id="myBids" > </div>
  </div>
</div>
<script type="text/javascript">
view_proposals('<?=$serverpath;?>','<?=$gigId;?>');
</script>
<?php

}
}
?>
<iframe name="submitframe" id="submitframe" class="mhidden"></iframe>