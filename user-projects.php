<?php
include('cfg/cfg.php');
$m_u_Id=filter_text($_GET['userId']);
if($m_u_Id)
{
$userprojects=get_user_assigned_projects($m_u_Id);
if($userprojects['count']>0)
{
	?>
	<br/>    <h3>Gigs Assigned</h3>
    <?php
	for($i=0;$i<$userprojects['count'];$i++)
	{
		$gigdetails=get_gig_details($userprojects['rows'][$i]['projectId']);
	?>

	<div class="item chat">
    	<h4><a href="#"><?php echo $gigdetails['prjTitle'];?></a></h4>
        <p><?php echo $userprojects['rows'][$i]['completiondate'];?> | $<?php echo $userprojects['rows'][$i]['amount'];?>
        | <?php echo get_p_status($gigdetails['prjId']);?>|
        <?php
		$projectrating=get_user_project_rating($gigdetails['prjId'],$m_u_Id);
		if(!$projectrating)
		{
			$projectrating=0;
		}
		for($g=0;$g<$projectrating;$g++)
		{
		?><i class="fa fa-star" style="color:#F90;"></i><?php
		}
		for($g=$projectrating;$g<5;$g++)
		{
		?><i class="fa fa-star" style="color:#CCC;"></i><?php
		}

		?>
        
        
        </p>
    </div>
	<?php
	}
	
	?>
    <br/>
	<?php
}
else
{
?>
<Br/>
<div class="alert alert-danger">Sorry, No Gigs Assigned to user yet.</div>
<?php
}

}
?>