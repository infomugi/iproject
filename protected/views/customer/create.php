<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Customer';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>