<section class="content-header">
  <h1> Gigs </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $serverpath;?>dashboard"><i class="fa fa-dashboard"></i> My Account</a></li>
    <li class="active">Gigs</li>
  </ol>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add a gig</h4>
      </div>
      <form action="<?=$serverpath;?>addnewgig" method="post" id="gigForm" target="submitframe" >
        <div class="modal-body">
          <div id="errormodal" class="alert alert-danger mhidden"></div>
          <div id="successmodal" class="alert alert-success mhidden"></div>
          <label>Title <span class="mandatory"> * </span></label>
          <input type="text" required name="gigtitle" id="gigtitle" class="form-control" placeholder="Enter Gig Title" autofocus/>
             <label>Description <span class="mandatory"> * </span></label>
          <textarea name="description" id="description" class="form-control" rows="5"></textarea>
		 <label>Proposed Price( <i class="fa fa-dollar"></i> )<span class="mandatory"> * </span></label>
          <input type="text" required name="price" id="price" class="form-control" placeholder="Proposed Price" onkeydown="return only_numbers(event);"/>   

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Gig</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="box  box-danger ">
                                <div class="box-header">
                                    <h3 class="box-title">
                                    <a href="#" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-plus"></i>&nbsp;Add a Gig</a></h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->

                               <div class="box-body table-responsive no-padding" id="myGigs">
                               </div>
                               <script type="text/javascript">
						//		display_gigs('<?php echo $serverpath;?>');
								</script>

                          