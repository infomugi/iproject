<?php
/* @var $this OrdersController */
/* @var $data Orders */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode("Order - ". $data->order_id), array('view', 'id'=>$data->id_order)); ?>
				<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$data,
					'htmlOptions'=>array("class"=>"table"),
					'attributes'=>array(
						'registration_date',
						'expired_date',
						array(
							'name'=>'product_id',
							'value'=>$data->Product->name,
							),
						array(
							'name'=>'customer_id',
							'value'=>$data->Customer->name,
							),
						array(
							'name'=>'payment_cycle',
							'value'=>Orders::model()->cycle($data->payment_cycle),
							),
						array(
							'name'=>'status',
							'value'=>Useraccounts::model()->status($data->status),
							),

						),
						)); ?>

					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
