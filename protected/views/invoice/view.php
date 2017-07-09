<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
$this->pageTitle='Detail Invoice - ' . $model->invoice_number;
?>


<?php if(Yii::app()->user->record->level==1): ?>

	<div class="btn-toolbar no-print">

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


					<?php echo CHtml::link('Delete', 
						array('delete', 'id'=>$model->id_invoice,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Project Detail'));
							?>

							<?php echo CHtml::link('Print',
								array('print', 'id'=>$model->id_invoice),
								array('class' => 'btn btn-flat btn-success'));
								?>

								<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>										

								<?php if($model->approved_id==0){ ?>

									<?php echo CHtml::link('Verifikasi',
										array('approved','id'=>$model->id_invoice),
										array('class' => 'btn btn-flat btn-info'));
									?>

									<?php }else{?>

										<span class="btn btn-info btn-flat disabled">Verified</span>

										<?php } ?>			

										<?php if($model->confirmation_id==0){ ?>

											<?php echo CHtml::link('Confirmation',
												array('confirmation','id'=>$model->id_invoice),
												array('class' => 'btn btn-flat btn-info'));
											?>

											<?php }else{?>

												<span class="btn btn-info btn-flat disabled">Confirm</span>

												<?php } ?>									

											</div>

										<?php endif; ?>

										<?php if(Yii::app()->user->record->level==3): ?>

											<?php echo CHtml::link('Print',
												array('print', 'id'=>$model->id_invoice),
												array('class' => 'btn btn-flat btn-success'));
												?>

												<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>										


											<?php endif; ?>

											<?php if(Yii::app()->user->record->level==5): ?>

												<?php echo CHtml::link('Print',
													array('print', 'id'=>$model->id_invoice),
													array('class' => 'btn btn-flat btn-success'));
													?>

													<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>										

													<?php if($model->confirmation_id==0){ ?>

														<?php echo CHtml::link('Confirmation',
															array('confirmation','id'=>$model->id_invoice),
															array('class' => 'btn btn-flat btn-info'));
														?>

														<?php }else{?>

															<span class="btn btn-info btn-flat disabled">Confirm</span>

															<?php } ?>									

														<?php endif; ?>

														<HR>

															<?php if($model->approved_by==0): ?>

																<div class="box box-solid no-print">
																	<div class="box-header" data-widget="collapse"><i class="fa fa-money"></i>
																		<h3 class="box-title">Invoice Status</h3>
																	</div>
																	<div class="box-body">

																		<?php $this->widget('zii.widgets.CDetailView', array(
																			'data'=>$model,
																			'htmlOptions'=>array("class"=>"table"),
																			'attributes'=>array(

																				array(
																					'name'=>'approved_by',
																					'value'=>$model->approved_by,
																					'visible'=>!$model->approved_id=0,
																					),

																				array(
																					'name'=>'approved_date',
																					'value'=>$model->approved_date,
																					'visible'=>$model->approved_id!=0,
																					),

																				array(
																					'name'=>'confirmation_by',
																					'value'=>$model->confirmation_by,
																					'visible'=>$model->confirmation_id!=0,
																					),

																				array(
																					'name'=>'confirmation_date',
																					'value'=>$model->confirmation_date,
																					'visible'=>$model->confirmation_id!=0,
																					),																													

																				),
																				)); ?>


																			</div>
																		</div>

																	<?php endif; ?>

																	<?php if($model->Project->id_payment_type==1){ ?>

																		<?php include "_invoice_ppm.php"; ?>

																		<?php }else{ ?>

																			<?php include "_invoice_term.php"; ?>

																			<?php } ?>


																			

																			<STYLE>
																				th{width:300px;}
																			</STYLE>
