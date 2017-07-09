<?php
/* @var $this InvoiceController */
/* @var $model Invoice */

$PaymentPPM = new CActiveDataProvider('Invoice', array(
  'criteria' => array(
    'condition'=>'id_payment_type = 1'
    )
  )); 

$PaymentTerm = new CActiveDataProvider('Invoice', array(
  'criteria' => array(
    'condition'=>'id_payment_type != 1'
    )
  )); 
  ?>

  <?php
  echo CHtml::link('List',
    array('index'),
    array('class' => 'btn btn-success btn-flat'));
    ?>

    <?php
    echo CHtml::link('Export to Excel',
      array('site/page&view=invoice'),
      array('class' => 'btn btn-success btn-flat'));
      ?>

      <HR>



        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
          <ul class="nav nav-tabs pull-right">
            <li class=""><a href="#1" data-toggle="tab">Pay Per Month</a></li>
            <li class="active"><a href="#2" data-toggle="tab">Termin</a></li>
            <li class="pull-left header"><i class="fa fa-inbox"></i> Invoice</li>
          </ul>
          <div class="tab-content no-padding">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane" id="1" style="position: relative;">
              <div class="table-responsive">
               <?php $this->widget('zii.widgets.grid.CGridView', array(
                 'id'=>'invoice-grid',
                 'dataProvider'=>$PaymentPPM,
                // 'filter'=>$model,
                 'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
                 'columns'=>array(

                   array(
                    'header'=>'No',
                    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                    'htmlOptions'=>array('width'=>'10px', 
                      'style' => 'text-align: center;')),

                   array(
                    'header'=>'Invoice Number',
                    'type'=>'raw', 
                    'value'=>'CHtml::link($data->invoice_number, array("invoice/view", "id"=>$data->id_invoice))',
                    'htmlOptions'=>array('width'=>'200px', 
                      'style' => 'text-align: left;')),

                   array(    
                    'header'=>'Total (Rp)',
                    'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data->Project->amount)',
                    'htmlOptions'=>array('width'=>'180px', 
                      'style' => 'text-align: left;')),

                   array(    
                    'name'=>'month',
                    'type'=>'raw', 
                    'visible'=>'$data->Project->id_payment_type !== 1',
                    'value'=>'$data->Project->month == 1 ? "-" : $data->Project->month',
                    'htmlOptions'=>array('width'=>'60px', 
                      'style' => 'a:active:#468847;text-align: left;')), 

                   array(    
                    'name'=>'Pay Per Month',
                    'visible'=>'$data->Project->id_payment_type !== 1',
                    'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",($data->Project->amount / $data->Project->month))',
                    'htmlOptions'=>array('width'=>'200px', 
                      'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

                   array(
                    'header'=>'Print',
                    'type'=>'raw', 
                    'value'=>'CHtml::link("Print", array("invoice/print", "id"=>$data->id_invoice))',
                    'htmlOptions'=>array('width'=>'200px', 
                      'style' => 'text-align: left;')),


                   ),
                   )); ?>
                 </div>

               </div>

               <div class="chart tab-pane active" id="2" style="position: relative;">

                <div class="table-responsive">
                 <?php $this->widget('zii.widgets.grid.CGridView', array(
                   'id'=>'invoice-grid',
                   'dataProvider'=>$PaymentTerm,
                    // 'filter'=>$model,
                   'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
                   'columns'=>array(
                     array(
                      'header'=>'No',
                      'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                      'htmlOptions'=>array('width'=>'10px', 
                        'style' => 'text-align: center;')),

                     array(
                      'header'=>'Invoice Number',
                      'type'=>'raw', 
                      'value'=>'CHtml::link($data->invoice_number, array("invoice/view", "id"=>$data->id_invoice))',
                      'htmlOptions'=>array('width'=>'200px', 
                        'style' => 'text-align: left;')),


                     array(    
                      'header'=>'Total (Rp)',
                      'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data->Project->amount)',
                      'htmlOptions'=>array('width'=>'200px', 
                        'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

                     array(    
                      'name'=>'Terms',
                      'value'=>'$data->term. " Terms"',
                      'htmlOptions'=>array('width'=>'100px', 
                        'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

                     array(    
                      'name'=>'Percent',
                      'value'=>'$data->Term->percent. " %"',
                      'htmlOptions'=>array('width'=>'100px', 
                        'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

                     array(
                      'name'=>'Grand Total',
                      'htmlOptions'=>array('width'=>'200px'),
                      'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",($data->Project->amount * $data->Term->percent / 100)- ((($data->Project->amount * $data->Term->percent / 100) / 100) * $data->discount));'
                      ),                       


                     array(
                      'header'=>'Print',
                      'type'=>'raw', 
                      'value'=>'CHtml::link("Print", array("invoice/print", "id"=>$data->id_invoice))',
                      'htmlOptions'=>array('width'=>'200px', 
                        'style' => 'text-align: left;')),

                     ),
                     )); ?>
                   </div>

                 </div>

               </div>
             </div><!-- /.nav-tabs-custom -->

