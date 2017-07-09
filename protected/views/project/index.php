<?php
/* @var $this ProjectController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Project List';
$this->breadcrumbs=array(
	'Projects',
	);

$this->menu=array(
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
	);
	?>

	<?php if(Yii::app()->user->record->level==1): ?>


		<span class="visible-xs">

			<?php echo CHtml::link('<i class="fa fa-plus"></i>',
				array('create'),
				array('class' => 'btn btn-success btn-flat','title'=>'Add Project'));
				?>
				<?php echo CHtml::link('<i class="fa fa-table"></i>',
					array('admin'),
					array('class' => 'btn btn-success btn-flat','title'=>'Manage Project'));
					?>
					<?php echo CHtml::link('<i class="fa fa-file-o"></i>',
						array('site/page&view=project'),
						array('class' => 'btn btn-success btn-flat','title'=>'Manage Project'));
						?>

					</span> 

					<span class="hidden-xs">

						<?php echo CHtml::link('Add',
							array('create'),
							array('class' => 'btn btn-success btn-flat','title'=>'Add Project'));
							?>
							<?php echo CHtml::link('Manage',
								array('admin'),
								array('class' => 'btn btn-success btn-flat','title'=>'Manage Project'));
								?>
								<?php
								echo CHtml::link('Export to Excel',
									array('site/page&view=project'),
									array('class' => 'btn btn-success btn-flat'));
									?>

								</span>

							<?php endif; ?>

							<?php $this->widget('zii.widgets.CListView', array(
								'dataProvider'=>$dataProvider,
								'itemView'=>'_view',
								)); ?>


