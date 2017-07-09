<?php
/* @var $this TermController */
/* @var $model Term */

$this->breadcrumbs=array(
	'Terms'=>array('index'),
	'Add',
	);

$this->pageTitle='Add Term';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>