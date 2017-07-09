<?php
/* @var $this TasksController */
/* @var $model Tasks */

$this->breadcrumbs=array(
	'Task'=>array('index'),
	'Add',
	);

	$this->pageTitle='Assign Task';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>