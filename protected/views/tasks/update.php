<?php
/* @var $this TasksController */
/* @var $model Tasks */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->name=>array('view','id'=>$model->id_task),
	'Update',
	);

	$this->pageTitle='Edit Tasks - '.$model->name;
	?>

	<?php  
		echo $this->renderPartial('_form_update', array('model'=>$model)); 
	?>