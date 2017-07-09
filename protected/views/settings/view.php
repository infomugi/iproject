<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	"General",
	);

$this->pageTitle='System Settings';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
		array('general', 'id'=>$model->id_settings,
			), array('class' => 'btn btn-success btn-flat'));
			?>
			<?php echo CHtml::link('<i class="fa fa-camera"></i>', 
				array('logo', 'id'=>$model->id_settings,
					), array('class' => 'btn btn-success btn-flat'));
					?>		

					<?php echo CHtml::link('<i class="fa fa-square"></i>', 
						array('favicon', 'id'=>$model->id_settings,
							), array('class' => 'btn btn-success btn-flat'));
							?>	

							<?php echo CHtml::link('<i class="fa fa-file-text"></i>', 
								array('invoice', 'id'=>$model->id_settings,
									), array('class' => 'btn btn-success btn-flat'));
									?>	

									<?php echo CHtml::link('<i class="fa fa-dashboard"></i>', 
										array('theme', 'id'=>$model->id_settings,
											), array('class' => 'btn btn-success btn-flat'));
											?>		

											<?php echo CHtml::link('<i class="fa fa-desktop"></i>', 
												array('loghistory',
													), array('class' => 'btn btn-success btn-flat'));
													?>			

												</span> 

												<span class="hidden-xs">

													<?php echo CHtml::link('<i class="fa fa-edit"></i> General', 
														array('general', 'id'=>$model->id_settings,
															), array('class' => 'btn btn-success btn-flat'));
															?>
															<?php echo CHtml::link('<i class="fa fa-camera"></i> Logo', 
																array('logo', 'id'=>$model->id_settings,
																	), array('class' => 'btn btn-success btn-flat'));
																	?>		

																	<?php echo CHtml::link('<i class="fa fa-square"></i> Favicon', 
																		array('favicon', 'id'=>$model->id_settings,
																			), array('class' => 'btn btn-success btn-flat'));
																			?>	

																			<?php echo CHtml::link('<i class="fa fa-file-text"></i> Invoice', 
																				array('invoice', 'id'=>$model->id_settings,
																					), array('class' => 'btn btn-success btn-flat'));
																					?>	

																					<?php echo CHtml::link('<i class="fa fa-dashboard"></i> Theme', 
																						array('theme', 'id'=>$model->id_settings,
																							), array('class' => 'btn btn-success btn-flat'));
																							?>		

																							<?php echo CHtml::link('<i class="fa fa-desktop"></i> Log History', 
																								array('loghistory',
																									), array('class' => 'btn btn-success btn-flat'));
																									?>			

																								</span>



																								<HR>

																									<H3>General</H3>
																									<?php $this->widget('zii.widgets.CDetailView', array(
																										'data'=>$model,
																										'htmlOptions'=>array("class"=>"table"),
																										'attributes'=>array(
																											'system_name',
																											'system_title',
																											'address',
																											'phone',
																											'system_email',
																											'language',
																											'theme',
																											),
																											)); ?>

																										</BR>
																										<H3>Logo, Favicons & Invoice</H3>
																										<?php $this->widget('zii.widgets.CDetailView', array(
																											'data'=>$model,
																											'htmlOptions'=>array("class"=>"table"),
																											'attributes'=>array(
																												'logo',
																												'favicon',
																												'invoice',
																												),
																												)); ?>														
																										<STYLE>
																											th{width:150px;}
																										</STYLE>

