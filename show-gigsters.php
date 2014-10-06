<?php
include('cfg/cfg.php');
include('cfg/functions.php');
include('cfg/more-functions.php');
$gigsters=get_all_gigsters();
if($gigsters['count']>0)
{
	?>
	<br/><br/>
	<?php
	$sno=1;
	for($i=0;$i<$gigsters['count'];$i++)
	{
		$muInfo=get_user_Info(encrypt_str($gigsters['rows'][$i]['userId']));
		$profileimage=filter_text($muInfo['profileimage']);
		$myimage="";
		if($profileimage)
		{
			$myimage="uploads/profileimage/".$profileimage;
		}
		else
		{
			$myimage="img/avatar5.png";
		}
		if($i%2==0)
		{
			$st="style='background-color:#f8f8f8;'";
		}
		else
		{
			$st="";
		}
  ?>
	<div class="item mpad" <?php echo $st;?>>
<img src="<?=$serverpath;?>image.php?image=/<?=$myimage;?>&width=50&height=50&cropratio=1:1" alt="user image" />
                                        <p class="message">
                                            <a href="<?=$serverpath;?>viewgigster/<?=urlencode($muInfo['fname']."-".$muInfo['lname']);?>/<?=$muInfo['userId'];?>" class="name">
                                                <small class="text-muted pull-right">
                                                <?php $userrating=get_user_rating($muInfo['userId']);
												if($userrating>0)
												{
													for($t=0;$t<$userrating;$t++)
													{
												?>
                                                <i class="fa fa-star" style="color:#F90;"></i>
                                            	
                                            <?php
													}
													for($t=$userrating;$t<5;$t++)
													{
												?>
                                                <i class="fa fa-star" ></i>
                                            	
                                            <?php
													}
												}
												else
												{
													for($t=0;$t<5;$t++)
													{
												?>
                                                <i class="fa fa-star" ></i>
                                            
                                            <?php
													}
												}
											?>
                                            </small>
                                            </a>
                                            <a href="<?=$serverpath;?>viewgigster/<?=urlencode($muInfo['fname']."-".$muInfo['lname']);?>/<?=$muInfo['userId'];?>" class="name">
                                            <?php echo $muInfo['fname']." ".$muInfo['lname'];?></a>
                                             <a href="<?=$serverpath;?>viewgigster/<?=urlencode($muInfo['fname']."-".$muInfo['lname']);?>/<?=$muInfo['userId'];?>" class="name">
                                            (<i class="fa fa-user" ></i>&nbsp;<?php echo $muInfo['username'];?>)<br/>
                                            </a>
                                            <strong><?php echo $muInfo['tagline'];?></strong>
                                            <br/>
                                            <?php echo stripslashes(strip_string($muInfo['overview'],300));?>
                                        	<br/><br/>
                                            <a href="#"><?php echo get_country_name($muInfo['country']);?></a>
                                            
                                            <?php $skillsarray=explode(",",$muInfo['skills']);
											if(sizeof($skillsarray)>1)
											{
												?>
												 &nbsp; Skills&nbsp;
												<?php
												foreach($skillsarray as $skill)
												{ ?>
                                           <a href="#" class="label label-primary"> <?php echo $skill;?></a>
                                           <?php
												}
											}
										   ?>
                                        </p>
                                        
                                
                                    </div>
  <?php

	}
}
	?>
