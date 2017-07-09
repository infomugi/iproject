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

			<div style="text-align:center">
				<center>
					<img width="180px" src='./dokumen/favicon/<?php echo $model->favicon; ?>' class="img-responsive" alt="favicon">
					<?php echo $form->error($model,'favicon'); ?>
					<BR>
						<BR>
							<?php echo $form->fileField($model,'favicon',array('size'=>50,'maxlength'=>50, 'id'=>'fileupload','class'=>'btn btn-info btn-flat')); ?> </BR>
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Update', array('class' => 'btn btn-info pull-right btn-flat')); ?>
						</center>
					</div>

					<?php $this->endWidget(); ?>

</div></div><!-- form -->