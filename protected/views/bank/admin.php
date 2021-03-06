<?php
/* @var $this BankController */
/* @var $model Bank */

$this->breadcrumbs=array(
	'Banks'=>array('index'),
	'Manage',
	);

$this->pageTitle='Manage Bank';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-info btn-md'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-info btn-md'));
			?>

		</span> 

		<span class="hidden-xs">

			<?php echo CHtml::link('Add',
				array('create'),
				array('class' => 'btn btn-info btn-flat'));
				?>
				<?php echo CHtml::link('List',
					array('index'),
					array('class' => 'btn btn-info btn-flat'));
					?>

				</span>	

				<HR>
					<div class="table-responsive">
						<?php $this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'bank-grid',
							'dataProvider'=>$model->search(),
							'filter'=>$model,
							'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
							'columns'=>array(

								array(
									'header'=>'No',
									'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
									'htmlOptions'=>array('width'=>'10px', 
										'style' => 'text-align: center;')),

								'bank_name',
								'bank_branch',
								'account_holder',
								'account_number',
								'account_name',
								
								array(
									'class'=>'CButtonColumn',
									'template'=>'{view}',
									'buttons'=>array(
										'view'=>
										array(
											'url'=>'Yii::app()->createUrl("Bank/view", array("id"=>$data->id_payment_bank))',
											'options'=>array(
												'ajax'=>array(
													'type'=>'POST',
													'url'=>"js:$(this).attr('href')",
													'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
													),
												),
											),
										),
									),
								),
								)); ?>
							</div>



							<!-- Modal -->
							<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<!-- Popup Header -->
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title"><strong>View</strong> Bank</h4>
										</div>
										<!-- Popup Content -->
										<div class="modal-body">
											<p>Details</p>
										</div>
										<!-- Popup Footer -->
										<div class="modal-footer">
											<BR>
												<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>


