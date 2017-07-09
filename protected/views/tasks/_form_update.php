<?php
/* @var $this TasksController */
/* @var $model Tasks */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'tasks-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>


			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			<div class="form-group">
				<div class="col-sm-4">
				</div>   

				<div class="col-sm-8">
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
										$("#Tasks_name").val(ui.item.fullname);
										return false;
									}'
									), 
								'htmlOptions'=>array(
									'class'=>'form-control',
									'placeholder'=>'Search Member'
									),
								)); 
								?>
							</div>
						</div>
					</div>

					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'task'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'task'); ?>
							<?php echo $form->textField($model,'task',array('class'=>'form-control')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'name'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'name'); ?>
							<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'description'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'description'); ?>
							<?php echo $form->textArea($model,'description',array('class'=>'form-control')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'result'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'result'); ?>
							<?php echo $form->textArea($model,'result',array('class'=>'form-control')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'file'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'file'); ?>
							<?php echo $form->fileField($model,'file',array('class'=>'form-control')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'status'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'status'); ?>
							<?php
							echo $form->radioButtonList($model,'status',
								array('0'=>'Start','1'=>'Done'),
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


						<div class="form-group">

							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'start_date'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->error($model,'start_date'); ?>
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
													$("#'.CHtml::activeId($model, 'end_date').'").datepicker("option", option, date);
												}'
												),
										));
										?>

									</div><!-- /.input group -->
								</div>

							</div>  
							<div class="form-group">

								<div class="col-sm-4 control-label">
									<?php echo $form->labelEx($model,'end_date'); ?>
								</div>   

								<div class="col-sm-8">
									<?php echo $form->error($model,'end_date'); ?>
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
											'attribute'=>'end_date',
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
								<div class="form-group">
									<div class="col-md-12">  
									</br></br>
									<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
								</div>
							</div>

							<?php $this->endWidget(); ?>

</div></div><!-- form -->