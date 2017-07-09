<div class="form-group">
	<div class="col-xs-12">
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'month'); ?>
		</div>   

		<div class="col-xs-8">
			<?php echo $form->error($model,'month'); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'month', array('class'=>'form-control')); ?>
			</div>

		</div>
	</div>
</div>
