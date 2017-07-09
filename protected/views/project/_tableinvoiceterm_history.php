<div class="table-responsive">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'invoice-grid',
    'dataProvider'=>$Invoices,
    'itemsCssClass' => 'table table-hover dataTable table-success',
    'summaryText'=>'',
    'columns'=>array(

      array(
        'header'=>'No',
        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        'htmlOptions'=>array('width'=>'10px', 
          'style' => 'text-align: left;')),

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


