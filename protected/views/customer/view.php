<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Customer';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-info btn-flat','title'=>'Add Customer'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-info btn-flat', 'title'=>'List Customer'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-info btn-flat','title'=>'Manage Customer'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_customer,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Customer'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_customer,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Customer'));
								?>

							</span> 

							<span class="hidden-xs">

								<?php echo CHtml::link('Add',
									array('create'),
									array('class' => 'btn btn-info btn-flat','title'=>'Add Customer'));
									?>
									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-info btn-flat', 'title'=>'List Customer'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-info btn-flat','title'=>'Manage Customer'));
											?>
											<?php echo CHtml::link('Edit', 
												array('update', 'id'=>$model->id_customer,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Customer'));
													?>
													<?php echo CHtml::link('Delete', 
														array('delete', 'id'=>$model->id_customer,
															),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Customer'));
															?>

														</span>

														<HR>

															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	'customer_code',
																	'name',
																	'address',
																	'phone',
																	),
																	)); ?>

															<STYLE>
																th{width:150px;}
															</STYLE>

