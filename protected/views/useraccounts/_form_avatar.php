<?php
/* @var $this UseraccountsController */
/* @var $model Useraccounts */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'useraccounts-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			
					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'image'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'image'); ?>
							<?php echo $form->fileField($model,'image',array('size'=>50,'maxlength'=>50, 'class' => 'btn btn-inverse btn-flat btn-block')); ?>
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