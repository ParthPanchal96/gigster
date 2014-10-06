<?php
include('cfg/cfg.php');
$tommorow=gmmktime('0','0','0',date('m'),(date('d')-1),date('Y'));
$today=gmmktime('0','0','0',date('m'),date('d'),date('Y'));

$gigsquery="select * from btr_projects where postedon >=$tommorow and postedon<=$today";
$gigsql=@db_query($gigsquery);
if($gigsql['count']>0)
{
	echo $gigsql['count'];
}
else{
	
}
?>