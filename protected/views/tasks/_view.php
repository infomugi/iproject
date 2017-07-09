<?php
/* @var $this TasksController */
/* @var $data Tasks */
?>

<div class="box box-<?PHP if($data->status==1){ echo "success";}else{echo "warning";}?>">
	<div class="box-header">
		<i class="fa fa-file-o"></i>
		<h3 class="box-title">
			Sub Task <b><?php echo CHtml::link(CHtml::encode($data->task . " - " . $data->name), array('view', 'id'=>$data->id_task)); ?></b>
		</h3>

		<div class="box-tools pull-left">
			<?PHP if($data->status == 0){ ?>
			<small class="label label-warning" data-toggle="tooltip" title="" data-original-title="On Progress"><i class="fa fa-clock-o"></i> 
				<?PHP echo $data->start_date; ?>
			</small>
			<?php }else{ ?>
			<small class="label label-success" data-toggle="tooltip" title="" data-original-title="Finish"><i class="fa fa-clock-o"></i> 
				<?PHP echo $data->end_date; ?>
			</small>
			<?php } ?>
		</div>

		<div class="box-tools pull-right">
			<div class="btn-group">

				<?PHP if($data->status == 1){ ?>

				<?PHP if(Yii::app()->user->record->level==1): ?>

				<?php echo CHtml::link('<i class="fa fa-edit"></i>',
					array('update','id'=>$data->id_task),
					array('class' => 'btn btn-default btn-sm'));
					?>

					<?PHP endif; ?>

					<?PHP if(Yii::app()->user->record->level!=1): ?>


					<?php echo CHtml::link('<i class="fa fa-edit"></i>',
						array('report','id'=>$data->id_task),
						array('class' => 'btn btn-default btn-sm'));
						?>

						<?PHP endif; ?>


						<?php echo CHtml::link('<i class="fa fa-trash-o"></i>',
							array('delete','id'=>$data->id_task),
							array('class' => 'btn btn-default btn-sm'));
							?>

							<?php }else{ ?>

							<?PHP if(Yii::app()->user->record->level==1): ?>

							<?php echo CHtml::link('<i class="fa fa-edit"></i>',
								array('update','id'=>$data->id_task),
								array('class' => 'btn btn-default btn-sm'));
								?>

								<?PHP endif; ?>

								<?PHP if(Yii::app()->user->record->level!=1): ?>


								<?php echo CHtml::link('<i class="fa fa-edit"></i>',
									array('report','id'=>$data->id_task),
									array('class' => 'btn btn-default btn-sm'));
									?>

									<?PHP endif; ?>

									<?php echo CHtml::link('<i class="fa fa-trash-o"></i>',
										array('delete','id'=>$data->id_task),
										array('class' => 'btn btn-default btn-sm'));
										?>


										<?php } ?>




									</div>
								</div>
							</div>
						</div><!-- /.box-header -->

