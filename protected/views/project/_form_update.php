<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>
<section class="content">
	<div class="row">
		<div class="col-lg-6 col-xs-12"> 

			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'project-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
				'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
				)); ?>

				<?php echo $form->errorSummary(array_merge(array($model, $Projectdetail)), null, null, array('class' => 'alert alert-warning')); ?>

						<div class="form-group">
							<div class="row">	
								<div class="col-lg-4 col-md-3 col-xs-12">
									<?php echo $form->labelEx($model,'id_user'); ?>
								</div>   

								<div class="col-lg-8 col-md-9 col-xs-12">	
									<?php echo $form->error($model,'id_user'); ?>
									<?php echo $form->dropDownList($model, "id_user",
										CHtml::listData(Useraccounts::model()->findAll(array('condition'=>'','order'=>'fullname ASC')),
											'id_user', 'fullname'
											),
										array("empty"=>"-- Select Customer --", 'class'=>'form-control')
										); ?> 


									</div>
								</div>
							</div>

						<div class="form-group">
							<div class="row">	
								<div class="col-lg-4 col-md-3 col-xs-12">
									<?php echo $form->labelEx($model,'id_customer'); ?>
								</div>   

								<div class="col-lg-8 col-md-9 col-xs-12">	
									<?php echo $form->error($model,'id_customer'); ?>
									<?php echo $form->dropDownList($model, "id_customer",
										CHtml::listData(Customer::model()->findAll(array('condition'=>'','order'=>'name ASC')),
											'id_customer', 'name'
											),
										array("empty"=>"-- Select Customer --", 'class'=>'form-control')
										); ?> 


									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">	
									<div class="col-lg-4 col-md-3 col-xs-12">
										<?php echo $form->labelEx($model,'title'); ?>
									</div>   

									<div class="col-lg-8 col-md-9 col-xs-12">	
										<?php echo $form->error($model,'title'); ?>
										<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100, 'class'=>'form-control', 'placeholder'=>'Title Project')); ?>
									</div>
								</div>
							</div>



							<div class="form-group">
								<div class="row">	
									<div class="col-lg-4 col-md-3 col-xs-12">
										<?php echo $form->labelEx($model,'current_status'); ?>
									</div>   

									<div class="col-lg-8 col-md-9 col-xs-12">	
										<?php echo $form->error($model,'current_status'); ?>
										<?php echo $form->textField($model,'current_status',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Current Status')); ?>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">	
									<div class="col-lg-4 col-md-3 col-xs-12">
										<?php echo $form->labelEx($model,'description'); ?>
									</div>   

									<div class="col-lg-8 col-md-9 col-xs-12">	
										<?php echo $form->error($model,'description'); ?>
										<?php echo $form->textArea($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'form-control','placeholder'=>'Description')); ?>
									</div>
								</div>
							</div>


							<div class="form-group">
								<div class="row">	
									<div class="col-lg-4 col-md-12 col-xs-12">
										<?php echo $form->labelEx($model,'Date Range'); ?>
									</div>   

									<div class="col-lg-4 col-md-12 col-xs-12">
										<?php echo $form->error($model,'start_date'); ?>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<?php
												$this->widget('zii.widgets.jui.CJuiDatePicker', array(
													'options'=>array(
														'showAnim'=>'fold',
														),
													'model'=>$model,
													'attribute'=>'start_date',
													'value'=>Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->start_date)),
													'htmlOptions'=>array(
														'class'=>'form-control',
														'placeholder'=>'Start Date',												
														// 'style'=>'width:100%',
														'tabindex'=>2
														),
													'options'=>array(
														'dateFormat' => 'd-mm-yy',
												'showAnim'=>'drop',//'drop','fold','slideDown','fadeIn','blind','bounce','clip','drop'
												'showButtonPanel'=>true,
												'changeMonth'=>true,
												'changeYear'=>true,
												'defaultDate'=>'+1w',
												'onSelect'=>'js:function(selectedDate){
													var option = "minDate",
													instance = $(this).data("datepicker");
													date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
													$("#'.CHtml::activeId($model, 'deadline').'").datepicker("option", option, date);
												}'
												),
													));
													?>

												</div><!-- /.input group -->
											</div>
										</div>

										<div class="col-lg-4 col-md-12 col-xs-12">
											<?php echo $form->error($model,'deadline'); ?>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>

													<?php
													$this->widget('zii.widgets.jui.CJuiDatePicker', array(
														'options'=>array(
															'showAnim'=>'drop',
															),
														'model'=>$model,
														'attribute'=>'deadline',
														'htmlOptions'=>array(
															'class'=>'form-control',
															'placeholder'=>'Ending',
															// 'style'=>'width:100%',
															'tabindex'=>3
															),
														'options'=>array(
															'dateFormat'=>'yy-mm-dd',
															'showButtonPanel'=>true,
															'changeMonth'=>true,
															'changeYear'=>true,
															'defaultDate'=>'+1w',
															'onSelect'=>'js:function(selectedDate){
																var option = "maxDate",
																instance = $(this).data("datepicker");
																date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
																$("#'.CHtml::activeId($model, 'start_date').'").datepicker("option", option, date);
															}'
															),
														));
														?>


													</div><!-- /.input group -->
												</div>
											</div>   

										</div>
									</div>


									<div class="form-group">
										<div class="row">	
											<div class="col-lg-4 col-md-3 col-xs-12">
												<?php echo $form->labelEx($model,'id_payment_type'); ?>
											</div>   

											<div class="col-lg-8 col-md-9 col-xs-12">	
												<?php echo $form->error($model,'id_payment_type'); ?>
												<div class="form-group">

													<?php
													echo $form->radioButtonList($model,'id_payment_type',
														array('1'=>'Pay Per Month','0'=>'Termin'),
														array(
															'template'=>'{input}{label}',
															'separator'=>'',
															'labelOptions'=>array(
																'style'=>'padding-right:20px;margin-left:15px'),

															)                              
														);
														?>

													</div>
												</div>
											</div>
										</div>      


										<div class="form-group">
											<div class="row">	
												<div class="col-lg-4 col-md-3 col-xs-12">
													<?php echo $form->labelEx($model,'amount'); ?>
												</div>   

												<div class="col-lg-8 col-md-9 col-xs-12">	
													<?php echo $form->error($model,'amount'); ?>

													<div class="form-group">
														<div class="input-group">
															<div class="input-group-addon">
																Rp.
															</div>
															<?php echo $form->textField($model,'amount', array('class'=>'form-control', 'placeholder'=>'Amount',)); ?>
														</div><!-- /.input group -->
													</div>

												</div>
											</div>
										</div>								


										<div class="form-group">
											<div class="row">	
												<div class="col-lg-4 col-md-3 col-xs-12">
													<?php echo $form->labelEx($model,'status'); ?>
												</div>   

												<div class="col-lg-8 col-md-9 col-xs-12">	
													<?php echo $form->error($model,'status'); ?>
													<div class="form-group">
														<?php
														echo $form->radioButtonList($model,'status',
															array('0'=>'On Progress','1'=>'Complete'),
															array(
																'template'=>'{input}{label}',
																'separator'=>'',
																'labelOptions'=>array(
																	'style'=>'padding-right:20px;margin-left:15px'),

																)                              
															);
															?>
														</div>
													</div>
												</div>
											</div>  



										</div>

																			<div class="col-lg-6 col-xs-12"> 

										<?php include "_multimodelform.php"; ?>

										<div class="search-ppm" style="display:none">
											<?php include "_formterm.php"; ?>

										</div>

										<div class="info-term" style="display:none">
											<?php include "_multimodelformterm.php"; ?>

										</div>

									</div>

										<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success btn-flat pull-right', 'style'=>'margin-right: 15px;')); ?>
										<?php $this->endWidget(); ?>


									</div>
								</section>



