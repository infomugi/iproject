<?php
/* @var $this UseraccountsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Useraccounts'=>array('index'),
	'Index',
	);

$this->pageTitle='Account Lists';
?>

<?php 
echo CHtml::link('Add',
	array('create'),
	array('class' => 'btn btn-flat btn-success'));
	?>

	<?php
	echo CHtml::link('Manage',
		array('admin'),
		array('class' => 'btn btn-flat btn-success'));
		?>

		<HR>

			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
				)); ?>

