<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add a gig</h4>
      </div>
      <?php 
	  if(!$userInfo['usermail'] || !$userInfo['username']) {
	  ?>
      <div class="alert alert-danger"> You need to complete your profile details at least 70% to submit a proposal. </div>
      <?php
		}
	  else
		{

	  ?>
      <form action="<?=$serverpath;?>addnewgig" method="post" id="gigForm"  target="submitframe" >
        <div class="modal-body">
          <div id="errormodal" class="alert alert-danger mhidden"></div>
          <div id="successmodal" class="alert alert-success mhidden"></div>
          <div id="formDiv">
          <label>Title <span class="mandatory"> * </span></label>
          <input type="text" required name="gigtitle" id="gigtitle" class="form-control" placeholder="Enter Gig Title" autofocus/>
          <label>Description <span class="mandatory"> * </span></label>
          <textarea name="description" id="description" class="form-control" rows="5"></textarea>
          <label>Proposed Price (<i class="fa fa-dollar"></i>) / Hour<span class="mandatory"> * </span></label>
          <input type="text" required name="price" id="price" class="form-control" placeholder="Proposed Price" onkeydown="return only_numbers(event);"/>
          
          <div class="form-group">
            <label>End Date</label>
            <div class="input-group" data-date-format="yy-mm-dd">
              <input style="width:560px;cursor:pointer;" type="text"  readonly class="form-control pull-right mdates mfull" id="enddate" name="enddate" value="<?=date('y-m-d');?>" required/>
            </div>
            <script type="text/javascript">
				  $(document).ready(function(){
						  var nowTemp = new Date();
						  var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
						  var checkin = $('.mdates').datepicker({
																	format: 'yy-mm-dd',
																	  onRender: function(date) {
																		return date.valueOf() < now.valueOf() ? 'disabled' : '';
																	  }
																	}).on('changeDate', function(ev) {
																	  if (ev.date.valueOf() > checkout.date.valueOf()) {
																		var newDate = new Date(ev.date)
																		newDate.setDate(newDate.getDate() + 1);
																		checkout.setValue(newDate);
																	  }
																	  checkin.hide();     
																	}).data('datepicker');
				   
																  });
			</script> 
          </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="">Add Gig</button>
		</div>
        </div>
        </div>
      </form>
      <?php 
		}
	  ?>
    </div>
  </div>
</div>