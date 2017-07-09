<?php
/* @var $this TasksController */
/* @var $model Tasks */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Tasks';
?>


<section class="col-xs-12">
	<?php echo CHtml::link('<i class="fa fa-arrow-left"></i>',
		array('projectdetail/view', 'id'=>$model->id_projectdetail),
		array('class' => 'btn btn-success btn-flat','title'=>'Back to Project Detail'));
		?>
		<?php echo CHtml::link('List',
			array('index'),
			array('class' => 'btn btn-success btn-flat', 'title'=>'List Tasks'));
			?>
			<?php echo CHtml::link('Manage',
				array('admin'),
				array('class' => 'btn btn-success btn-flat','title'=>'Manage Tasks'));
				?>
				<?php 
				if(Yii::app()->user->record->level==1):
					echo CHtml::link('Edit', 
						array('update', 'id'=>$model->id_task,
							), array('class' => 'btn btn-warning btn-flat', 'title'=>'Edit Tasks'));
							?>
							<?php echo CHtml::link('Delete', 
								array('delete', 'id'=>$model->id_task,
									),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Tasks'));
									?>

									<?PHP endif; ?>
									<?php echo CHtml::link('Report', 
										array('report', 'id'=>$model->id_task,
											),  array('class' => 'btn btn-info btn-flat', 'title'=>'Report Task'));
											?>

											<a href="<?php echo Yii::app()->baseUrl; ?><?php echo "/dokumen/file/$model->file"; ?>"><button class="btn btn-info btn-flat"><i class="fa fa-download"></i> Download</button></a>
											<HR>

												<h2 class="header">Sub Task <b><?php echo $model->task; ?></b><span class="header-line"></span></h2>
												<?php $this->widget('zii.widgets.CDetailView', array(
													'data'=>$model,
													'htmlOptions'=>array("class"=>"table"),
													'attributes'=>array(
														'task',
														'name',
														'description',

														array(    
															'name'=>'status',
															'type'=>'raw', 
															'value'=>Tasks::model()->status($model->status),
															),							

														'start_date',
														'end_date',

														),
														)); ?>

														<h2 class="header">File Task <b><?php echo $model->task; ?></b><span class="header-line"></span></h2>
														<?php $this->widget('zii.widgets.CDetailView', array(
															'data'=>$model,
															'htmlOptions'=>array("class"=>"table"),
															'attributes'=>array(
																'file',
																),
																)); ?>

																<h2 class="header">Result <b><?php echo $model->task; ?></b><span class="header-line"></span></h2>
																<?php $this->widget('zii.widgets.CDetailView', array(
																	'data'=>$model,
																	'htmlOptions'=>array("class"=>"table"),
																	'attributes'=>array(
																		'result',
																		),
																		)); ?>

																	</section>

																	<STYLE>
																		th{width:150px;}
																	</STYLE>

