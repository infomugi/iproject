<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>
<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

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
				<div class="col-sm-4 control-label">
				</div>   

				<div class="col-sm-8">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-search"></i>
								</div>
								<?php 
								$this->widget('zii.widgets.jui.CJuiAutoComplete', 
									array( 'name'=>'search', 
										'source'=>$this->createUrl('Projectdetail/JuiAutoComplete'), 
										'options'=>array( 
											'showAnim'=>'fold', 
											'select' => 'js:function(event, ui) {
												$("#Project_id_user").val(ui.item.id_user);
												$("#Project_PIC").val(ui.item.fullname);
												return false;
											}'
											), 
										'htmlOptions'=>array(
											'class'=>'form-control',
											'placeholder'=>'Search PIC'
											),
										)); 
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group" style="display:none">
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'id_user'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'id_user'); ?>
							<?php echo $form->textField($model,'id_user',array('class'=>'form-control')); ?>
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'PIC'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'PIC'); ?>
							<?php echo $form->textField($model,'PIC',array('class'=>'form-control','disabled'=>true)); ?>
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'id_customer'); ?>
						</div>   

						<div class="col-sm-8">	
							<?php echo $form->error($model,'id_customer'); ?>
							<?php echo $form->dropDownList($model, "id_customer",
								CHtml::listData(Customer::model()->findAll(array('condition'=>'','order'=>'name ASC')),
									'id_customer', 'name'
									),
								array("empty"=>"-- Select Customer --", 'class'=>'form-control')
								); ?> 
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'title'); ?>
							</div>   

							<div class="col-sm-8">	
								<?php echo $form->error($model,'title'); ?>
								<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100, 'class'=>'form-control', 'placeholder'=>'Title Project')); ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'current_status'); ?>
							</div>   

							<div class="col-sm-8">	
								<?php echo $form->error($model,'current_status'); ?>
								<?php echo $form->textField($model,'current_status',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Current Status')); ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'description'); ?>
							</div>   

							<div class="col-sm-8">	
								<?php echo $form->error($model,'description'); ?>
								<?php echo $form->textArea($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'form-control','placeholder'=>'Description')); ?>
							</div>
						</div>


						<div class="form-group">
							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'Date Range'); ?>
							</div>   

							<div class="col-sm-8">	
								<div class="col-sm-6">
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

									<div class="col-sm-6">
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
									<div class="col-sm-4 control-label">
										<?php echo $form->labelEx($model,'id_payment_type'); ?>
									</div>   

									<div class="col-sm-8">	
										<?php echo $form->error($model,'id_payment_type'); ?>
										<div class="col-sm-12">
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
										<div class="col-sm-4 control-label">
											<?php echo $form->labelEx($model,'amount'); ?>
										</div>   

										<div class="col-sm-8">	
											<div class="col-sm-12">
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
										<div class="col-sm-4 control-label">
											<?php echo $form->labelEx($model,'status'); ?>
										</div>   

										<div class="col-sm-8">	
											<?php echo $form->error($model,'status'); ?>
											<div class="col-sm-12">
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

									<div class="form-group">
										<div class="col-md-12">  
										</br></br>
										<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-success btn-flat pull-right')); ?>
									</div>
								</div>	
								<?php $this->endWidget(); ?>

							</div>



