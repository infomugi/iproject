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
					<?php echo $form->labelEx($model,'status'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'status'); ?>
					<?php
					echo $form->radioButtonList($model,'status',
						array('1'=>'On Progress','2'=>'Pending','3'=>'Finish'),
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