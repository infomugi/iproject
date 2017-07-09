<section class="content invoice">
	<div class="box box-solid">
		<div class="box-header" data-widget="collapse"><i class="fa fa-money"></i>
			<h3 class="box-title">Invoice</h3>

			<div class="box-tools pull-right no-print">
				<div class="label bg-green"><?php echo Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar();?> Printed</div>
			</div>
		</div>
		<div class="box-body">

			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'htmlOptions'=>array("class"=>"table "),
				'attributes'=>array(

					'invoice_number',
					'invoice_date',

					array(    
						'name'=>'Project',
						'type'=>'raw', 
						'value'=>$model->Project->title,
						'sortable' => TRUE, 
						'htmlOptions'=>array('width'=>'30px')),

					array(    
						'name'=>'Customer',
						'type'=>'raw', 
						'value'=>$model->Customer->name,
						'sortable' => TRUE, 
						'htmlOptions'=>array('width'=>'30px')),

					array(    
						'name'=>'Created By',
						'type'=>'raw', 
						'value'=>$model->Useraccounts->fullname,
						'sortable' => TRUE, 
						'htmlOptions'=>array('width'=>'30px')),

					'note',


					),
					)); ?>

				</div><!-- /.box -->
			</div>


			<div class="box box-solid">
				<div class="box-header" data-widget="collapse"><i class="fa fa-money"></i>
					<h3 class="box-title">Payment</h3>
				</div>
				<div class="box-body">

					<?php $this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'htmlOptions'=>array("class"=>"table "),
						'attributes'=>array(

							array(    
								'name'=>'Payment Type',
								'type'=>'raw', 
								'value'=>$model->Project->id_payment_type == 1 ? "Pay Per Month" : "Termin",
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')),  

							array(    
								'name'=>'Amount',
								'value'=>Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount)),
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

							array(    
								'name'=>'Pay Per Month',
								'visible'=>$model->Project->id_payment_type == 1,
								'value'=>Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount / $model->Project->month)),
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

							array(    
								'name'=>'Month',
								'visible'=>$model->Project->id_payment_type == 1,
								'value'=>$model->Project->month. ' months',
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 


							array(    
								'name'=>'Terms',
								'visible'=>$model->Project->id_payment_type != 1,
								'value'=>$model->term. ' Terms',
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 


							),
							)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'invoice-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass' => 'table table-bordered dataTable table-success',
	'summaryText'=>'',
	'columns'=>array(

		array(
			'header'=>'Description',
			'value'=>'$data->description',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: left;')),

		array(    
			'header'=>'Sub Total (Rp)',
			'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",($data->Project->amount / $data->Project->month))',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: left;')),
		),

		)); ?>


		<BR>
			<!-- accepted payments column -->
			<div class="row">
				<div class="col-xs-6">

				</div><!-- /.col -->
				<div class="col-xs-6">
					<div class="table-responsive">
						<table class="table">
							<tbody><tr>
								<th style="width:50%">Sub Total:</th>
								<td><div class="text-green"><?php echo Yii::app()->numberFormatter->format("Rp ###,###,###",($model->Project->amount / $model->Project->month)); ?> </div></td>
							</tr>
							<tr>
								<div class="text-green"><th>Dicsount ( <?php echo $model->discount; ?> % )</th></div>
								<td><div class="text-green"><?php echo Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount / $model->Project->month) / 100 * $model->discount); ?></td>
							</tr>
							<tr>
								<th>Grand Total:</th>
								<td><div class="text-green"><?php echo Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount / $model->Project->month)- ((($model->Project->amount / $model->Project->month) / 100) * $model->discount)); ?></td>
							</tr>
						</tbody></table>
					</div>
				</div><!-- /.col -->
			</div>



		</section>