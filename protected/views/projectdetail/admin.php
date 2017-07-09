<?php
/* @var $this ProjectdetailController */
/* @var $model Projectdetail */

$this->breadcrumbs=array(
	'Projectdetails'=>array('index'),
	'Manage',
	);

$this->pageTitle='Manage Project Detail';
?>

<?php echo CHtml::link('List',
	array('index'),
	array('class' => 'btn btn-success btn-flat'));
	?>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'projectdetail-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
		'columns'=>array(

			array(
				'header'=>'No',
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				'htmlOptions'=>array('width'=>'10px', 
					'style' => 'text-align: center;')),

			'member',
			'job',
			array(    
				'name'=>'status',
				'type'=>'raw', 
				'filter'=>array('1'=>'Complete','0'=>'On Progress'),
				'value'=>'$data->status == 1 ? "Complete" : "On Progress"',
				'sortable' => TRUE, 
				'htmlOptions'=>array('width'=>'130px', 
					'style' => 'font-weight:700;text-align: left;color:#468847;')),

			'status_update',
			'job_date',
			
			array(
				'header'=>'Action',
				'class'=>'CButtonColumn',
				'htmlOptions'=>array('width'=>'100px', 
					'style' => 'text-align: center;'),
				),
			),
			)); ?>

