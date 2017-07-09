<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
	);

$dataProjects=new CActiveDataProvider('Project',array(
	'criteria'=>array(
		'condition'=>'id_product = '.$model->id_product,
		'order'=>'title ASC',
		)));

$this->pageTitle='Detail Product';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-info btn-flat','title'=>'Add Product'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-info btn-flat', 'title'=>'List Product'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-info btn-flat','title'=>'Manage Product'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_product,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Product'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_product,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Product'));
								?>

							</span> 

							<span class="hidden-xs">

								<?php echo CHtml::link('Add',
									array('create'),
									array('class' => 'btn btn-info btn-flat','title'=>'Add Product'));
									?>
									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-info btn-flat', 'title'=>'List Product'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-info btn-flat','title'=>'Manage Product'));
											?>
											<?php echo CHtml::link('Edit', 
												array('update', 'id'=>$model->id_product,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Product'));
													?>
													<?php echo CHtml::link('Delete', 
														array('delete', 'id'=>$model->id_product,
															),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Product'));
															?>

														</span>

														<HR>

															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	'name',
																	'description',
																	array(
																		'name'=>'status',
																		'value'=>Useraccounts::model()->status($model->status),
																		),
																	),
																	)); ?>

															<STYLE>
																th{width:150px;}
															</STYLE>

