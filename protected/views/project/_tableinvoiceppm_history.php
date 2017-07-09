<?php 
$ppmproject = Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar();
if($ppmproject>($model->month)):
  ?> 

<div class="pad margin no-print">
  <div class="alert alert-warning" style="margin-bottom: 0!important;">
    <b>Please fix:</b> Your invoice more than set as project.
  </div>
</div>

<?php
endif;
?>
<div class="table-responsive">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'invoice-grid',
    'dataProvider'=>$Invoices,
    'itemsCssClass' => 'table table-hover dataTable table-success',
    'summaryText'=>'',
    'columns'=>array(

      array(
        'header'=>'Invoice Number',
        'type'=>'raw', 
        'value'=>'CHtml::link($data->invoice_number, array("invoice/view", "id"=>$data->id_invoice))',
        'htmlOptions'=>array('width'=>'70px', 
          'style' => 'text-align: left;')),

      array(
        'header'=>'Description',
        'value'=>'$data->description',
        'htmlOptions'=>array('width'=>'900px', 
          'style' => 'text-align: left;')),

      array(
        'header'=>'Print',
        'type'=>'raw', 
        'visible'=>Yii::app()->user->record->level==1,
        'value'=>'CHtml::link("Print", array("invoice/print", "id"=>$data->id_invoice))',
        'htmlOptions'=>array('width'=>'0px', 
          'style' => 'text-align: left;')),

      array(
        'header'=>'',
        'type'=>'raw',
        'visible'=>Yii::app()->user->record->level==1,
        'value'=>'CHtml::link("X", array("invoice/removeinvoice", "id"=>$data->id_invoice), array("class"=>"ajaxupdate3","title"=>"Remove Invoice"));',
        ),   


      ),

      )); ?>
    </div>

    <?php 
    if($ppmproject<($model->month)):
      echo CHtml::link('<i class="fa fa-plus icon-white"></i> Create Invoice',
        array('invoice/createppm', 'project'=>$model->id_project, 'customer'=>$model->id_customer, 'paymentppm'=>$model->id_payment_type),
        array('class' => 'btn btn-default pull-right'));
    endif;
    ?>

  </BR></BR></BR>


