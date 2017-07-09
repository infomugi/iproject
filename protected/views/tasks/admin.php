<?php
/* @var $this TasksController */
/* @var $model Tasks */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	'Manage',
	);

$this->pageTitle='Manage Tasks';
?>

<section class="col-xs-12">

	<?php echo CHtml::link('List Tasks',
		array('index'),
		array('class' => 'btn btn-success btn-flat'));
		?>

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'tasks-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
				'columns'=>array(

					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
							'style' => 'text-align: center;')),
					'name',
					'description',
					'result',

					array(    
						'name'=>'status',
						'type'=>'raw', 
						'value'=>'Tasks::model()->status($data->status)',
						),		
					
					'start_date',
					'end_date',

					array(
						'header'=>'Action',
						'class'=>'CButtonColumn',
						'htmlOptions'=>array('width'=>'100px', 
							'style' => 'text-align: center;'),
						),
					),
					)); ?>

				</section>