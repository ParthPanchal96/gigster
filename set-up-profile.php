<?php 
include('cfg/cfg.php');
if(isset($_SESSION['uId']))
{
	$uId=filter_text($_SESSION['uId']);
	$userInfo=get_user_Info($uId);
	$uId=$userInfo['userId'];
	if(!$userInfo)
	{
			?>
<script type="text/javascript">
	window.location="<?php echo $serverpath;?>";
	</script>
<?php
	die();
	}
}
else
{
	?>
<script type="text/javascript">
	window.location="<?php echo $serverpath;?>";
	</script>
<?php
	die();	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bettr | Set Up Your Profile</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<?php include('main-header.php'); ?>
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header"> <a href="<?php echo $serverpath;?>" class="logo"> <?php echo $sitename;?> </a>
  <?php include('top-navigation1.php');?>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <?php
				 include('sidebar1.php');
			  ?>
  <aside class="right-side">
    <section class="content-header">
      <h1> Set up account profile </h1>
      <p>You need to complete your profile at least 70% in order to activate your <?php echo $sitename;?> account.</p>
    </section>
    <form action="<?=$serverpath;?>updateProfile" method="post" enctype="multipart/form-data">
    <section class="content">
    <div id="errormsg" class="alert alert-danger mhidden"></div>
      <div class="row"> 
        <!-- left column -->
        <div class="col-md-6"> 
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Login Information</h3>
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
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
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
                	<img src="<?php echo $serverpath;?>image.php?image=/<?=$profileimage;?>&width=150&height=175&cropratio=3:4">
                    <br/><br/>
                <div class="fileinput fileinput-new" data-provides="fileinput">
  <span class="btn btn-default btn-file"><span class="fileinput-new"></span><span class="fileinput-exists">Change</span><input type="file" name="profileimage" id="profileimage"></span>
  <span class="fileinput-filename"></span>
  
</div>

                </div>
                <div class="form-group" align="right">
                <button type="submit" class="btn btn-primary">Update Profile</button>
                 <button type="reset" class="btn btn-primary">Reset</button>
                </div>

              </div>
            
          </div>
          <!-- /.box --> 
        </div>
        <div class="col-md-6"> 
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Profile Information</h3>
            </div>
          
           
              <div class="box-body">
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
					   <option value="<?=$countries['rows'][$i]['id'];?>"><?php echo $countries['rows'][$i]['countryname'];?></option>
					   <?php
					   }
				   }
				   ?>
                   </select>
                </div>
              </div>
              <!-- /.box-body -->
            
            
          </div>
          <!-- /.box --> 
        </div>
      </div>
      </form>
    </section>
  </aside>
</div>
<?php include('main-footer.php'); ?>
</body>
</html>