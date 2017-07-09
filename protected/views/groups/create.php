<?php
/* @var $this GroupsController */
/* @var $model Groups */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Tambah',
	);

	$this->pageTitle='Add Groups';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>