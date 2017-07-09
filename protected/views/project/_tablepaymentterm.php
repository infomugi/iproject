
<?php 
$percentproject = Yii::app()->db->createCommand("SELECT SUM(percent) FROM term where id_project=$model->id_project")->queryScalar();
if($percentproject>100):
      ?> 

<div class="pad margin no-print">
      <div class="alert alert-warning" style="margin-bottom: 0!important;">
            <b>Please fix:</b> Your percentage greater than 100.
      </div>
</div>

<?php
endif;
?>

<div class="table-responsive">
      <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'PaymentTerms-grid',
            'itemsCssClass' => 'table table-hover dataTable table-warning',
            'dataProvider'=>$PaymentTerms,
            'summaryText'=>'',
            'columns'=>array(

                  array(
                        'header'=>'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                        'htmlOptions'=>array('width'=>'10px', 
                              'style' => 'text-align: left;')),

                  array(
                        'header'=>'Percent',
                        'value'=>'$data->percent . "%"',
                        'htmlOptions'=>array('width'=>'10px', 
                              'style' => 'text-align: left;')),

                  array(
                        'header'=>'Term Date',
                        'value'=>'$data->term_date',
                        'htmlOptions'=>array('width'=>'10px', 
                              'style' => 'text-align: left;')),

                  array(
                        'header'=>'Subtotal',
                        'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data->Project->amount * $data->percent / 100)',
                        'htmlOptions'=>array('width'=>'10px', 
                              'style' => 'text-align: left;')),

                  array(    
                        'header'=>'Edit',
                        'type'=>'raw', 
                        'visible'=>Yii::app()->user->record->level==1,
                        'value'=>'CHtml::link($data->status == 0 ? "" : "Cancel", array("term/cancel", "id"=>$data->id_payment_type, "id_project"=>$data->id_project))',
                        'sortable' => TRUE,
                        'htmlOptions'=>array('width'=>'30px')), 

                  array(    
                        'header'=>'Status Payment',
                        'type'=>'raw', 
                        'visible'=>Yii::app()->user->record->level==1,
                        'value'=>'$data->term_date < date("d-m-Y") ? CHtml::link($data->status == 1 ? "Paid" : "Unpaid", array("term/done", "id"=>$data->id_payment_type, "id_project"=>$data->id_project)) : "-"',
                        'sortable' => TRUE,
                        'htmlOptions'=>array('width'=>'10px','style'=>'font-weight:700;')), 

                  array(
                        'header'=>'Invoice',
                        'type'=>'raw', 
                        'visible'=>Yii::app()->user->record->level==1,
                        'value'=>'$data->term_date < date("d-m-Y") ? CHtml::link("Create Invoice", array("invoice/createterm", "project"=>$data->id_project, "customer"=>$data->Project->id_customer, "paymentterm"=>$data->id_payment_type, "percent"=>$data->percent, "amount"=>$data->Project->amount * $data->percent / 100, "type"=>"Payment $data->percent of 100 %")) : "Unable to Create" ',
                        'htmlOptions'=>array('width'=>'0px', 
                              'style' => 'text-align: left;')),

                  array(
                        'header'=>'',
                        'type'=>'raw',
                        'visible'=>Yii::app()->user->record->level==1,
                        'value'=>'CHtml::link("X", array("term/removeterm", "id"=>$data->id_payment_type), array("class"=>"ajaxupdate2","title"=>"Remove Term"));',
                        ),   

                  ),

                  )); ?>
            </div>


            <?php 
            if($percentproject<100):
                  echo CHtml::link('<i class="fa fa-plus icon-white"></i> Payment Term',
                        array('term/create', 'projectid'=>$model->id_project),
                        array('class' => 'btn btn-default pull-right'));
            endif;
            ?>

            <BR><BR>    

