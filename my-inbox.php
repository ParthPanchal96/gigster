<?php
include('cfg/cfg.php');
include('cfg/functions.php');
$usId=$_SESSION['uId'];
$usInfo=get_user_Info($usId);
$usId=$usInfo['userId'];
$allmessages=get_all_user_messages($usId);

?>
<div class="box">
                               <!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <?php if($allmessages['count']>0)
								{
									?>
                                    <div style="float:right;" class="mandatory">* <i class="fa fa-envelope"></i> - Unread message</div>
                                    <table id="example1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sender</th>
                                                 <th>Gig</th>
                                                <th>Sent On</th>
                                                <th>Content</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php for($i=0;$i<$allmessages['count'];$i++)
									   {
										  $isread="";
										  $isread=$allmessages['rows'][$i]['isread'];
										  if($isread=="1")
										  {
											  $cl="";
										  }
										  else
										  {
											  $cl='1';
										  }
										   ?>
                                        <tr >
                                             <td>

<a href="<?php echo $serverpath;?>viewMessageThread/<?=$allmessages['rows'][$i]['msgId'];?>" data-slidepanel="panel">	<?php echo get_user_name($allmessages['rows'][$i]['msgfrom']);?>
<?php if(!$isread)
{
	?>&nbsp;&nbsp;<i class="fa fa-envelope"></i><?php
}
?>
</a>

</td>
 <td><?php echo get_gig_name($allmessages['rows'][$i]['projectId']);?></td>
                                                <td><?php echo get_time($allmessages['rows'][$i]['msgon']);?></td>
                                                <td><?php echo strip_string($allmessages['rows'][$i]['msgcontent'],50);?></td>
                                                
                                                <td align="right"><a href="<?=$serverpath;?>delMessage/<?=$allmessages['rows'][$i]['msgId'];?>" target="submitframe"><i class="fa fa-minus-circle"></i></a></td>
                                            </tr>
                                            <?php
									   }
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Sender</th>
                                                <th>Sent On</th>
                                                <th>Content</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    
                                    <?php
								}
									?>
                                </div><!-- /.box-body -->
                            </div>