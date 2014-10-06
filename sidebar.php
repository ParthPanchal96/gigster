<aside class="left-side sidebar-offcanvas" style="position:fixed;"> 
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" >
    <ul class="sidebar-menu">
      <li<?php if(!$pg){?> class="active"<?php }?>> <a href="<?php echo $serverpath;?>dashboard"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
      <li <?php if($pg=="allgigs" || $pg=="gigsdue" || $pg=="mygigs" || $pg=="oldgigs" || $pg=="assignedgigs" || $pg=="gigsters" ){?> class="treeview active"<?php }else{ ?> class="treeview" <?php }?>> <a href="#"> <i class="fa fa-laptop"></i> <span>Gigs</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li <?php if($pg=="allgigs"){?> class="active"<?php }?>><a href="<?php echo $serverpath;?>allgigs"><i class="fa fa-angle-double-right"></i> Gigs Feed</a></li>
    	  <li <?php if($pg=="gigsdue"){?> class="active"<?php }?>><a href="<?php echo $serverpath;?>gigsdue"><i class="fa fa-angle-double-right"></i> Gigs Due</a></li>
          <li <?php if($pg=="mygigs"){?> class="active"<?php }?>><a href="<?php echo $serverpath;?>mygigs"><i class="fa fa-angle-double-right"></i> Assigned By Me</a></li>
          <li <?php if($pg=="assignedgigs"){?> class="active"<?php }?>><a href="<?php echo $serverpath;?>assignedgigs"><i class="fa fa-angle-double-right"></i> Assigned To Me</a></li>
          <li <?php if($pg=="oldgigs"){?> class="active"<?php }?>><a href="<?php echo $serverpath;?>oldgigs"><i class="fa fa-angle-double-right"></i> Gigs Archive</a></li>
              <li <?php if($pg=="gigsters"){?> class="active"<?php }?>><a href="<?php echo $serverpath;?>gigsters"><i class="fa fa-user"></i> Gigsters</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar --> 
</aside>