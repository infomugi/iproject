<?php
/* @var $this OrdersController */
/* @var $model Orders */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id_order=>array('view','id'=>$model->id_order),
	'Edit',
	);

	$this->pageTitle='Edit Orders';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>