<?php
/* @var $this UseraccountsController */
/* @var $model Useraccounts */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
		)); ?>

		<div id="kiri" style="float:right;">

			<div class="input-prepend">
				<span class="add-on"><i class="icon-search"></i></span>
				<?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>15)); ?>
			</div>

		</div>

		<div id="kanan" style="float:left;">
			<?php echo CHtml::link('<i class="icon-plus icon-white"></i> Add User',
				array('Useraccounts/create'),
				array('class' => 'btn btn-success'));
				?>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->