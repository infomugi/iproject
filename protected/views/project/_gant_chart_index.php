<?php
$sql = 'SELECT job, member, status_update, DATE_FORMAT(status_update,"%d %M %Y") AS status_updatex FROM Projectdetail WHERE status=1 AND id_project = ' . $data->id_project .'';
$rows = Yii::app()->db->createCommand($sql)->queryAll();
$idx = 1;

if(!empty($rows))
	echo "<div class=''>";
foreach ($rows as $row)
{
	if ($idx % 2 == 0) {
		echo '<div data-original-title='.($row['status_update']).' data-toggle="tooltip" title="" style="margin-top:'.($idx*19).'px;width: '.(100/$data->countproject()).'%" class="progress-bar progress-bar-info">'.($idx.' ' .$row['job']).'</div> ';
	}else{
		echo '<div data-original-title='.($row['status_update']).' data-toggle="tooltip" title="" style="margin-top:'.($idx*19).'px;width: '.(100/$data->countproject()).'%" style="margin-top:'.($idx+10).'px" class="progress-bar progress-bar-success">'.($idx.' ' .$row['job']).'</div> ';
	}
	$idx++;
}

?>

<?php if($data->countproject() - Yii::app()->db->createCommand("SELECT SUM(status) FROM Projectdetail where id_project=$data->id_project")->queryScalar() != 0){?>
	<div data-original-title="
	<?php
	$sql = 'SELECT job FROM Projectdetail WHERE status!=1 AND id_project = ' . $data->id_project .'';
	$rows = Yii::app()->db->createCommand($sql)->queryAll();
	$idx = 1;

	if(!empty($rows))
		foreach ($rows as $row)
		{
			echo ($row['job']) .', ';
			$idx++;
		}
		?>
		" data-toggle="tooltip" title="" style="width:<?php echo 100-(100/$data->countproject())*(Yii::app()->db->createCommand("SELECT SUM(status) FROM Projectdetail where id_project=$data->id_project")->queryScalar()); ?>%" class="progress-bar progress-bar-danger">
		<?php echo $data->countproject() - Yii::app()->db->createCommand("SELECT SUM(status) FROM Projectdetail where id_project=$data->id_project")->queryScalar(); ?> / <?php echo $data->countproject(); ?>  Step
	</div>
	<?php }else{} ?>