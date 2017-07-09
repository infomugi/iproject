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
						<?php echo $form->labelEx($model,'theme'); ?>
					</div>   

					<div class="col-lg-8 col-md-7 col-xs-12">
						<?php echo $form->error($model,'theme'); ?>
						<?php
						echo $form->radioButtonList($model,'theme',
							array('skin-black'=>'Black','skin-blue'=>'Red'),
							array(
								'template'=>'{input}{label}',
								'separator'=>'',
								'labelOptions'=>array(
									'class'=>'minimal', 'style'=>'padding-right:20px;margin-left:15px'),
								)                              
							);
							?>
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