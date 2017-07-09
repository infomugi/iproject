<section class="content invoice">
	<div class="box box-solid">
		<div class="box-header" data-widget="collapse"><i class="fa fa-money"></i>
			<h3 class="box-title">Invoice</h3>

			<div class="box-tools pull-right no-print">
				<div class="label bg-yellow"><?php echo Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM term where id_project=$model->id_project")->queryScalar();?> Terms</div>
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
								'name'=>'Amount Project',
								'value'=>Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount)),
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

							array(    
								'name'=>'Terms',
								'value'=>$model->term. ' Terms',
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

							array(    
								'name'=>'Term Percent',
								'value'=>$model->Term->percent. ' %',
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 
							
							'type',

							array(    
								'name'=>'Amount Project',
								'value'=>Yii::app()->numberFormatter->format('Rp ###,###,###',($model->amount)),
								'htmlOptions'=>array('width'=>'200px', 
									'style' => 'a:active:#468847;text-align: left;color:#468847;')), 


							),
							)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'invoice-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass' => 'table table-bordered dataTable table-warning',
	'summaryText'=>'',
	'columns'=>array(

		array(
			'header'=>'Description',
			'value'=>'$data->description',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: left;')),

		array(    
			'header'=>'Sub Total (Rp)',
			'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",($data->Project->amount * $data->Term->percent / 100))',
			'htmlOptions'=>array('width'=>'200px', 
				'style' => 'a:active:#468847;text-align: left;')), 


		),

		)); ?>

		<!-- accepted payments column -->
		<div class="row">
			<div class="col-xs-6">

			</div><!-- /.col -->
			<div class="col-xs-6">
				<div class="table-responsive">
					<table class="table">
						<tbody><tr>
							<th style="width:50%">Sub Total:</th>
							<td><div class="text-orange"><?php echo Yii::app()->numberFormatter->format("Rp ###,###,###",($model->Project->amount * $model->Term->percent / 100)); ?> </div></td>
						</tr>
						<tr>
							<div class="text-orange"><th>Dicsount ( <?php echo $model->discount; ?> % )</th></div>
							<td><div class="text-orange"><?php echo Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount * $model->Term->percent / 100) / 100 * $model->discount); ?></td>
						</tr>
						<tr>
							<th>Grand Total:</th>
							<td><div class="text-orange"><?php echo Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount * $model->Term->percent / 100)- ((($model->Project->amount * $model->Term->percent / 100) / 100) * $model->discount)); ?></td>
						</tr>
					</tbody></table>
				</div>
			</div><!-- /.col -->
		</div>


	</div>
</div>
</section>