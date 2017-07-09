<?php
/* @var $this ProjectdetailController */
/* @var $model Projectdetail */
$this->pageTitle='Detail - '.$model->job;
		$tasks = new CActiveDataProvider('Tasks', array(
			'criteria' => array(
				'condition'=>'id_projectdetail = ' . $model->id_projectdetail
				)
			));
?>

<?php echo CHtml::link('<i class="fa fa-arrow-left"></i>',
	array('project/view', 'id'=>$model->id_project),
	array('class' => 'btn btn-success btn-flat','title'=>'Back to Project'));
	?>


	<?php echo CHtml::link('List',
		array('index'),
		array('class' => 'btn btn-success btn-flat', 'title'=>'List Project Detail'));
		?>

		<?php echo CHtml::link('Manage',
			array('admin'),
			array('class' => 'btn btn-success btn-flat','title'=>'Manage Project Detail'));
			?>

			<?php 
			if(Yii::app()->user->record->level==1):
				echo CHtml::link('Add Task',
					array('tasks/create', 'projectdetail'=>$model->id_projectdetail, 'project'=>$model->id_project, 'job'=>$model->job),
					array('class' => 'btn btn-success btn-flat','title'=>'Add Task'));
					?>	
					<?php echo CHtml::link('Edit', 
						array('update', 'id'=>$model->id_projectdetail,
							), array('class' => 'btn btn-warning btn-flat', 'title'=>'Edit Project Detail'));
							?>

							<?php echo CHtml::link('Delete', 
								array('delete', 'id'=>$model->id_projectdetail,
									),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Project Detail'));
							endif;
							?>

							<h2 class="header">Project <b><?php echo $model->Project->title; ?></b><span class="header-line"></span></h2>
							<?php $this->widget('zii.widgets.CDetailView', array(
								'data'=>$model,
								'htmlOptions'=>array("class"=>"table"),
								'attributes'=>array(

									array(
										'name'=>'Title',
										'value'=>$model->Project->title,
										),

									array(
										'name'=>'Description',
										'value'=>$model->Project->description,
										),

									array(
										'name'=>'Current Status',
										'value'=>$model->Project->current_status,
										),					

									array(
										'name'=>'Start Date',
										'value'=>$model->Project->start_date,
										),					

									array(
										'name'=>'End Date',
										'value'=>$model->Project->deadline,
										),										

									),
									)); ?>

									<h2 class="header">Detail <b>Job <?php echo $model->job; ?></b><span class="header-line"></span></h2>
									<?php $this->widget('zii.widgets.CDetailView', array(
										'data'=>$model,
										'htmlOptions'=>array("class"=>"table"),
										'attributes'=>array(
											'member',
											'job',

											array(
												'name'=>'status',
												'value'=>$model->status == 0 ? "Start" : "Done",
												),

											'status_update',
											'job_date'
											),
											)); ?>

											<h2 class="header">Sub Tasks <b><?php echo $model->job; ?></b><span class="header-line"></span></h2>
											<?php $this->widget('zii.widgets.grid.CGridView', array(
												'id'=>'tasks-grid',
												'dataProvider'=>$tasks,
												//'filter'=>$tasks,
												'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
												'columns'=>array(

													array(
														'header'=>'No',
														'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
														'htmlOptions'=>array('width'=>'10px', 
															'style' => 'text-align: center;')),
													'name',
													'description',
													'result',
													array(
														'name'=>'status',
														'value'=>'Tasks::model()->status($data->status)',
														),
													'start_date',
													'end_date',

													array(
														'header'=>'Action',
														'type'=>'raw', 
														'value'=>'CHtml::link("Detail", array("tasks/view", "id"=>$data->id_task))',
														'htmlOptions'=>array('width'=>'0px', 
															'style' => 'text-align: left;')),

													),
													)); ?>

<STYLE>
	th{width:180px;}
</STYLE>