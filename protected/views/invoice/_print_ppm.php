<center><h3 style="padding: 15px; background: #D3252E; color: #FFF;"><b>Invoice</b> <?php $model->Project->title?></h3></center>
<div class="row">
	<div class="col-xs-12">
		<div class="col-xs-4">
			<b>To: </b></BR>
			<b><?php echo $model->Customer->name?></b></BR>
			<?php echo $model->Customer->address?></BR>
			<?php echo $model->Customer->phone?></BR>

		</div>
		<div class="col-xs-4 text-right">
			Invoice Number:</BR>
			Invoice Date:</BR>
			Term:</BR>
			<b>Payment Due (max):</b></BR>
			Reference:</BR>


		</div>
		<div class="col-xs-4">
			<?php echo $model->invoice_number?></BR>
			<?php echo date("M, d-Y"); ?></BR>
			<?php echo $model->term?></BR>
			7 days</BR>
			<?php echo substr($model->invoice_number, 12,3);?>/PO/LOG/DD/<?php echo Yii::app()->dateFormatter->format("MM", $model->invoice_date)?>/<?php echo Yii::app()->dateFormatter->format("yyy", $model->invoice_date)?></BR>
			posted on <?php echo Yii::app()->dateFormatter->format("MMM, dd-yyy", $model->invoice_date)?></BR>


		</div>
	</div>
</div>

<!-- / end client details section -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'invoice-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass' => 'table table-bordered',
	'summaryText'=>'',
	'columns'=>array(

		array(
			'header'=>'Description',
			'value'=>'$data->description',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: left;')),

		array(    
			'header'=>'Sub Total (Rp)',
			//'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data->project->amount)',
			'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",($data->Project->amount / $data->Project->month))',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: left;')),
		),

		)); ?>



		<div class="row text-right">
			<div class="col-xs-2 col-xs-offset-7">
				<p>
					<strong>
						Total : <br>
						Dicsount : <br>
					</strong>
				</p>
			</div>
			<div class="col-xs-3">
				<strong>
					<?php echo Yii::app()->numberFormatter->format("Rp ###,###,###",($model->Project->amount / $model->Project->month)); ?> <br>
					<?php echo Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount / $model->Project->month) / 100 * $model->discount); ?> (<?php $model->discount; ?> % )
				</strong>
			</div>
		</div>
		<div class="row text-right">
			<div class="col-xs-2 col-xs-offset-7">
				<p>
					<strong>
						Grand Total : <br>
					</strong>
				</p>
			</div>
			<div class="col-xs-3">
				<strong>
					<?php echo Yii::app()->numberFormatter->format('Rp ###,###,###',($model->Project->amount / $model->Project->month)- ((($model->Project->amount / $model->Project->month) / 100) * $model->discount)); ?> <br>
				</strong>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-4">
					<b>Payable to</b></BR>
					Account holder:</BR>
					Bank / branch:</BR>
					Account number:</BR>
					Account  name:</BR>

				</div>
				<div class="col-xs-4">
					<b><?php echo $model->Bank->bank_name?></b></BR>
					<?php echo $model->Bank->account_holder?></BR>
					<?php echo $model->Bank->bank_branch?></BR>
					<?php echo $model->Bank->account_number?></BR>
					<?php echo $model->Bank->account_name?></BR>

				</div>
			</div>
		</div>

		<HR>

			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-6">
						<b>Thank You</BR>
							Sincerely,</b></BR>
						</div>
						<div class="col-xs-6">
						</div>
					</div>
				</div>
			</BR></BR></BR>
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-6">
						Mugi Rachmat, ST., MTCNA., MOS., CCNA</BR>
						<small> Chief Executive Officer</small></BR>
					</div>
					<div class="col-xs-6">
					</div>
				</div>
			</div>
		</BR></BR></BR>


		<div class="row">
			<div class="col-xs-12">

				<div class="col-xs-6 text-left">
					<small>*Note : <?php echo $model->note?></small></BR>
				</div>

				<div class="col-xs-6 text-right">
					<small>Printed By : <?php echo Yii::app()->user->record->fullname;?>, Date : <?php echo date("d/m/Y h:m:s"); ?></small></BR>
				</div>

			</div>
		</div>