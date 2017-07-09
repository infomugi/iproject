<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Add',
	);

$this->pageTitle='Add Product';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>