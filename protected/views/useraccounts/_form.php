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
			'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'fullname'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'fullname'); ?>
					<?php echo $form->textField($model,'fullname',array('class'=>'form-control','placeholder'=>'Fullname')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'username'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'username'); ?>
					<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'password'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'password'); ?>
					<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
				</div>

			</div>  			


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'gender'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'gender'); ?>
					<?php
					echo $form->radioButtonList($model,'gender',
						array('1'=>'Male','0'=>'Female'),
						array(
							'template'=>'{input}{label}',
							'separator'=>'',
							'labelOptions'=>array(
								'class'=>'minimal', 'style'=>'padding-right:20px;margin-left:5px'),

							)                              
						);
						?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'birth'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'birth'); ?>
						<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
							'options'=>array(
								'showAnim'=>'fold',
								),
							'model'=>$model,
							'attribute'=>'birth',
							'value'=>Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->birth)),
							'htmlOptions'=>array(
								'class'=>'form-control',
								'placeholder'=>'Birth',												
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


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'email'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'email'); ?>
							<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email')); ?>
						</div>

					</div>  

					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'image'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'image'); ?>
							<?php echo $form->fileField($model,'image',array('size'=>50,'maxlength'=>50, 'class' => 'btn btn-info btn-flat btn-block')); ?>
						</div>

					</div>  				

					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'division'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'division'); ?>
							<?php echo $form->dropDownList($model, "division",
								CHtml::listData(Division::model()->findAll(array('condition'=>'','order'=>'name ASC')),
									'id_division', 'name'
									),
								array("empty"=>"-- Select Division --", 'class'=>'form-control')
								); ?> 
							</div>

						</div>  						

						<div class="form-group">
							<div class="col-sm-4">
							</div>
							<div class="col-sm-8"> 
								<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
							</div>
						</div>

						<?php $this->endWidget(); ?>

</div></div><!-- form -->