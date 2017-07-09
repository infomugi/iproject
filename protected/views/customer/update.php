<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->name=>array('view','id'=>$model->id_customer),
	'Edit',
	);

	$this->pageTitle='Edit Customer';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>