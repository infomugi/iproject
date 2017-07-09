<?php
/* @var $this GroupsController */
/* @var $model Groups */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->id_group=>array('view','id'=>$model->id_group),
	'Update',
	);

	$this->pageTitle='Edit Groups';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>