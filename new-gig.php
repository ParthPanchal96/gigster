<section class="content-header">
  <h1> Add A Gig </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $serverpath;?>dashboard"><i class="fa fa-dashboard"></i> My Account</a></li>
    <li class="active">Add A Gig</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12" >
      <div class="box box-primary">
        <form action="<?php echo $serverpath;?>addnewgig" role="form" method="post" enctype="multipart/form-data" >
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Title <span class="mandatory"> * </span></label>
              <input type="text" required name="gigtitle" id="gigtitle" class="form-control" placeholder="Enter Gig Title" autofocus/>
            </div>
              
           
            
            <div class="form-group">
           
            <label>Description <span class="mandatory"> * </span></label>
              <textarea name="description" id="description" class="form-control" rows="5"></textarea>
            </div>
             <div class="form-group">
            <label>Job Type <span class="mandatory"> * </span></label>&nbsp;
			 &nbsp;
				<input type="radio" name="jobtype" id="jobtype" value="f" checked onstatechange="my_selection();">&nbsp;Fixed Type Job   &nbsp;
            	<input type="radio" name="jobtype" id="jobtype" value="h" onstatechange="my_selection();"  >&nbsp;Hourly Job
                            
            </div>
            <div class="form-group">
              <label>Proposed Price (<i class="fa fa-dollar"></i>)<span class="mandatory"> * </span></label><label id="myylabel"></label>
              <input type="text" required name="price" id="price" class="form-control" placeholder="Proposed Price" onkeydown="return only_numbers(event);"/>
            </div>
            <div class="form-group">
              <label>Keywords </label>
              <link rel="stylesheet" type="text/css" href="<?=$serverpath;?>select2/assets/lib/css/select2.css" />
              <script type="text/javascript" src="<?=$serverpath;?>select2/assets/lib/js/select2.js"></script>
<input type="hidden" id="keywords" name="keywords" style="width: 100%;" value="" />
<?php $tags=get_tags();
$tags=implode(",",$tags);
?>
          <script type="text/javascript">$("#keywords").select2({tags:[<?=$tags;?>]});</script>
            </div>
            <div class="form-group">
              <label>End Date</label>
              <input style="cursor:pointer;" type="text"  readonly class="form-control mdates" id="enddate" name="enddate" value="<?=date('Y-m-d');?>" required/>
            </div>
          </div>
          <!-- /.box-body -->
          
          <div class="box-footer" align="right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>&nbsp;Add Gig</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
