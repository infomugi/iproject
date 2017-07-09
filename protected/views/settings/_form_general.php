<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-lg-7 col-xs-12"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'settings-form',
			'enableAjaxValidation'=>true,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>
			
			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			
			<div class="form-group">
				<div class="col-lg-7 col-xs-12">  
					<div class="col-lg-4 col-xs-12">
						<?php echo $form->labelEx($model,'system_name'); ?>
					</div>   

					<div class="col-lg-8 col-md-7 col-xs-12">
						<?php echo $form->error($model,'system_name'); ?>
						<?php echo $form->textField($model,'system_name',array('class'=>'form-control')); ?>
					</div>
				</div>
			</div>  


			<div class="form-group">
				<div class="col-lg-7 col-xs-12">  
					<div class="col-lg-4 col-xs-12">
						<?php echo $form->labelEx($model,'system_title'); ?>
					</div>   

					<div class="col-lg-8 col-md-7 col-xs-12">
						<?php echo $form->error($model,'system_title'); ?>
						<?php echo $form->textField($model,'system_title',array('class'=>'form-control')); ?>
					</div>
				</div>
			</div>  


			<div class="form-group">
				<div class="col-lg-7 col-xs-12">  
					<div class="col-lg-4 col-xs-12">
						<?php echo $form->labelEx($model,'address'); ?>
					</div>   

					<div class="col-lg-8 col-md-7 col-xs-12">
						<?php echo $form->error($model,'address'); ?>
						<?php echo $form->textArea($model,'address', array('rows'=>4, 'cols'=>50,'class'=>'form-control', 'placeholder'=>'Description Invoice')); ?>
					</div>
				</div>
			</div>  


			<div class="form-group">
				<div class="col-lg-7 col-xs-12">  
					<div class="col-lg-4 col-xs-12">
						<?php echo $form->labelEx($model,'phone'); ?>
					</div>   

					<div class="col-lg-8 col-md-7 col-xs-12">
						<?php echo $form->error($model,'phone'); ?>
						<?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
					</div>
				</div>
			</div>  


			<div class="form-group">
				<div class="col-lg-7 col-xs-12">  
					<div class="col-lg-4 col-xs-12">
						<?php echo $form->labelEx($model,'system_email'); ?>
					</div>   

					<div class="col-lg-8 col-md-7 col-xs-12">
						<?php echo $form->error($model,'system_email'); ?>
						<?php echo $form->textField($model,'system_email',array('class'=>'form-control')); ?>
					</div>
				</div>
			</div>  

			<div class="form-group">
				<div class="col-lg-7 col-xs-12">  
					<div class="col-lg-4 col-xs-12">
						<?php echo $form->labelEx($model,'language'); ?>
					</div>   

					<div class="col-lg-8 col-md-7 col-xs-12">
						<?php echo $form->error($model,'language'); ?>
						<?php echo $form->textField($model,'language',array('class'=>'form-control')); ?>
					</div>
				</div>
			</div>  

			<div class="form-group">
				<div class="col-md-7 col-xs-12">  
				</br></br>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>

</div></div><!-- form -->