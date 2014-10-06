<?php

$gigId=filter_text($_GET['gigId']);
$userId=filter_text($_GET['userId']);
$checkQuery="select * from btr_assignment where md5(md5(md5(md5(id))))='$gigId' and md5(md5(md5(md5(awardedto))))='$userId'";
$checkSql=@db_query($checkQuery);
if($checkSql['count']>0)
{
	$_SESSION['uId']=$userId;
	$puInfo1=get_user_Info($userId);
$puname1=$puInfo1['username'];
$pdetails=get_gig_details($checkSql['rows']['0']['projectId']);
$puser=$pdetails['userId'];
$puuinfo=get_user_Info(encrypt_str($puser));
$puname=$puuinfo['username'];

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
<form role="form" action="<?=$serverpath;?>finalterms" method="post" id="termForm" target="submitframe" > 
        <div class="box-body">
              
          <div class="form-group">
            <label >Owner</label>
            <BR/>
            <i class="fa fa-user"></i>&nbsp;<?php echo $puname;?> (<?php echo $puuinfo['fname']." ".$puuinfo['lname']; ?>)
           	<input type="hidden" name="id" id="id" value="<?=$checkSql['rows']['0']['id'];?>" />
                      
            </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Awarded To</label>
            <br/>
            <i class="fa fa-user"></i>&nbsp;<?php echo $puname1;?>(<?php echo $puInfo1['fname']." ".$puInfo1['lname']; ?>) </div>
          <div class="form-group">
            <label for="exampleInputFile">Terms (If Any)</label>
            <textarea name="terms" id="terms" readonly class="form-control" rows="6" ><?=$checkSql['rows']['0']['terms'];?></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Start & End Date</label> : 
            <?php echo $checkSql['rows']['0']['startdate'];?> to <?php echo $checkSql['rows']['0']['completiondate'];?>
          
          </div>
           <div class="form-group">
            <label for="exampleInputFile">Final Amount (<?php echo $currency ; ?>)</label>
            <input type="text" name="amount" id="amount" class="form-control small"  style="width:300px;"required="required" value="<?php echo $checkSql['rows']['0']['amount'];?>" readonly />
           
          </div>
        
        </div>
        <!-- /.box-body -->
        
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Accept terms</button>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#rModal">Reject</a>          
          
        </div>
          </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="rModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Rejection Reason</h4>
      </div>
      <form action="<?=$serverpath;?>rejectterms" method="post" id="rejectForm" target="submitframe"  >
        <div class="modal-body">
          <div id="errormodal" class="alert alert-danger mhidden"></div>
          <div id="successmodal" class="alert alert-success mhidden"></div>
          <label>Description <span class="mandatory"> * </span></label>
          <textarea name="description" id="description" class="form-control" rows="5"></textarea>
          <input type="hidden" name="touser" id="touser" value="<?=$puuinfo['userId'];?>" />
          <input type="hidden" name="fromuser" id="fromuser" value="<?=$puInfo1['userId'];?>" />
          <input type="hidden" name="projectId" id="projectId" value="<?=$pdetails['prjId'];?>" />                    
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Send Back</button>
        </div>
      </form>
    </div>
  </div>
</div>
	<?php
}
else
{
	?>
	<script type="text/javascript">
	alert("Invalid parameters");
	</script>
	<?php
}
?>