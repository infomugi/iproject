<?php
/* @var $this TasksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tasks',
	);

$this->pageTitle='List Tasks';
?>

<section class="col-xs-12">

	<?php 
	if(Yii::app()->user->record->level==1):
		echo CHtml::link('Manage Tasks',
			array('admin'),
			array('class' => 'btn btn-success btn-flat'));
	endif;
	?>

	<?php echo CHtml::link('My Tasks',
		array('tasks/my'),
		array('class' => 'btn btn-success btn-flat'));
		?>

		<?php echo CHtml::link('Todo List',
			array('tasks/todo'),
			array('class' => 'btn btn-success btn-flat'));
			?>

			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
				)); ?>

			</section>