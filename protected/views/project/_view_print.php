<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="row">
	<div class="col-lg-12">

		<div class="box box-solid collapsed-box"> 
			<div class="box-header" >
				<i class="fa fa-bar-chart-o"></i>
				<h3 class="box-title"><b><?php echo CHtml::link(CHtml::encode($data->Useraccounts->fullname), array('view', 'id'=>$data->id_project),array('data-toggle'=>'tooltip', 'title'=>"Detail " . $data->title)); ?> - </b><?php echo $data->title; ?></h3>
				<div class="box-tools pull-right">
					<button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
				</div>
			</div><!-- /.box-header -->
			<div style="display: none;" class="box-body">
 
				<?php include "_tableinfo_grafik_index.php"; ?>  

				<?php
				$sql = 'SELECT job, member, status_update, DATE_FORMAT(status_update,"%d-%m-%Y") AS status_updatex FROM Projectdetail WHERE status=1 AND id_project = ' . $data->id_project .'';
				$rows = Yii::app()->db->createCommand($sql)->queryAll();
				$idx = 1;

				if(!empty($rows))
					echo "<div class='progress active'>";
				foreach ($rows as $row)
				{
					if ($idx % 2 == 0) {
						echo '<div data-original-title='.($row['status_updatex']).' data-toggle="tooltip" title="" style="width: '.(100/$data->countproject()).'%" class="progress-bar progress-bar-info">'.($idx.' ' .$row['job']).'</div> ';
					}else{
						echo '<div data-original-title='.($row['status_updatex']).' data-toggle="tooltip" title="" style="width: '.(100/$data->countproject()).'%" style="margin-top:'.($idx+10).'px" class="progress-bar progress-bar-success">'.($idx.' ' .$row['job']).'</div> ';
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

				</div>

			</div>
		</div>

	</div>
</div>