<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="row">
	<div class="col-lg-12">

		<div class="box box-solid collapsed-box"> 
			<div class="box-header" >
				<i class="fa fa-bar-chart-o"></i>
				<h3 class="box-title"><b><?php echo CHtml::link(CHtml::encode($data->useraccounts->fullname), array('view', 'id'=>$data->id_project)); ?> - </b><?php echo $data->title; ?></h3>
				<div class="box-tools pull-right">
					<button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
					<button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div><!-- /.box-header -->
			<div style="display: none;margin-left:40px;" class="box-body">
				<?php
				$sql = 'SELECT * FROM projectdetail WHERE status=1 AND id_project = ' . $data->id_project .'';
				$rows = Yii::app()->db->createCommand($sql)->queryAll();
				$idx = 1;

				if(!empty($rows))
					foreach ($rows as $row)
					{
						echo '<span class="label label-success" data-original-title="'.($row['member']) .'" data-toggle="tooltip">'.($row['job']) .'</span> ';
						$idx++;
					}
					?>

					<?php
					$sql = 'SELECT * FROM projectdetail WHERE status!=1 AND id_project = ' . $data->id_project .'';
					$rows = Yii::app()->db->createCommand($sql)->queryAll();
					$idx = 1;

					if(!empty($rows))
						foreach ($rows as $row)
						{
							echo '<span class="label label-danger" data-original-title="'.($row['member']) .'" data-toggle="tooltip">'.($row['job']) .'</span> ';
							$idx++;
						}
						?><BR>

						<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
						<?php echo CHtml::encode($data->start_date); ?>, 

						<b><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?>:</b>
						<?php echo CHtml::encode($data->deadline); ?>
						<br />

						<b><?php echo CHtml::encode($data->getAttributeLabel('Duration Time')); ?>:</b>
						<?php 
						$date1 = "$data->start_date";
						$date2 = "$data->deadline";
						$diff = abs(strtotime($date2) - strtotime($date1));
						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						if($years<1)
						{
							printf("%d months, %d days\n", $months, $days);
						}elseif ($months<1) {
							printf("%d years, %d days\n", $years, $days);
						}elseif ($days<1) {
							printf("%d years, %d months\n", $years, $months);
						}else{
							printf("%d years, %d months, %d days\n", $years, $months, $days);
						}
						?>
						<BR>
						<!-- 	<b><?php echo CHtml::encode($data->getAttributeLabel('Deadline Time')); ?>:</b>
						<?php
						$dead1 = Yii::app()->db->createCommand("SELECT NOW() as sekarang FROM projectdetail")->queryScalar();
						$dead2 = "$data->deadline";
						$diff = abs(strtotime($dead2) - strtotime($dead1));
						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						if($years==0)
						{
						printf("%d months, %d days\n", $months, $days);
						}elseif ($months==0) {
						printf("%d years, %d days\n", $years, $days);
						}elseif ($days==0) {
						printf("%d years, %d months\n", $years, $months);
						}else{
						printf("%d years, %d months, %d days\n", $years, $months, $days);
						}

						?>
						<br /> -->

						<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
						<?php echo CHtml::encode($data->description); ?>
						<br />

						<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
						<?php echo CHtml::encode($data->current_status); ?>
						<br />

						<?php
						$sql = 'SELECT job, member, status_update, DATE_FORMAT(status_update,"%d %M %Y") AS status_updatex FROM projectdetail WHERE status=1 AND id_project = ' . $data->id_project .'';
						$rows = Yii::app()->db->createCommand($sql)->queryAll();
						$idx = 1;

						if(!empty($rows))
							echo "<div class='progress progress-striped active'>";
						foreach ($rows as $row)
						{
							if ($idx % 2 == 0) {
								echo '<div data-original-title='.($row['status_update']).' data-toggle="tooltip" title="" style="width: '.(100/$data->countproject()).'%" class="progress-bar progress-bar-info">'.($idx.' ' .$row['job']).'</div> ';
							}else{
								echo '<div data-original-title='.($row['status_update']).' data-toggle="tooltip" title="" style="width: '.(100/$data->countproject()).'%" class="progress-bar progress-bar-success">'.($idx.' ' .$row['job']).'</div> ';
							}
							$idx++;
						}

						?>

						<?php if($data->countproject() - Yii::app()->db->createCommand("SELECT SUM(status) FROM Projectdetail where id_project=$data->id_project")->queryScalar() != 0){?>
							<div data-original-title="
							<?php
							$sql = 'SELECT job FROM projectdetail WHERE status!=1 AND id_project = ' . $data->id_project .'';
							$rows = Yii::app()->db->createCommand($sql)->queryAll();
							$idx = 1;

							if(!empty($rows))
								foreach ($rows as $row)
								{
									echo ($row['job']) .', ';
									$idx++;
								}
								?>
								" data-toggle="tooltip" title="" style="width:<?php echo 100-(100/$data->countproject())*(Yii::app()->db->createCommand("SELECT SUM(status) FROM projectdetail where id_project=$data->id_project")->queryScalar()); ?>%" class="progress-bar progress-bar-danger">
								<?php echo $data->countproject() - Yii::app()->db->createCommand("SELECT SUM(status) FROM projectdetail where id_project=$data->id_project")->queryScalar(); ?> / <?php echo $data->countproject(); ?>  Step
							</div>
							<?php }else{} ?>

						</div>

					</div>
				</div>

			</div>
		</div>