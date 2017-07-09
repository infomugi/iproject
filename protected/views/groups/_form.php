<?php
/* @var $this GroupsController */
/* @var $model Groups */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'groups-form',
			'enableAjaxValidation'=>false,
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			<div class="form-group">
				<div class="col-sm-4">
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
										$("#Groups_id_user").val(ui.item.id_user);
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

					<div class="form-group" style="display:none;">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'id_user'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'id_user'); ?>
							<?php echo $form->textField($model,'id_user',array('class'=>'form-control')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'group'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'group'); ?>
							<?php echo $form->dropDownList($model, "group",
								CHtml::listData(Project::model()->findAll(array('condition'=>'','order'=>'title ASC')),
									'id_project', 'title'
									),
								array("empty"=>"-- Select Project --", 'class'=>'form-control')
								); ?> 
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
									array('1'=>'True','0'=>'False'),
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

							<div class="form-group">
								<div class="col-md-12">  
								</br></br>
								<?php echo CHtml::submitButton($model->isNewRecord ? 'Assign' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
							</div>
						</div>

						<?php $this->endWidget(); ?>

</div></div><!-- form -->