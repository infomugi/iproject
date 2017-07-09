<?php
/* @var $this BankController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Banks',
	);

$this->pageTitle='List Bank';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-info btn-flat','title'=>'Add Bank'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-info btn-flat', 'title'=>'List Bank'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-info btn-flat','title'=>'Manage Bank'));
				?>

			</span> 

			<span class="hidden-xs">

				<?php echo CHtml::link('Add',
					array('create'),
					array('class' => 'btn btn-info btn-flat','title'=>'Add Bank'));
					?>
					<?php echo CHtml::link('List',
						array('index'),
						array('class' => 'btn btn-info btn-flat', 'title'=>'List Bank'));
						?>
						<?php echo CHtml::link('Manage',
							array('admin'),
							array('class' => 'btn btn-info btn-flat','title'=>'Manage Bank'));
							?>

						</span>

						<HR>

							<?php $this->widget('zii.widgets.CListView', array(
								'dataProvider'=>$dataProvider,
								'itemView'=>'_view',
								)); ?>

