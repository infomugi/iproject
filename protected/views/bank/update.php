<?php
/* @var $this BankController */
/* @var $model Bank */

$this->breadcrumbs=array(
	'Banks'=>array('index'),
	$model->id_payment_bank=>array('view','id'=>$model->id_payment_bank),
	'Edit',
	);

	$this->pageTitle='Edit Bank';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>