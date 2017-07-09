<?php
/* @var $this ProjectController */
/* @var $model Project */
$this->pageTitle='Detail Project - ' . $model->title;

//Script Ajax untuk Remove
Yii::app()->clientScript->registerScript('ajaxupdate', "
	$('#Projectdetails-grid a.ajaxupdate').live('click', function() {
		$.fn.yiiGridView.update('Projectdetails-grid', {
			type: 'POST',
			url: $(this).attr('href'),
			success: function() {
				$.fn.yiiGridView.update('Projectdetails-grid');
			}
		});
		return false;
	});
	");
	?>
	<?php include "_btngroup.php"; ?>

	<?php include "_tableinfo_grafik_new.php"; ?>    

	<div class="box box-solid hidden-xs">
		<div class="box-header" data-widget="collapse"><i class="fa fa-bar-chart-o"></i>
			<h3 class="box-title">Project Timeline</h3>
			<div class="box-tools pull-right">
				<?php include "_timeline_label.php"; ?>
			</div>

			<div class="box-body">
				<?php include "_timeline.php"; ?>
			</div>
		</div>
	</div>

	<!-- Info box -->
	<div class="box box-solid">
		<div class="box-header" data-widget="collapse"><i class="fa fa-tasks"></i>
			<h3 class="box-title">Detail</h3>
			<div class="box-tools pull-right">
				<?php include "_tabledetail_label.php"; ?>
			</div>
		</div>
		<div class="box-body">
			<?php include "_tabledetail.php"; ?>
		</div><!-- /.box -->
	</div>

	<?php if(Yii::app()->user->record->level==1):?>

		<?php if($model->id_payment_type==0){ ?>

			<div class="box box-solid box-green">
				<div class="box-header" data-widget="collapse"><i class="fa fa-money"></i>
					<h3 class="box-title">Payment Term</h3>
					<div class="box-tools pull-right">
						<?php include "_tablepaymentterm_label.php"; ?>
					</div>
				</div>

				<div class="box-body">
					<?php include "_tablepaymentterm.php"; ?>						
				</div><!-- /.box -->
			</div>


			<div class="box box-solid">
				<div class="box-header" data-widget="collapse"><i class="fa fa-money"></i>
					<h3 class="box-title">Invoice History</h3>

					<div class="box-tools pull-right">
						<?php include "_tableinvoiceterm_history_label.php"; ?>
					</div>
				</div>

				<div class="box-body">
					<?php include "_tableinvoiceterm_history.php"; ?>
				</div><!-- /.box -->

				<?php }else{ ?>

					<div class="box box-solid">
						<div class="box-header" data-widget="collapse"><i class="fa fa-money"></i>
							<h3 class="box-title">Invoice History</h3>

							<div class="box-tools pull-right">
								
							</div>
						</div>

						<div class="box-body">
							<?php include "_tableinvoiceppm_history.php"; ?>
							<?php include "_detailpayment_ppm.php"; ?>
						</div><!-- /.box -->


						<?php } ?>

						
					<?php endif; ?>
