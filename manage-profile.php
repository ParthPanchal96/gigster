<?php include('cfg/more-functions.php'); ?>
<section class="content-header">
  <h1><i class="fa fa-user"></i>&nbsp; User Profile</h1>
</section>
<form action="<?=$serverpath;?>saveprofile" method="post" enctype="multipart/form-data">
  <section class="content">
    <div id="errormsg" class="alert alert-danger mhidden"></div>
    <div class="row"> 
      <!-- left column -->
      <div class="col-md-6"> 
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Profile Information</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputPassword1">Desired Username <span class="mandatory"> * </span></label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Desired Username" value="<?php echo $userInfo['username'];?>" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="activatemail" name="activatemail" placeholder="Enter email" required value="<?php echo $userInfo['usermail'];?>">
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">First Name</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required value="<?php echo $userInfo['fname'];?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Last Name</label>
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo $userInfo['lname'];?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contact Number</label>
              <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $userInfo['contactno'];?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" required value="<?php echo $userInfo['address'];?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="City" required value="<?php echo $userInfo['city'];?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Postal Code</label>
              <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Postal Code" required value="<?php echo $userInfo['zipcode'];?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Country</label>
              <?php $countries=get_countries();?>
              <select class="form-control" name="country" id="country">
                <?php if($countries['count']>0)
				   {
					   for($i=0;$i<$countries['count'];$i++)
					   {
					   ?>
                <option value="<?=$countries['rows'][$i]['id'];?>" <?php if($userInfo['country']==$countries['rows'][$i]['id']){ ?> selected<?php }?>><?php echo $countries['rows'][$i]['countryname'];?></option>
                <?php
					   }
				   }
				   ?>
              </select>
            </div>
          </div>
        </div>
        <!-- /.box --> 
      </div>
      
      <?php //pr($userInfo);?>
      
      <div class="col-md-6"> 
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Other Information</h3>
          </div>
          <div class="box-body">
            <div class="form-group" align="center">
              <?php if($userInfo['profileimage'])
				{
					$profileimage="uploads/profileimage/".filter_text($userInfo['profileimage']);
				}
				else
				{
					$profileimage=filter_text('img/avatar5.png');					
				}
				
				?>
               <br/>
              <br/>
              <div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"><img src="<?php echo $serverpath;?>image.php?image=/<?=$profileimage;?>&width=200&height=150&cropratio=4:3"></div>
  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><input type="file" name="profileimage" id="profileimage"></span>
    
  </div>
</div>

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tagline</label>
              <input type="text" class="form-control" id="tagline" name="tagline" placeholder="Tagline" value="<?php echo $userInfo['tagline'];?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Overview</label>
              <textarea class="form-control" id="overview" name="overview" rows="5" ><?php echo $userInfo['overview'];?></textarea>
            </div>
            <div class="form-group">
              <label>Keywords </label>
              <link rel="stylesheet" type="text/css" href="<?=$serverpath;?>select2/assets/lib/css/select2.css" />
              <script type="text/javascript" src="<?=$serverpath;?>select2/assets/lib/js/select2.js"></script>
              <input type="hidden" id="skills" name="skills" style="width: 100%;" value="<?php echo $userInfo['skills'];?>" />
              <?php $tags=get_tags();
				$tags=implode(",",$tags);
			  ?>
              <script type="text/javascript">$("#skills").select2({tags:[<?=$tags;?>]});</script> 
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Services</label>
              <textarea class="form-control" id="services" name="services" rows="5" ><?php echo $userInfo['services'];?></textarea>
            </div>
            <div class="form-group" align="right">
              <button type="submit" class="btn btn-primary">Update Profile</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
</aside>
