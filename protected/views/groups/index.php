<?php
/* @var $this GroupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Groups',
	);

$this->pageTitle='Group Project';
?>

<?php echo CHtml::link('Add',
	array('create'),
	array('class' => 'btn btn-success btn-flat'));
	?>

	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
		)); ?>

