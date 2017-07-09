<?php
/* @var $this ProjectdetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tasks',
	);

$this->pageTitle='Jobs List';

?>

<?php 
if(Yii::app()->user->record->level==1):
	echo CHtml::link('Manage Job',
		array('admin'),
		array('class' => 'btn btn-success btn-flat'));
endif;
?>

<?php echo CHtml::link('My Job',
	array('my'),
	array('class' => 'btn btn-success btn-flat'));
	?>

	<?php echo CHtml::link('Todo List',
		array('todo'),
		array('class' => 'btn btn-success btn-flat'));
		?>

		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			)); ?>

