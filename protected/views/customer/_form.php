<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'customer_code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'customer_code'); ?>
					<?php echo $form->textField($model,'customer_code',array('size'=>60,
						'maxlength'=>255,
						'class'=>'form-control',
						'value' => (($model->isNewRecord) ? $model->generateCustomerCode() : $model->customer_code),
						'readonly'=>true)); ?>
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
						<?php echo $form->labelEx($model,'address'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'address'); ?>
						<?php echo $form->textArea($model,'address',array('class'=>'form-control')); ?>
					</div>
					
				</div>  

				
				<div class="form-group">
					
					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'phone'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'phone'); ?>
						<?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
					</div>
					
				</div>  

				<div class="form-group">
					<div class="col-md-12">  
					</br></br>
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

</div></div><!-- form -->