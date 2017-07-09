<?php
/* @var $this GroupsController */
/* @var $model Groups */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Manage',
	);

$this->pageTitle='Manage Groups';
?>

<section class="col-xs-12">

	<?php echo CHtml::link('Add Groups',
		array('create'),
		array('class' => 'btn btn-success btn-flat'));
		?>
		<?php echo CHtml::link('List Groups',
			array('index'),
			array('class' => 'btn btn-success btn-flat'));
			?>

			<HR>

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'groups-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
					'columns'=>array(

						array(
							'header'=>'No',
							'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
							'htmlOptions'=>array('width'=>'10px', 
								'style' => 'text-align: center;')),

						'id_group',
						'id_user',
						'group',
						'status',
						array(
							'header'=>'Action',
							'class'=>'CButtonColumn',
							'htmlOptions'=>array('width'=>'100px', 
								'style' => 'text-align: center;'),
							),
						),
						)); ?>
						
					</section>