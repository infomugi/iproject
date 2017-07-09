<?php
$this->pageTitle=Yii::app()->name . ' - Customer Report';
$dataProvider=new CActiveDataProvider('Customer');
$this->widget('EExcelWriter', array(
    'dataProvider' => $dataProvider,
    'title'        => 'EExcelWriter',
    'stream'       => FALSE,
    'fileName'     => 'Report Customer.xls',
    'columns'      => array(
					
        'customer_code',
        'name',
        'address',
        'phone',
						),
));

?>

<div class="pad margin no-print">
    <div class="alert alert-info" style="margin-bottom: 0!important;">
        <center>File has been created <b><a href="./Report Customer.xls"/>Download Report</a></b></center>
    </div>
</div>