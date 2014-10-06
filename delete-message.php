fasdfa<?php
include('cfg/cfg.php');

$delId=filter_Text($_GET['delId']);
 $delQuery="delete from btr_messages where msgId=$delId";
$delSql=@db_query($delQuery);
if(sizeof($GLOBALS['debug_sql'])<=0)
{
	?>
	<script type="text/javascript">
	window.parent.display_all_messages('<?php echo $serverpath;?>');
</script>
	<?php
}
else{
print_r($GLOBALS['debug_sql']);	
}
?>