<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
/* @var $form CActiveForm */
?>

<section class="content">
	<div class="row">
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'invoice-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary(array_merge(array($model)), null, null, array('class' => 'alert alert-warning')); ?>

			<div class="col-lg-6 col-xs-12">

				<div class="form-group">
					<div class="row">
						<div class="col-lg-4 col-md-3 col-xs-12">
							<?php echo $form->labelEx($model,'invoice_number'); ?>
						</div>   

						<div class="col-lg-8 col-md-9 col-xs-12">
							<?php echo $form->error($model,'invoice_number'); ?>

							<?php echo $form->textField($model,'invoice_number',array('size'=>60,
								'maxlength'=>255,
								'class'=>'form-control',
								'value' => (($model->isNewRecord) ? $model->generateInvoice() : $model->invoice_number),
								'readonly'=>true)); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-lg-4 col-md-3 col-xs-12">
								<?php echo $form->labelEx($model,'id_payment_bank'); ?>
							</div>   

							<div class="col-lg-8 col-md-9 col-xs-12">
								<?php echo $form->error($model,'id_payment_bank'); ?>

								<?php 
								$this->widget('zii.widgets.jui.CJuiAutoComplete', 
									array( 'name'=>'search', 
										'source'=>$this->createUrl('Invoice/JuiAutoComplete'), 
										'options'=>array( 
											'showAnim'=>'fold', 
											'select' => 'js:function(event, ui) {
												$("#Invoice_id_payment_bank").val(ui.item.id_payment_bank);
												$("#id_payment_bank").val(ui.item.id_payment_bank);
												$("#bank_name").val(ui.item.bank_name);
												$("#bank_branch").val(ui.item.bank_branch);
												$("#account_holder").val(ui.item.account_holder);
												$("#account_number").val(ui.item.account_number);
												return false;
											}'
											), 
										'htmlOptions'=>array(
											'class'=>'form-control',
											'placeholder'=>'Account Name'
											),
										)); 
										?>

										<div style="display:none;">
											<?php echo $form->textField($model,'id_payment_bank',array('class'=>'form-control','placeholder'=>'ID Payment Bank')); ?>
										</div>

									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-lg-4 col-md-3 col-xs-12">
										<?php echo $form->labelEx($model,'description'); ?>
									</div>   

									<div class="col-lg-8 col-md-9 col-xs-12">
										<?php echo $form->error($model,'description'); ?>
										<?php echo $form->textArea($model,'description', array('rows'=>4, 'cols'=>50,'class'=>'form-control', 'placeholder'=>'Description Invoice')); ?>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-lg-4 col-md-3 col-xs-12">
										<?php echo $form->labelEx($model,'note'); ?>
									</div>   

									<div class="col-lg-8 col-md-9 col-xs-12">
										<?php echo $form->error($model,'note'); ?>
										<?php echo $form->textArea($model,'note', array('rows'=>2, 'cols'=>50,'class'=>'form-control','placeholder'=>'Note')); ?>
									</div>
								</div>
							</div>



							<div class="form-group">
								<div class="row">
									<div class="col-lg-4 col-md-3 col-xs-12">
										<?php echo $form->labelEx($model,'discount'); ?>
									</div>   

									<div class="col-lg-8 col-md-9 col-xs-12">
										<div class="input-group">
											<?php echo $form->error($model,'discount'); ?>
											<?php echo $form->textField($model,'discount',array('class'=>'form-control','placeholder'=>'Discount')); ?><span class="input-group-addon">%</span>
										</div>
									</BR>
								</div>
							</div>
						</div>

					</div>

					<div class="col-lg-6 col-xs-12">

						<div class="form-group">
							<div class="row">
								<div class="col-lg-4 col-md-3 col-xs-12">
									<?php echo $form->labelEx($model,'bank_name'); ?>
								</div>   

								<div class="col-lg-8 col-md-9 col-xs-12">
									<?php echo $form->error($model,'bank_name'); ?>
									<input id="bank_name" placeholder="Bank Name" type="text" class="form-control" readonly="readonly">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-4 col-md-3 col-xs-12">
									<?php echo $form->labelEx($model,'bank_branch'); ?>
								</div>   

								<div class="col-lg-8 col-md-9 col-xs-12">
									<?php echo $form->error($model,'bank_branch'); ?>
									<input id="bank_branch" placeholder="Bank Branch" type="text" class="form-control" readonly="readonly">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-4 col-md-3 col-xs-12">
									<?php echo $form->labelEx($model,'account_holder'); ?>
								</div>   

								<div class="col-lg-8 col-md-9 col-xs-12">
									<?php echo $form->error($model,'account_holder'); ?>
									<input id="account_holder" placeholder="Account Holder" type="text" class="form-control" readonly="readonly">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-4 col-md-3 col-xs-12">
									<?php echo $form->labelEx($model,'account_number'); ?>
								</div>   

								<div class="col-lg-8 col-md-9 col-xs-12">
									<?php echo $form->error($model,'account_number'); ?>
									<input id="account_number" placeholder="Account Number" type="text" class="form-control" readonly="readonly">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-4 col-md-3 col-xs-12">
								</div>   

								<div class="col-lg-8 col-md-9 col-xs-12">
									<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pull-right btn-flat')); ?>
								</div>
							</div>
						</div>

						<?php $this->endWidget(); ?>

					</div>

				</div>
			</section>


