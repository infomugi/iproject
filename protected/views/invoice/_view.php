<?php
/* @var $this InvoiceController */
/* @var $data Invoice */
?>


<div class="col-xs-6">
<!-- Default box -->
<div class="box box-solid">
    <div class="box-header">
        <h3 class="box-title"><?php echo CHtml::link(CHtml::encode($data->invoice_number), array('view', 'id'=>$data->id_invoice)); ?></h3>

    </div>
    <div class="box-body">
		<?php echo CHtml::encode($data->description); ?><BR>
    <?php echo CHtml::encode($data->invoice_date); ?><BR>
<!-- 	<?php echo CHtml::encode($data->term); ?><BR>
 <?php echo CHtml::encode($data->note); ?><BR> -->

    </div><!-- /.box-body -->
</div><!-- /.box -->
</div>