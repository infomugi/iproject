<?php
/* @var $this UseraccountsController */
/* @var $model Useraccounts */

$this->breadcrumbs=array(
	'Useraccounts'=>array('index'),
	'Log History',
	);

$this->pageTitle='Login History - Your IP : ' . Yii::app()->request->getUserHostAddress();

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'useraccounts-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),

		'visit_time',
		'ipaddress',
		array(    
			'name'=>'fullname',
			'value'=>'$data->fullname',
			'sortable' => TRUE, 
			'htmlOptions'=>array('width'=>'130px')),

		array(    
			'name'=>'email',
			'value'=>'$data->email',
			'sortable' => TRUE, 
			'htmlOptions'=>array('width'=>'130px')),					

		array(    
			'name'=>'level',
			'type'=>'raw', 
			'filter'=>array('0'=>'Unverified','1'=>'Super Admin','2'=>'Admin','3'=>'PIC','4'=>'Developer'),
			'value'=>'Useraccounts::model()->level($data->level)',
			'sortable' => TRUE, 
			'htmlOptions'=>array('width'=>'130px')),							


		),
		)); ?>

