<?php if(Yii::app()->user->record->level==1): ?>
	
	<div class="btn-toolbar">

		<span class="visible-xs">

			<?php echo CHtml::link('<i class="fa fa-plus"></i>',
				array('create'),
				array('class' => 'btn btn-info btn-flat','title'=>'Add Account'));
				?>
				<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
					array('index'),
					array('class' => 'btn btn-info btn-flat', 'title'=>'List Account'));
					?>
					<?php echo CHtml::link('<i class="fa fa-table"></i>',
						array('admin'),
						array('class' => 'btn btn-info btn-flat','title'=>'Manage Account'));
						?>
						<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
							array('update', 'id'=>$model->id_project,
								), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Account'));
								?>  
								<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
									array('delete', 'id'=>$model->id_project,
										), array('class' => 'btn btn-danger btn-flat', 'title'=>'Edit Account'));
										?>  								

									</span> 

									<span class="hidden-xs">

										<?php echo CHtml::link('Add',
											array('create'),
											array('class' => 'btn btn-info btn-flat','title'=>'Add Account'));
											?>
											<?php echo CHtml::link('List',
												array('index'),
												array('class' => 'btn btn-info btn-flat', 'title'=>'List Account'));
												?>
												<?php echo CHtml::link('Manage',
													array('admin'),
													array('class' => 'btn btn-info btn-flat','title'=>'Manage Account'));
													?>
													<?php echo CHtml::link('Edit', 
														array('update', 'id'=>$model->id_project,
															), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Account'));
															?>
															<?php echo CHtml::link('Delete', 
																array('delete', 'id'=>$model->id_project,
																	), array('class' => 'btn btn-danger btn-flat', 'title'=>'Edit Account'));
																	?>													

																	<?php if($model->id_payment_type==1): ?>

																		<?php echo CHtml::link('Edit Month',
																			array('editmonth','id'=>$model->id_project),
																			array('class' => 'btn btn-flat btn-success','title'=>'Edit Month'));
																			?>

																		<?php endif; ?>

																		<?php if($model->status==0){ ?>

																		<?php echo CHtml::link('Complete',
																			array('complete','id'=>$model->id_project),
																			array('class' => 'btn btn-flat btn-success','title'=>'Set as Complete'));
																			?>

																			<?php }else{?>

																			<?php echo CHtml::link('On Progress',
																				array('onprogress','id'=>$model->id_project),
																				array('class' => 'btn btn-flat btn-danger','title'=>'Set as Default'));
																				?>
																				<span class="btn btn-flat btn-success btn-small disabled">Complete</span>

																				<?php } ?>


																			</span>  

																		</div>

																		<HR>

																		<?php endif; ?>

