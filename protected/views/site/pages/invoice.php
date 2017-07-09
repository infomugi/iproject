<?php
$this->pageTitle=Yii::app()->name . ' - Invoice Report';
$dataProvider=new CActiveDataProvider('Invoice');
$this->widget('EExcelWriter', array(
    'dataProvider' => $dataProvider,
    'title'        => 'EExcelWriter',
    'stream'       => FALSE,
    'fileName'     => 'Report Invoice.xls',
    'columns'      => array(
					

            array(
            'header'=>'Invoice Date',
            'type'=>'raw', 
            'value'=>'$data->invoice_date',
            'htmlOptions'=>array('width'=>'50px', 
            'style' => 'text-align: left;')),

            array(
            'header'=>'Invoice Number',
            'type'=>'raw', 
            'value'=>'$data->invoice_number',
            'htmlOptions'=>array('width'=>'70px', 
            'style' => 'text-align: left;')),

            array(    
            'name'=>'Payment Type',
            'type'=>'raw', 
            'value'=>'$data->Project->id_payment_type == 1 ? "Pay Per Month" : "Termin"',
            'htmlOptions'=>array('width'=>'100px', 
            'style' => 'text-align: left;')), 

            array(    
            'header'=>'Project',
            'type'=>'raw', 
            'visible'=>'$data->Project->id_payment_type !== 1',
            'value'=>'$data->Project->title',
            'htmlOptions'=>array('width'=>'100px', 
            'style' => 'text-align: left;')),

            array(
            'header'=>'Description',
            'value'=>'$data->description',
            'htmlOptions'=>array('width'=>'900px', 
            'style' => 'text-align: left;')),

            ),
));

?>

<div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <center>File has been created <b><a href="./Report Project.xls"/>Download Report</a></b></center>
                    </div>
                </div>