<?php
/* @var $this ProjectdetailController */
/* @var $model Projectdetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_projectdetail'); ?>
		<?php echo $form->textField($model,'id_projectdetail'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member'); ?>
		<?php echo $form->textField($model,'member',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'job'); ?>
		<?php echo $form->textField($model,'job',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_project'); ?>
		<?php echo $form->textField($model,'id_project'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->