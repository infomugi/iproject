<?php
/* @var $this GroupsController */
/* @var $model Groups */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->id_group,
	);

$this->pageTitle='Detail Groups';
?>


<section class="col-xs-12">
<?php if(Yii::app()->user->record->level==1): ?>

	<?php echo CHtml::link('Add',
		array('create'),
		array('class' => 'btn btn-success btn-flat','title'=>'Add Groups'));
		?>
		<?php echo CHtml::link('List',
			array('index'),
			array('class' => 'btn btn-success btn-flat', 'title'=>'List Groups'));
			?>
				<?php echo CHtml::link('Edit', 
					array('update', 'id'=>$model->id_group,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Groups'));
						?>
						<?php echo CHtml::link('Delete', 
							array('delete', 'id'=>$model->id_group,
								),  array('class' => 'btn btn-warning btn-flat', 'title'=>'Hapus Groups'));
								?>

								<?PHP endif; ?>

								<HR>

									<?php $this->widget('zii.widgets.CDetailView', array(
										'data'=>$model,
										'htmlOptions'=>array("class"=>"table"),
										'attributes'=>array(
											'id_group',
											'id_user',
											'group',
											'status',
											),
											)); ?>

										</section>

										<STYLE>
											th{width:150px;}
										</STYLE>

