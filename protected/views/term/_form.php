<?php
/* @var $this TermController */
/* @var $model Term */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'term-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
			)); ?>

		<?php
		foreach(Yii::app()->user->getFlashes() as $key =>$message)
		{
			echo '<div class="alert alert-'.$key.'">'.$message.'</div>';
		}
		?>

		<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="form-group">

			<div class="col-sm-4 control-label">
				<?php echo $form->labelEx($model,'percent'); ?>
			</div>   

			<div class="col-sm-8">
				<div class="input-group">
					<div class="input-group-addon">
						%
					</div>
					<?php echo $form->error($model,'percent'); ?>
					<?php echo $form->textField($model,'percent',array('class'=>'form-control','placeholder'=>'Term Percent')); ?>
				</div>
			</div>

		</div>  

		<div class="form-group">

			<div class="col-sm-4 control-label">
				<?php echo $form->labelEx($model,'term_date'); ?>
			</div>   

			<div class="col-sm-8">

				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<?php echo $form->error($model,'term_date'); ?>
					<?php
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
						'options'=>array(
							'showAnim'=>'fold',
							),
						'model'=>$model,
						'attribute'=>'term_date',
						'value'=>Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->term_date)),
						'htmlOptions'=>array(
							'class'=>'form-control',
							'placeholder'=>'Term Date',
							'tabindex'=>2
							),
						'options'=>array(
							'dateFormat' => 'd-mm-yy',
						'showAnim'=>'drop',//'drop','fold','slideDown','fadeIn','blind','bounce','clip','drop'
						'showButtonPanel'=>true,
						'changeMonth'=>true,
						'changeYear'=>true,
						'defaultDate'=>'+1w',
						),
						));
						?>
					</div>

				</div>

			</div>  

			<div class="form-group">
				<div class="col-md-12">  
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

</div></div><!-- form -->