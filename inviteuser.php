<?php
include('cfg/cfg.php');
$inviteto=filter_text($_POST['inviteto']);
$projectId=filter_text($_POST['invitegig'][0]);
$invitefrom=filter_text($_POST['invitefrom']);
$insertQuery="insert into btr_invites(invitefrom,inviteto,inviteon,projectId)values($invitefrom,$inviteto,now(),$projectId)";
$insertSql=@db_query($insertQuery);
if($insertSql)
{
	?>
	<script type="text/javascript">
	window.parent.document.getElementById("successmodal").innerHTML="Invite sent to gigster.";
	window.parent.document.getElementById("successmodal").style.display="block";
	</script>
	<?php
}
?>