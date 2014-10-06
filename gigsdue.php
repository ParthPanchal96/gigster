<section class="content-header">
  <h1>Gigs Due</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $serverpath;?>dashboard"><i class="fa fa-dashboard"></i> My Account</a></li>
    <li class="active">Due Gigs</li>
  </ol>
</section>

<!-- /.box-header -->

<div class="box-body table-responsive no-padding" id="myGigs"> </div>
<script type="text/javascript">
	display_due_gigs('<?php echo $serverpath;?>');							  
</script>