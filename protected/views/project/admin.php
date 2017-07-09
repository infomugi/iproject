<?php
/* @var $this ProjectController */
/* @var $model Project */
?>

<?php if(Yii::app()->user->record->level==1): ?>

	<?php
	echo CHtml::link('Add',
		array('create'),
		array('class' => 'btn btn-success btn-flat'));
		?>

		<?php
		echo CHtml::link('List',
			array('index'),
			array('class' => 'btn btn-success btn-flat'));
			?>

			<?php
			echo CHtml::link('Export to Excel',
				array('site/page&view=project'),
				array('class' => 'btn btn-success btn-flat'));
				?>
				<HR>
				<?php endif; ?>
				<div class="table-responsive">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'project-grid',
						'dataProvider'=>$model->search(),
						'filter'=>$model,
						'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
						'columns'=>array(
							array(
								'header'=>'No',
								'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
								'htmlOptions'=>array('width'=>'10px', 
									'style' => 'text-align: center;')),

							'title',

							array(    
								'name'=>'start_date',
								'value'=>'CHtml::encode(Yii::app()->dateFormatter->formatDateTime($data->start_date, "medium", false)) . " - " . CHtml::encode(Yii::app()->dateFormatter->formatDateTime($data->deadline, "medium", false)) ',
								'sortable' => TRUE, 
								'htmlOptions'=>array('width'=>'180px')),								

							array(    
								'name'=>'status',
								'type'=>'raw', 
								'filter'=>array('1'=>'Complete','0'=>'On Progress'),
								'value'=>'$data->status == 1 ? "Complete" : "On Progress"',
								'sortable' => TRUE, 
								'htmlOptions'=>array('width'=>'130px', 
									'style' => 'font-weight:700;text-align: left;color:#468847;')),

							array(    
								'name'=>'id_payment_type',
								'type'=>'raw', 
								'filter'=>array('1'=>'Pay Per Month','0'=>'Termin'),
								'value'=>'$data->id_payment_type == 1 ? "Pay Per Month" : "Termin"',
								'sortable' => TRUE, 
								'htmlOptions'=>array('width'=>'130px', 
									'style' => 'font-weight:700;text-align: left;color:#468847;')),

							array(
								'header'=>'Action',
								'visible'=>Yii::app()->user->record->level==1,
								'class'=>'CButtonColumn',
								'htmlOptions'=>array('width'=>'100px', 'style'=>'text-align: center;')),
							),
							)); ?>
						</div>
