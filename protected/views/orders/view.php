<?php
/* @var $this OrdersController */
/* @var $model Orders */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id_order,
	);

$this->pageTitle='Detail Orders';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-success btn-flat','title'=>'Add Orders'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-success btn-flat', 'title'=>'List Orders'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-success btn-flat','title'=>'Manage Orders'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_order,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Orders'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_order,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Orders'));
								?>

							</span> 

							<span class="hidden-xs">

								<?php echo CHtml::link('Add',
									array('create'),
									array('class' => 'btn btn-success btn-flat','title'=>'Add Orders'));
									?>
									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-success btn-flat', 'title'=>'List Orders'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-success btn-flat','title'=>'Manage Orders'));
											?>
											<?php echo CHtml::link('Edit', 
												array('update', 'id'=>$model->id_order,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Orders'));
													?>
													<?php echo CHtml::link('Delete', 
														array('delete', 'id'=>$model->id_order,
															),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Orders'));
															?>

														</span>

														<HR>

															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	// 'id_order',
																	// 'created_date',
																	'registration_date',
																	'expired_date',
																	'order_id',
																	array(
																		'name'=>'product_id',
																		'value'=>$model->Product->name,
																		),
																	array(
																		'name'=>'customer_id',
																		'value'=>$model->Customer->name,
																		),
																	'description',
																	array(
																		'name'=>'payment_cycle',
																		'value'=>Orders::model()->cycle($model->payment_cycle),
																		),
																	array(
																		'name'=>'status',
																		'value'=>Useraccounts::model()->status($model->status),
																		),
																	),
																	)); ?>

															<STYLE>
																th{width:150px;}
															</STYLE>

