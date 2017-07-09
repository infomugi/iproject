<?php
/* @var $this TermController */
/* @var $model Term */

$this->breadcrumbs=array(
	'Terms'=>array('index'),
	$model->id_payment_type=>array('view','id'=>$model->id_payment_type),
	'Edit',
	);

	$this->pageTitle='Edit Term';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>