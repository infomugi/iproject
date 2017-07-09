<?php
/* @var $this BankController */
/* @var $model Bank */

$this->breadcrumbs=array(
	'Banks'=>array('index'),
	$model->id_payment_bank,
	);

$this->pageTitle='Detail Bank';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-info btn-flat','title'=>'Add Bank'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-info btn-flat', 'title'=>'List Bank'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-info btn-flat','title'=>'Manage Bank'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_payment_bank,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Bank'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_payment_bank,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Bank'));
								?>

							</span> 

							<span class="hidden-xs">

								<?php echo CHtml::link('Add',
									array('create'),
									array('class' => 'btn btn-info btn-flat','title'=>'Add Bank'));
									?>
									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-info btn-flat', 'title'=>'List Bank'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-info btn-flat','title'=>'Manage Bank'));
											?>
											<?php echo CHtml::link('Edit', 
												array('update', 'id'=>$model->id_payment_bank,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Bank'));
													?>
													<?php echo CHtml::link('Delete', 
														array('delete', 'id'=>$model->id_payment_bank,
															),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Bank'));
															?>

														</span>

														<HR>

															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	'bank_name',
																	'bank_branch',
																	'account_holder',
																	'account_number',
																	'account_name',
																	),
																	)); ?>

															<STYLE>
																th{width:150px;}
															</STYLE>

