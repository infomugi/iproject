<?php
/* @var $this InvoiceController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Invoice List';
$this->breadcrumbs=array(
	'Invoices',
	);

$this->menu=array(
	array('label'=>'Create Invoice', 'url'=>array('create')),
	array('label'=>'Manage Invoice', 'url'=>array('admin')),
	);
	?>

	<?php echo CHtml::link('Manage',
		array('admin'),
		array('class' => 'btn btn-success btn-flat'));
		?>

		<?php
		echo CHtml::link('Export to Excel',
			array('site/page&view=invoice'),
			array('class' => 'btn btn-success btn-flat'));
			?>
			<HR>

				<!--Panel heading-->
				<div class="panel-heading">
					<div class="panel-control">

						<!--Nav tabs-->
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#demo-tabs-box-1">Invoice</a></li>
							<li><a data-toggle="tab" href="#demo-tabs-box-2">Approved</a></li>
							<li><a data-toggle="tab" href="#demo-tabs-box-3">Confirmation</a></li>
							<li><a data-toggle="tab" href="#demo-tabs-box-4">Paid</a></li>
							<li><a data-toggle="tab" href="#demo-tabs-box-5">Unpaid</a></li>
							<li><a data-toggle="tab" href="#demo-tabs-box-6">Pay Per Month</a></li>
							<li><a data-toggle="tab" href="#demo-tabs-box-7">Termin</a></li>
						</ul>

					</div>
				</div>

				<!--Panel body-->
				<div class="panel-body">

					<!--Tabs content-->
					<div class="tab-content">
						<div id="demo-tabs-box-1" class="tab-pane fade in active">
							<?php $this->widget('zii.widgets.CListView', array(
								'dataProvider'=>$dataProvider,
								'itemView'=>'_view',
								)); ?>

							</div>
							<div id="demo-tabs-box-2" class="tab-pane fade">
								<?php $this->widget('zii.widgets.CListView', array(
									'dataProvider'=>$InvoiceApproved,
									'itemView'=>'_view',
									)); ?>
								</div>
								<div id="demo-tabs-box-3" class="tab-pane fade">
									<?php $this->widget('zii.widgets.CListView', array(
										'dataProvider'=>$InvoiceConfirmation,
										'itemView'=>'_view',
										)); ?>
									</div>
									<div id="demo-tabs-box-4" class="tab-pane fade">
										<?php $this->widget('zii.widgets.CListView', array(
											'dataProvider'=>$InvoicePaid,
											'itemView'=>'_view',
											)); ?>
										</div>
										<div id="demo-tabs-box-5" class="tab-pane fade">
											<?php $this->widget('zii.widgets.CListView', array(
												'dataProvider'=>$InvoiceUnPaid,
												'itemView'=>'_view',
												)); ?>
											</div>		
											<div id="demo-tabs-box-6" class="tab-pane fade">
												<?php $this->widget('zii.widgets.CListView', array(
													'dataProvider'=>$PaymentPPM,
													'itemView'=>'_view',
													)); ?>
												</div>		
												<div id="demo-tabs-box-7" class="tab-pane fade">
													<?php $this->widget('zii.widgets.CListView', array(
														'dataProvider'=>$PaymentTerm,
														'itemView'=>'_view',
														)); ?>
													</div>																																						
												</div>
											</div>

