<?php
include('cfg/cfg.php');

$proposal=filter_text($_POST['proposal']);
$price=filter_text($_POST['pprice']);
$projectId=filter_text($_POST['projectId']);

$attachedfile=$_FILES['attachedfile'];
if($_SESSION['uId'])
{
	$userInfo=get_user_Info($_SESSION['uId']);
	$uId=$userInfo['userId'];
}
$checkQuery="select * from btr_bids where projectId=$projectId and bidfrom=$uId";
$checkSql=@db_query($checkQuery);
if($checkSql['count']>0)
{
	$mId=$checkSql['rows']['0']['bidId'];
	$updateQuery="update btr_bids set bidcontent='$proposal' ,bidprice=$price,updatedon=".gmmktime()." where bidId=".$checkSql['rows']['0']['bidId'];
	$updateSql=@db_query($updateQuery);
	$gigdetails=get_gig_details($projectId);
	$giguser=$gigdetails['userId'];
	$giguserinfo=get_user_Info(encrypt_str($giguser));
	
	$gigusername=$giguserinfo['username'];
	if($giguser)
	{
									$mailmatter="<p>Hello User </p>
											  <p>".$userInfo['username']." has updated his proposal on your gig ".$gigdetails['prjTitle'].".</p>
											  <p>Details are following</p>
											  <p>Username- ".$userInfo['username']."</p>
											  <p>Amount- $price</p>
											  <p>Content $proposal</p>
											  <p>&nbsp;</p>
											  <p>Regards</p>
											  <p>$sitename</p>";
						
								$mailto=filter_text($giguserinfo['usermail']);
								$from="rohitbanna@gmail.com";
								$mailsubject="A  proposal is updated on your gig.";
								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
								$headers .= "From: Bettr <$from>" . "\r\n";
								$mail=send_my_mail($mailto,$mailmatter,$mailsubject);	

	}
}
else
{
	$insertQuery="insert into btr_bids(bidfrom,bidon,projectId,bidcontent,bidprice)";
	 $insertQuery.="values($uId,".gmmktime().",$projectId,'$proposal',$price)";	
	$insertSql=@db_query($insertQuery,3);
	$mId=$insertSql;
	$gigdetails=get_gig_details($projectId);
	$giguser=$gigdetails['userId'];
	$giguserinfo=get_user_Info(encrypt_str($giguser));
	if($giguser)
	{
		$mailto=filter_text($giguserinfo['usermail']);
	$mailmatter="<p>Hello User </p>
											  <p>You have recieved a new proposal on your gig ".$gigdetails['prjTitle'].".</p>
											  <p>Details are following</p>
											  <p>Username- ".$userInfo['username']."</p>
											  <p>Amount $price</p>
											  <p>Content $proposal</p>
											  <p>&nbsp;</p>
											  <p>Regards</p>
											  <p>$sitename</p>";
						
								$mailto=filter_text($giguserinfo['usermail']);
								$from="notifications@bettr.com";
									$mailsubject="A new proposal is submited on your gig.";
								$mail=send_my_mail($mailto,$mailmatter,$mailsubject);	
									
	}
	
}
if($attachedfile['size']>0)
{
	$ext=get_extension($attachedfile['name']);
	$newname=$mId."XX".time().".$ext";
	$newpath="uploads/proposals/".$newname;
	$move=move_uploaded_file($attachedfile['tmp_name'],$newpath);
	if($move)
	$updateQuery1=@db_query("update btr_bids set haveattachment='1' where bidId=$mId");
	$updateQuery2="insert into btr_attachments(userId,attchpath,attachmenttype,projectId,bidId,attachedon)";
	$updateQuery2.="values($uId,'$newname','$ext',$projectId,$mId,". gmmktime().")";
	$updateQuery2=@db_query($updateQuery2);
	
}
if(sizeof($GLOBALS['debug_sql'])<=0)
	{ 
	
	?>
   	
	<script type="text/javascript">
	window.parent.document.getElementById("bidForm").reset();
	window.parent.view_proposals('<?php echo $serverpath;?>','<?=$projectId;?>');
	window.parent.document.getElementById('bidForm').style.display='none';
	</script>
	
	<?php	
	
	}
	else
	{
		print_r($GLOBALS['debug_sql']);
	}
?>
</body>
</html>