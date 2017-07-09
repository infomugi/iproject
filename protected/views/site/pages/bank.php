<?php
$this->pageTitle=Yii::app()->name . ' - Payment Bank Report';
$dataProvider=new CActiveDataProvider('PaymentBank');
$this->widget('EExcelWriter', array(
    'dataProvider' => $dataProvider,
    'title'        => 'EExcelWriter',
    'stream'       => FALSE,
    'fileName'     => 'Report Bank Account.xls',
    'columns'      => array(
					
          'bank_name',
          'bank_branch',
          'account_holder',
          'account_number',
          'account_name',

        ),
));

?>

<div class="pad margin no-print">
<div class="alert alert-info" style="margin-bottom: 0!important;">
          <center>File has been created, <b><a href="./Report Bank Account.xls"/>Download Report</a></b></center>
        </div>
</div>