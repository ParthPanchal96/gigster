<?php 
$puId=$_GET['userId'];
$pId=$_GET['projectId'];
$puInfo1=get_user_Info($puId);
$puname1=$puInfo1['username'];
$pdetails=get_gig_details($pId);
$puser=$pdetails['userId'];
$puuinfo=get_user_Info(encrypt_str($puser));
$puname=$puuinfo['username'];
$checkProject=check_project($pId);
if($checkProject=="no")
{
$userBid=@db_query("select * from btr_bids where projectId=$pId and bidfrom=".$puInfo1['userId']);
if($userBid['count']>0)
{
	$userBid=$userBid['rows']['0'];
?>

<section class="content-header">
  <h1><i class="fa fa-user"></i>&nbsp; Award Project</h1>
</section>
<div class="box">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title"><?php echo $pdetails['prjTitle'];?></h3>
        </div>
         <div class="alert alert-danger mhidden" id="errormsg"></div>
        <div class="alert alert-success mhidden" id="successmsg"></div> 
        <div class="clearfix"></div>
<form role="form" action="<?=$serverpath;?>sendTerms" method="post" target="submitframe" id="termForm"> 
        <div class="box-body">
              
          <div class="form-group">
            <label >Owner</label>
            <BR/>
            <i class="fa fa-user"></i>&nbsp;<?php echo $puname;?> (<?php echo $puuinfo['fname']." ".$puuinfo['lname']; ?>)
            <input type="hidden" name="projectId" id="projectId" value="<?=$pId;?>" />
            <input type="hidden" name="ownerId" id="ownerId" value="<?=$puuinfo['userId'];?>" />            
            <input type="hidden" name="awardedto" id="awardedto" value="<?=$puInfo1['userId'];?>" />            
            </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Awarded To</label>
            <br/>
            <i class="fa fa-user"></i>&nbsp;<?php echo $puname1;?>(<?php echo $puInfo1['fname']." ".$puInfo1['lname']; ?>) </div>
          <div class="form-group">
            <label for="exampleInputFile">Terms (If Any)</label>
            <textarea name="terms" id="terms" class="form-control" rows="6" ></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Start Date</label>
            <input type="text" name="startdate" id="startdate" class="form-control small"  style="width:300px;"required="required" value="<?=date('y-m-d');?>" readonly />
           
          </div>
           <div class="form-group">
            <label for="exampleInputFile">End Date</label>
            <input type="text" name="enddate" id="enddate" class="form-control small mdates"  style="width:300px;cursor:pointer;" required value="<?=date('y-m-d');?>" readonly />
           
          </div>
          <script type="text/javascript">
											 $('.mdates').datepicker({format:'yy-mm-dd'});
			</script>
           <div class="form-group">
            <label for="exampleInputFile">Final Amount (<?php echo $currency ; ?>)</label>
            <input type="text" name="amount" id="amount" class="form-control small"  style="width:300px;"required="required" value="<?=$userBid['bidprice'];?>" />
           
          </div>
        
        </div>
        <!-- /.box-body -->
        
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Award & Send Terms</button>
        </div>
          </form>
          <div class="box mhidden" id="m_display">
          	<div class="box-footer">
           <a href="<?=$serverpath;?>allgigs" class="btn btn-primary">Return To All Gigs</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<?php
}
}
else{
	?>
    <br/>
	<p class="alert alert-danger">Error, Project Already awarded.</p>
    <br/>	
	<?php
}
?>