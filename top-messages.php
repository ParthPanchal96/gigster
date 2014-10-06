<?php
include('cfg/cfg.php');
include('cfg/functions.php');
$uInfo=get_user_Info($_SESSION['uId']);
$uId=$uInfo['userId'];
	$usermessages=get_user_messages($uId);
?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success"><?php echo $usermessages['count'];?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <?php echo $usermessages['count'];?> unread messages</li>
                                <li>
                                    <?php if($usermessages['count']<=0)
									{
										$usermessages=get_all_user_messages($uId);
									}
?>
                                    <ul class="menu">
                                       <?php if($usermessages['count']>0)
									   {
										   for($i=0;$i<$usermessages['count'];$i++)
										   {
											   $ruinfo="";
											   $ruinfo=get_user_Info(encrypt_str($usermessages['rows'][$i]['msgfrom']));
											   $ruimage="uploads/profileimage/".$ruinfo['profileimage'];
											   ?>
                                        <li><!-- start message -->
                                            <a href="<?=$serverpath;?>allmessages">
                                                <div class="pull-left">
												<img src="<?=$serverpath;?>image.php?image=/<?=$ruimage;?>&width=50&height=50" />		
                                                </div>
                                                <h4>
                                                   <?=get_user_name($usermessages['rows'][$i]['msgfrom']);?>
                                                  
                                                </h4>
                                                <p><?=strip_string($usermessages['rows'][$i]['msgcontent'],50);?><br/>
                                                <small style="float:right;"><i class="fa fa-clock-o"></i> <?=get_time($usermessages['rows'][$i]['msgon']);?></small></p>
                                                  
                                            </a>
                                        </li><!-- end message -->
                                	<?php
										   }
									   }
									?>        
                                        
                                        
                                        
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?=$serverpath;?>allmessages">See All Messages</a></li>
                            </ul>
                        </li>