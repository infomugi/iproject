<?php
/* @var $this OrdersController */
/* @var $model Orders */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Orders';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>