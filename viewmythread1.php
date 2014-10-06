<br/><br/>
<?php
include('cfg/cfg.php');

$pId=filter_text($_GET['pId']);
if($pId)
{

	$query="select * from btr_assignment where id=$pId";
	$sql=@db_query($query);
		if($sql['count']>0)
			{
				$gigdetails=get_gig_details($sql['rows'][0]['projectId']);					
				if($gigdetails)
				{
				?>
<section class="content-header">
  <h1>
    <?php 
		  echo $gigdetails['prjTitle']; 
		  
		  ?>
  </h1>
</section>
<div class="row m450" >
  <div class="col-md-12 fullwidth">
    <p><strong>Desription</strong><Br/>
	<?php echo $gigdetails['prjdesc'];?></p>
    <p><strong>Final Amount</strong><Br/>
      <?php echo $sql['rows']['0']['amount'];?></p>
    <p><strong>Proposed Completion Date</strong><Br/>
      <?php echo convert_date($sql['rows']['0']['completiondate']);?></p>

  </div>
</div>
<div class="row m450" >
  <div class="col-md-12 fullwidth">
    <h4><strong>Gig Messages</strong></h4>
    <a href="#" onClick="javascript:document.getElementById('msgForm').style.display='block';document.getElementById('displaylink').style.display='none';document.getElementById('hidelink').style.display='block'" id="displaylink">
	Send a new message
    </a>
     <a href="#" onClick="javascript:document.getElementById('msgForm').style.display='none';document.getElementById('displaylink').style.display='block';document.getElementById('hidelink').style.display='none'" id="hidelink" class="mhidden">
	Hide Form
    </a>

<form role="form" method="post" action="<?php echo $serverpath;?>sendmessage" enctype="multipart/form-data" id="msgForm" target="myframe" class="mhidden">
        <div class="box-body">
          <div class="form-group">
            <label for="message">Message</label>
            <input type="hidden" name="projectId" id="projectId" value="<?=$sql['rows'][0]['projectId'];?>" />
            <input type="hidden" name="msgfrom" id="msgfrom" value="<?php echo $sql['rows'][0]['awardedto'];?>" />
			 <input type="hidden" name="msgto" id="msgto" value="<?php echo $sql['rows'][0]['projectowner'];?>" />            
            <br/>
            <textarea name="message" id="message" class="form-control" rows="5" cols="6"></textarea>
          </div>
          <div class="form-group">
            <label for="message">Attachment(If Any)</label>
            <Br/>
           <input type="file" name="attachedfile" id="attachedfile">
          </div>
        </div>
         <div class="form-group" align="right">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
  </div>
</div>
<div class="row m450" >
  <div class="col-md-12">
    <div class="box-header"> </div>
    <div id="mchat-box" > </div>
    
    
  </div>
 
</div>
<script type="text/javascript" src="<?=$serverpath;?>jscripts.js"></script>
<script type="text/javascript">
view_messages('<?=$serverpath;?>','<?php echo $sql['rows'][0]['projectId'];?>','<?php echo $sql['rows'][0]['projectowner'];?>','<?php echo $sql['rows'][0]['awardedto'];?>')
</script>
				<?php
				}
			}
}
?>
<iframe name="myframe" id="myframe" style="display:none;"></iframe>