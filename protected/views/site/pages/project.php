<?php
$this->pageTitle=Yii::app()->name . ' - Project Report';
$dataProvider=new CActiveDataProvider('Project');
$this->widget('EExcelWriter', array(
    'dataProvider' => $dataProvider,
    'title'        => 'EExcelWriter',
    'stream'       => FALSE,
    'fileName'     => 'Report Project.xls',
    'columns'      => array(
					
        'start_date',
        'deadline',
        'title',

        array(    
              'header'=>'Payment Method',
              'value'=>'$data->id_payment_type == 1 ? "Pay Per Month" : "Termin"',
              'htmlOptions'=>array('width'=>'200px', 
              'style' => 'a:active:#468847;text-align: left;color:#468847;')),  

               array(    
              'header'=>'Amount',
              'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data->amount)',
              'htmlOptions'=>array('width'=>'200px', 
              'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

              // array(    
              // 'header'=>'Term',
              // 'visible'=>'$data->id_payment_type != 1',
              // 'value'=>'Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM payment_term where id_project=$data->id_project")->queryScalar(). " Termin"',
              // 'htmlOptions'=>array('width'=>'200px', 
              // 'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

              // array(    
              // 'header'=>'Pay Per Month',
              // 'visible'=>'$data->id_payment_type == 1',
              // //'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",($data->amount / $data->month))',
              // 'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data->amount / $data->month)',
              // 'htmlOptions'=>array('width'=>'200px', 
              // 'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

              // array(    
              // 'header'=>'Month',
              // 'visible'=>'$data->id_payment_type == 1',
              // 'value'=>'$data->month. " months"',
              // 'htmlOptions'=>array('width'=>'200px', 
              // 'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

            ),
));

?>

<div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <center>File has been created <b><a href="./Report Project.xls"/>Download Report</a></b></center>
                    </div>
                </div>