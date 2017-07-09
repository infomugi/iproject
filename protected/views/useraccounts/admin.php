<?php
/* @var $this UseraccountsController */
/* @var $model Useraccounts */

$this->breadcrumbs=array(
	'Useraccounts'=>array('index'),
	'Manage',
	);

	?>
	<?php 
	echo CHtml::link('Add',
		array('create'),
		array('class' => 'btn btn-flat btn-success'));
		?>

		<?php
		echo CHtml::link('List',
			array('index'),
			array('class' => 'btn btn-flat btn-success'));
			?>

			<HR>

				<div class="table-responsive">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'useraccounts-grid',
						'dataProvider'=>$model->search(),
						'filter'=>$model,
						'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
						'columns'=>array(

							array(
								'header'=>'No',
								'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
								'htmlOptions'=>array('width'=>'10px', 
									'style' => 'text-align: center;')),


							array(    
								'name'=>'fullname',
								'value'=>'$data->fullname',
								'sortable' => TRUE, 
								'htmlOptions'=>array('width'=>'130px')),

							array(    
								'name'=>'email',
								'value'=>'$data->email',
								'sortable' => TRUE, 
								'htmlOptions'=>array('width'=>'130px')),					

							array(    
								'name'=>'level',
								'type'=>'raw', 
								'filter'=>array('0'=>'Unverified','1'=>'Super Admin','2'=>'Admin','3'=>'PIC','4'=>'Developer'),
								'value'=>'Useraccounts::model()->level($data->level)',
								'sortable' => TRUE, 
								'htmlOptions'=>array('width'=>'130px')),							

							array(
								'header'=>'Action',
								'visible'=>$model->level != "1",
								'class'=>'CButtonColumn',
								),
							),
							)); ?>
						</div>


						