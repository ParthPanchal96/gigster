<?php
include('cfg/cfg.php');
$checkQuery="select pro.`prjId`,pro.`userId`, pro.`prjTitle`, pro.`proposedbudget`, pro.`bidto`, t2.username  from btr_projects as pro INNER JOIN btr_users as t2 on pro.userId = t2.userId where prjId not in (select projectId from btr_assignment) order by prjId DESC";
$checkSql=@db_query($checkQuery);
if($checkSql['count']>0)
{
?>
<div class="box">
                               <!-- /.box-header -->
                                <div class="box-body table-responsive">
<table class="table table-bordered table-striped" id="mydatatable">
<thead>
  <tr>
    <th>#</th>
    <th>Title</th>
    <th>Owner</th>
    <th>Proposed Price (<i class="fa fa-dollar"></i>)</th>
    <th>Completion Date</th>
    <th>Status</th>
  </tr>
  </thead>
  <tbody>
  <?php
     $sno=1;
     for($i=0;$i<$checkSql['count'];$i++)
       {
  ?>
  <tr>
    <td><?php echo $sno++;?></td>
    <td>
    <a href="<?php echo $serverpath;?>viewthread.php?pId=<?php echo $checkSql['rows'][$i]['prjId'];?>" data-slidepanel="panel" > <?php echo $checkSql['rows'][$i]['prjTitle']; ?> </a>
    </td>
    <td></a><?php echo $checkSql['rows'][$i]['username']; ?></td>
    <td><?php echo ($checkSql['rows'][$i]['proposedbudget']); ?></td>
    <td><?php echo convert_date($checkSql['rows'][$i]['bidto']); ?></td>
    <td><?php echo get_project_status($checkSql['rows'][$i]['status']); ?></td>
  </tr>
  <?php
	   }
  ?>
  </tbody>
</table>
</td>
</td>
<?php
	}
?>
