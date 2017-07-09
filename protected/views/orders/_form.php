<?php
/* @var $this OrdersController */
/* @var $model Orders */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'orders-form',
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
					<?php echo $form->labelEx($model,'registration_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'registration_date'); ?>
					<?php
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
						'options'=>array(
							'showAnim'=>'fold',
							),
						'model'=>$model,
						'attribute'=>'registration_date',
						'value'=>Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->registration_date)),
						'htmlOptions'=>array(
							'class'=>'form-control',
							'placeholder'=>'Start Date',
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
						<?php echo $form->labelEx($model,'order_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'order_id'); ?>
						<?php echo $form->textField($model,'order_id',array('size'=>60,
							'maxlength'=>255,
							'class'=>'form-control',
							'value' => (($model->isNewRecord) ? $model->generateOrderID() : $model->order_id),
							'readonly'=>true)); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'product_id'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'product_id'); ?>
							<?php echo $form->dropDownList($model, "product_id",
								CHtml::listData(Product::model()->findAll(array('condition'=>'','order'=>'name ASC')),
									'id_product', 'name'
									),
								array("empty"=>"-- Select Product --", 'class'=>'form-control')
								); ?> 
							</div>

						</div>  


						<div class="form-group">

							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'customer_id'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->error($model,'customer_id'); ?>
								<?php echo $form->dropDownList($model, "customer_id",
									CHtml::listData(Customer::model()->findAll(array('condition'=>'','order'=>'name ASC')),
										'id_customer', 'name'
										),
									array("empty"=>"-- Select Customer --", 'class'=>'form-control')
									); ?> 
								</div>

							</div>  


							<div class="form-group">

								<div class="col-sm-4 control-label">
									<?php echo $form->labelEx($model,'description'); ?>
								</div>   

								<div class="col-sm-8">
									<?php echo $form->error($model,'description'); ?>
									<?php echo $form->textArea($model,'description',array('class'=>'form-control')); ?>
								</div>

							</div>  


							<div class="form-group">

								<div class="col-sm-4 control-label">
									<?php echo $form->labelEx($model,'payment_cycle'); ?>
								</div>   

								<div class="col-sm-8">
									<?php echo $form->error($model,'payment_cycle'); ?>
									<?php
									echo $form->radioButtonList($model,'payment_cycle',
										array('1'=>'Month','2'=>'Year'),
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
										<?php echo $form->labelEx($model,'status'); ?>
									</div>   

									<div class="col-sm-8">
										<?php echo $form->error($model,'status'); ?>
										<?php
										echo $form->radioButtonList($model,'status',
											array('1'=>'Enable','0'=>'Disable'),
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
										<div class="col-md-12">  
										</br></br>
										<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
									</div>
								</div>

								<?php $this->endWidget(); ?>

</div></div><!-- form -->