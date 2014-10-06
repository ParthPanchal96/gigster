<?php

$muId=filter_text($_GET['cId']);
if($muId)
{
	if(strlen($muId)>3)
	{
	$muserInfo=get_user_Info(($muId));
	}
	else{
		
	$muserInfo=get_user_Info(encrypt_str($muId));
	}
	if($muserInfo);
	{
	?>
	<section class="content-header">
  <h1> <i class="fa fa-user"></i>&nbsp;<?php echo $muserInfo['fname']." ".$muserInfo['lname'];?> (<?=$muserInfo['username'];?>) </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $serverpath;?>dashboard"><i class="fa fa-dashboard"></i> My Account</a></li>
    <li class="active">Gigsters</li>
  </ol>
</section>
<?php include('cfg/more-functions.php'); ?>

  <section class="content">
    <div id="errormsg" class="alert alert-danger mhidden"></div>
    <div class="row"> 
      <!-- left column -->
      <div class="col-md-12 box box-primary"> 
        <!-- general form elements -->
        
          
          <div class="box-body ">
          <div class="col-xs-2">
              <?php if($muserInfo['profileimage'])
				{
					$profileimage="uploads/profileimage/".filter_text($muserInfo['profileimage']);
				}
				else
				{
					$profileimage=filter_text('img/avatar5.png');					
				}
				
				?>
              <img  src="<?php echo $serverpath;?>image.php?image=/<?=$profileimage;?>&width=150&height=175&cropratio=3:4" class="img-responsive">
              <br/>
              </div>
              <div class="col-xs-10">
              <p><h4><?php echo $muserInfo['tagline'];?></h4>
              <div align="right">
              <?php if(!is_invited($uId,$muId))
			  {
				  ?>
              	<a class="btn btn-primary" data-toggle="modal" data-target="#hiringmodel">Hire</a>
                
                <?php
			  }
				?>
              </div>
              <p>
              
            <?php
			echo get_country_name($muserInfo['country']);
			
			 $skillsarray=explode(",",$muserInfo['skills']);
											if(sizeof($skillsarray)>1)
											{
												?>
                                                &nbsp;|&nbsp;
												<?php
												foreach($skillsarray as $skill)
												{ ?>
                                           <a href="#" class="label label-primary"> <?php echo $skill;?></a>
                                           <?php
												}
											}
										   ?>
                                           </p>
                                           <p></p>
                                           <p><?php
										   $mstr=strip_slashes($muserInfo['overview']);
										    echo strip_string($mstr,500);?></p>
              </div>
            

            
          </div>
<br/>
        
      </div>
      
      <div class="col-md-12 box box-primary" id="userProjects"> 
       
      </div>
      <script type="text/javascript">
	  view_user_projects("<?=$serverpath;?>","<?=$muserInfo['userId'];?>");
	  </script>
    </div>
  </section>
			

	<?php
		
	}
}
?><div class="modal fade" id="hiringmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Invite <?php echo $muserInfo['username'];?></h4>
      </div>
      <form action="<?=$serverpath;?>inviteuser.php" method="post" id="inviteForm" target="submitframe" onSubmit="return my_check()" >
		<input type="hidden" name="inviteto" id="inviteto" value="<?=$muserInfo['userId'];?>" />
        <input type="hidden" name="invitefrom" id="invitefrom" value="<?=$uId;?>" />
        <div class="modal-body table-responsive">
          <div id="errormodal" class="alert alert-danger mhidden"></div>
          <div id="successmodal" class="alert alert-success mhidden"></div>
			<p>Select a Gig on which you want to invite <?=$muserInfo['username'];?></p>
         <?php
		 	$userGigs=get_user_gigs($uId);
			if($userGigs['count']>0)
			{
				?>
				<table class="table ">
                <tbody>
                 <tr>
				<?php
				$c=1;
				for($i=0;$i<$userGigs['count'];$i++)
				{
					?>
                   
                    <td>
					<input type="radio" name="invitegig[]" id="invitegig" value="<?=$userGigs['rows'][$i]['prjId'];?>" />&nbsp;<?=$userGigs['rows'][$i]['prjTitle'];?>
                    </td>
                    
					<?php
					if($c%2==0)
					{
						?>
						</tr>
                        <tr>
						<?php
						$c=1;
					}
					else
					{
						$c++;
					}
				}
				?>
                </tbody>
				</table>
				<?php
			}
			else
			{
				?>
				<div class="alert alert-danger">Oops... You haven't posted any gig yet.</div>
                <Div align="right">
                <a href="<?=$serverpath;?>addgig" class="btn btn-primary">Post a new gig</a></Div>
				<?php
			}
		 ?>
		   

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <?php if($userGigs['count']>0)
		  {
			  ?>
          <button type="submit" class="btn btn-primary">Send Invite</button>
          <?php
		  }
		  ?>
        </div>
      </form>
    </div>
  </div>
</div>
