<?php
/* @var $this ProjectdetailController */
/* @var $model Projectdetail */
/* @var $form CActiveForm */
?>

<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'useraccounts-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary(array_merge(array($model)), null, null, array('class' => 'alert alert-warning')); ?>

			<div class="form-group">

				<div class="col-sm-4 control-label">
				</div>   

				<div class="col-sm-8">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-search"></i>
						</div>
						<?php 
						$this->widget('zii.widgets.jui.CJuiAutoComplete', 
							array( 'name'=>'search', 
								'source'=>$this->createUrl('Projectdetail/JuiAutoComplete'), 
								'options'=>array( 
									'showAnim'=>'fold', 
									'select' => 'js:function(event, ui) {
										$("#Projectdetail_member").val(ui.item.username);
										return false;
									}'
									), 
								'htmlOptions'=>array(
									'class'=>'form-control',
									'placeholder'=>'Search Member'
									),
								)); 
								?>
							</div>

						</div>

					</div>

					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'member'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'member'); ?>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<?php echo $form->textField($model,'member',array('class'=>'form-control','placeholder'=>'Member','readonly'=>true)); ?>
							</div>
						</div>

					</div>  

					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'job'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'job'); ?>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-tasks"></i>
								</div>
								<?php echo $form->textField($model,'job',array('class'=>'form-control','placeholder'=>'Job')); ?>
							</div>
						</div>

					</div>  												

					<div class="form-group">
						<div class="row">	
							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'status'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->error($model,'status'); ?>
								<?php
								echo $form->radioButtonList($model,'status',
									array('0'=>'Start','1'=>'Done'),
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
						</div>

						<div class="form-group">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Assign' : 'Edit', array('class' => 'btn btn-success btn-flat pull-right', 'style'=>'margin-right: 15px;')); ?>
						</div>

						<?php $this->endWidget(); ?>


					</div>
				</div>
