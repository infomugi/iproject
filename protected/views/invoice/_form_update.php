<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
/* @var $form CActiveForm */
?>

<section class="content">
	<div class="row">

		<div class="col-xs-6">
			<div class="box-body table-responsive">

				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'invoice-form',
					'enableAjaxValidation'=>false,
					)); ?>

					<?php echo $form->errorSummary($model); ?>

					<div class="form-group">
						<div class="col-xs-12">
							<div class="col-xs-4">
								<?php echo $form->labelEx($model,'invoice_number'); ?>
							</div>   

							<div class="col-xs-8">
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
							<div class="col-xs-12">
								<div class="col-xs-4">
									<?php echo $form->labelEx($model,'Term'); ?>
								</div>   

								<div class="col-xs-8">
									<?php echo $form->error($model,'Term'); ?>
									<?php echo $form->textField($model,'Term',array('class'=>'form-control','placeholder'=>'Term Invoice')); ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<div class="col-xs-4">
									<?php echo $form->labelEx($model,'description'); ?>
								</div>   

								<div class="col-xs-8">
									<?php echo $form->error($model,'description'); ?>
									<?php echo $form->textArea($model,'description', array('rows'=>4, 'cols'=>50,'class'=>'form-control', 'placeholder'=>'Description Invoice')); ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<div class="col-xs-4">
									<?php echo $form->labelEx($model,'note'); ?>
								</div>   

								<div class="col-xs-8">
									<?php echo $form->error($model,'note'); ?>
									<?php echo $form->textArea($model,'note', array('rows'=>2, 'cols'=>50,'class'=>'form-control','placeholder'=>'Note')); ?>
								</div>
							</div>
						</div>



						<div class="form-group">
							<div class="col-xs-12">
								<div class="col-xs-4">
									<?php echo $form->labelEx($model,'discount'); ?>
								</div>   

								<div class="col-xs-8">
									<div class="input-group">
										<?php echo $form->error($model,'discount'); ?>
										<?php echo $form->textField($model,'discount',array('class'=>'form-control','placeholder'=>'Discount')); ?><span class="input-group-addon">%</span>
									</div></BR>

								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="col-xs-6">
					<div class="box-body table-responsive">

					<H3><i class="fa fa-dollar"></i> Invoice Info</H3>

					<?php $this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'htmlOptions'=>array("class"=>"table "),
						'attributes'=>array(

							array(    
								'name'=>'Payment Type',
								'type'=>'raw', 
								'value'=>$model->Project->id_payment_type == 1 ? "Pay Per Month" : "Termin",
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')),  

							array(    
								'name'=>'Amount',
								'value'=>Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount)),
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

							array(    
								'name'=>'Terms',
								'value'=>$model->Term. ' Terms',
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

							array(    
								'name'=>'Terms',
								'value'=>Yii::app()->db->createCommand("SELECT percent FROM term where id_Project=".$model->Project->id_Project."")->queryScalar(). ' %',
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 


							),
							)); ?>

								<div class="row-fluid">
									<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pull-right btn-flat')); ?>
								</div>

								<?php $this->endWidget(); ?>

							</div>
						</div>

					</div>
				</section>


