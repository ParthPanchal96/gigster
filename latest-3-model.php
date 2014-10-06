<?php
include('cfg/cfg.php');
include('cfg/more-functions.php');
include('main-header.php');
//print_r($_GET);
//$projectId=filter_text($_GET['pId']);
//pr($projectId);
//$projectDetails=get_gig_details($projectId);
//$projectbids=get_project_bids($projectId);
//if($projectbids['count']>0)
//{
?>

<link href="<?=$serverpath;?>bssocial/bootstrap-social.css" rel="stylesheet" >
<link href="<?=$serverpath;?>bssocial/assets/css/font-awesome.css" rel="stylesheet">
<link href="<?=$serverpath;?>bssocial/assets/css/docs.css" rel="stylesheet" >
<script src="<?=$serverpath;?>bssocial/assets/js/jquery.js"></script> 
<script src="<?=$serverpath;?>bssocial/assets/js/docs.js"></script>


<link rel="stylesheet" href="<?php echo $serverpath;?>css/layout.css">

<script type="text/javascript">
$( "div.inner" ).addClass( "latestwidth" );
</script>
<?php
$gigId=filter_text($_GET['pId']);
$gigdetails=get_gig_details($gigId);
if($gigdetails)
{
//	include('main-header1.php');
?>

<br/>
<div style="width:200px;">
  <?php if(!isset($_SESSION['uId'])) { ?>
  <section class="content-header" style="width:350px;">
    <h1 style="text-align: left;"><?php echo $gigdetails['prjTitle']; ?></h1>
  </section>
  <br/>
  <div class="row m450" >
    <div class="col-md-12 fullwidth">
      <p><?php echo nl2br($gigdetails['prjdesc']);?></p>
    </div>
  </div>
  <a class="btn btn-block btn-social btn-facebook" target="_parent" href="<?=$serverpath;?>loginwithfacebook"> <i class="fa fa-facebook"></i> Login with Facebook </a> <a class="btn btn-block btn-social btn-twitter" target="_parent" href="<?=$serverpath;?>loginwithtwitter"> <i class="fa fa-twitter"></i> Login with Twitter </a> <a class="btn btn-block btn-social btn-google-plus" target="_parent" href="<?=$serverpath;?>loginwithgoogle"> <i class="fa fa-google-plus"></i> Login with Google </a> <a class="btn btn-block btn-social btn-linkedin" target="_parent" href="<?=$serverpath;?>loginwithtlinkedin"> <i class="fa fa-linkedin"></i> Login with LinkedIn </a> 
<?php } else { ?>
<section class="content-header" style="width:350px;">
  <h1><?php echo $gigdetails['prjTitle']; ?></h1>
</section>
<br/>
<div class="row m450" >
  <div class="col-md-12 fullwidth">
    <p><?php echo nl2br($gigdetails['prjdesc']);?></p>
    <?php if(is_project_awarded($gigId))
	{
		$awarddetails=get_awarded_details($gigId);
		$awardydetails=get_user_Info(encrypt_str($awarddetails['awardedto']));
		$pstatus=get_p_status1($gigId);
		?>
    <?php if($pstatus==2)
	   {
		   ?>
    <p><strong>Selected Candidate: </strong><br/>
      <?php echo $awardydetails['username'];?></p>
    <p><strong>Final Price(<?php echo $currency ; ?>)</strong><br/>
      <?php echo $awarddetails['amount'];?></p>
    <p><strong>Completion Date</strong><br/>
      <?php echo $awarddetails['completiondate'];?></p>
    <p><strong>Status</strong><br/>
      <?php if(encrypt_str($gigdetails['userId'])==$_SESSION['uId'])
		{
			?>
      <select name="projectstatus" id="projectstatus" class="form-control" style="width:250px;" onChange="my_display()">
        <option value="2">Under Progress</option>
        <option value="3">Mark As Complete</option>
      </select>
      <?php 
		}
		?>
    </p>
    <?php
	   }
	   elseif($pstatus==3)
	   {
		   ?>
    <p><strong>Selected Candidate: </strong><br/>
      <?php echo $awardydetails['username'];?></p>
    <p><strong>Final Price(<?php echo $currency ; ?>)</strong><br/>
      <?php echo $awarddetails['amount'];?></p>
    <p><strong>Completion Date</strong><br/>
      <?php echo $awarddetails['completiondate'];?></p>
    <p><strong>Status</strong><br/>
      Completed </p>
    <?php $feedback=get_feedback($gigId,$awardydetails['userId']);
	  if($feedback)
	  {
	  ?>
    <p><strong>Your FeedBack : </strong> <br/>
      <?php echo nl2br($feedback['feedback']);?> </p>
    <p><strong>Rating : </strong> <br/>
      <?php for($i=0;$i<$feedback['rating'];$i++)
		{
			?>
      <i class="fa fa-star " style="color:#ffc103;"></i>
      <?php
		}
		?>
    </p>
    <?php
	  }
	  die();
	   }
	   else
	   {
		   ?>
      <p><strong>Status</strong><br/>
      <?php echo get_p_status($gigId);
		   
	   }
	}
	else
	{?>
    <p><strong>Proposed Price(<?php echo $currency ; ?>)</strong><Br/>
      <?php echo $gigdetails['proposedbudget'];?></p>
    <p><strong>Bid Closing On </strong><Br/>
      <?php echo $gigdetails['bidto'];?></p>
    <?php
	}
	  ?>
  </div>
</div>
<hr class="m450">
<Div id="myContainer" >
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
	if(check_project($gigId)=="yes")
	{
		?>
      <div class="alert alert-info alert-dismissable">This gig is already awarded.</div>
      <?php
	die();
	}
	elseif(check_for_date($gigId)=="false")
	{
		
		?>
      <div class="alert alert-info alert-dismissable">This gig is already closed.</div>
      <?php
	die();
	}
	else
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
          <input type="submit" class="btn btn-primary" style="float:right;margin-bottom: 20px;" value="Submit My Proposal" />
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
  <div class="row m450" >
    <div class="col-md-12">
      <div class="box-header"> </div>
      <div id="myBids" > </div>
    </div>
  </div>
</Div>
<?php } ?>
</div>
<?php /*?><Div id="myContainer1" style="width:400px;" class="mhidden">
  <p class="alert alert-success mhidden" id="israted"></p>
  <form action="<?=$serverpath;?>rateuser" method="post" target="submitframe" id="RateForm">
    <h1>Rate Your Gigster</h1>
    <p><strong>Gigster :</strong><br/>
      <?=$awardydetails['username'];?>
    </p>
    <input type="hidden" name="gigster" id="gigster" value="<?=$awardydetails['userId'];?>" />
    <input type="hidden" name="projectId" id="projectId" value="<?=$gigId;?>" />
    <p><strong>Your Experience</strong></p>
    <textarea name="experience" id="experience" class="form-control" rows="5"></textarea>
    <p><strong>Rate
      <?=$awardydetails['username'];?>
      </strong></p>
    <input type="radio" name="rating" id="rating" value="1">
    1 &nbsp;
    <input type="radio" name="rating" id="rating" value="2">
    2 &nbsp;
    <input type="radio" name="rating" id="rating" value="3">
    3 &nbsp;
    <input type="radio" name="rating" id="rating" value="4">
    4 &nbsp;
    <input type="radio" name="rating" id="rating" value="5">
    5 &nbsp; <br/>
    <div style="float:right;">
      <button type="submit" class="btn btn-primary"><i class="fa fa-star"></i>&nbsp;Rate</button>
    </div>
  </form>
  <br/>
  <br/>
  <br/>
</Div><?php */?>
<?php } ?>
      </div>
<?php     include('main-footer.php'); ?>