<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#active" data-toggle="tab">Detail Project</a></li>
		<li class=""><a href="#out" data-toggle="tab">Payment</a></li>
		<li class=""><a href="#archived" data-toggle="tab">Invoice</a></li>

		<li class="pull-right"><a class="text-muted"><i class="fa fa-gear"></i></a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="active">
			<div class="box-header">
				<h3 class="box-title"></h3>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive">
				<?php include "_tabledetail.php"; ?>
			</div><!-- /.box-body -->
		</div><!-- /.tab-pane -->

		<div class="tab-pane" id="out">
			<div class="box-header">
				<h3 class="box-title"></h3>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive">
				<?php if($model->id_payment_type == 0){?>

			</div><!-- /.box-body -->
		</div><!-- /.tab-pane -->

		<div class="tab-pane" id="archived">
			<div class="box-header">
				<h3 class="box-title"></h3>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive">

			</div><!-- /.box-body -->
		</div><!-- /.tab-pane -->

	</div><!-- /.tab-content -->
</div>