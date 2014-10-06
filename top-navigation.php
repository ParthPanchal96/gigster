<nav class="navbar navbar-static-top" role="navigation" style="z-index:65020;"> 
  <!-- Sidebar toggle button--> 
  <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
  <div class="navbar-right">
    <ul class="nav navbar-nav">
      <li class="messages-menu sidebar" style=" border-bottom:0;"> 
      
        <form  method="post" class="sidebar-form" style="width: 290px;margin-top: 15px; margin-left:0; margin-right:0;height: 20px;border: 0;" action="<?php echo $serverpath;?>search">
          <select class="form-control" name="searchtype" style="float: left;width: 120px;border: 0; border-right:1px solid #ccc;height: 20px;padding: 0px 12px;margin-right: 8px;">
            <option value="">Select</option>
            <option value="gigs">In Gigs</option>
            <option value="gigsters">In Gigsters</option>
          </select>
          <div class="input-group" style="width: 160px;margin-top: -1px;">
            <input type="text" name="topsearch" class="form-control" placeholder="Search" style="height: 20px;padding: 6px 5px;">
            <span class="input-group-btn">
            <button type="submit" name="seach" style="height: 20px;padding: 0px 4px;" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span> </div>
        </form>
      </li>
      <li class="dropdown messages-menu" id="mmessages"> 
        <script type="text/javascript">
			view_m_messages("<?=$serverpath;?>");
		</script> 
      </li>
      <li class="messages-menu"> <a href="<?php echo $serverpath;?>gigsters" ><i class="fa fa-user"></i>&nbsp;&nbsp;Gigsters</a> </li>
      <li class="messages-menu"> <a href="<?php echo $serverpath;?>allgigs" >Gigs</a> </li>
      <li class="messages-menu"> <a href="<?php echo $serverpath;?>addgig" >Add A Gig</a> </li>
      <li class="dropdown messages-menu"> <a href="<?php echo $serverpath;?>profile" >My Account</a> </li>
      <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"></i> <span> <?php echo $userInfo['fname'].' '.$userInfo['lname'];?> <i class="caret"></i></span> </a>
        <ul class="dropdown-menu">
          <?php
		  if($userInfo['profileimage'])
		  {
			  $profileimage="uploads/profileimage/".$userInfo['profileimage'];
		  }
		  else
		  {
			  $profileimage="img/avatar3.png";
		  }
		  ?>
          <li class="user-header bg-light-blue"> <img src="<?=$profileimage;?>" class="img-circle" alt="User Image" />
            <p> <?php echo $userInfo['fname'].' '.$userInfo['lname'];?> <small>Member since <?php echo gmstrftime("%B %Y",$userInfo['joinedon']); ?></small> </p>
          </li>
          <li class="user-footer">
            <div class="pull-left"> <a href="<?php echo $serverpath;?>profile" class="btn btn-default btn-flat">Profile</a> </div>
            <div class="pull-right"> <a href="<?php echo $serverpath;?>logout" class="btn btn-default btn-flat">Sign out</a> </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
