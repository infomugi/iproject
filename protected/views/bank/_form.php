<?php
/* @var $this BankController */
/* @var $model Bank */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'bank-form',
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
							<?php echo $form->labelEx($model,'bank_name'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'bank_name'); ?>
							<?php echo $form->textField($model,'bank_name',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'bank_branch'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'bank_branch'); ?>
							<?php echo $form->textField($model,'bank_branch',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'account_holder'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'account_holder'); ?>
							<?php echo $form->textField($model,'account_holder',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'account_number'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'account_number'); ?>
							<?php echo $form->textField($model,'account_number',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'account_name'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'account_name'); ?>
							<?php echo $form->textField($model,'account_name',array('class'=>'form-control')); ?>
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