<?php $this->widget('zii.widgets.CDetailView', array(
       'data'=>$model,
       'htmlOptions'=>array("class"=>"table table-hover dataTable table-responsive table-info "),
       'attributes'=>array(

              'current_status',
              'description',
              'start_date',
              'deadline',

              array(    
                     'name'=>'id_payment_type',
                     'type'=>'raw', 
                     'value'=>$model->id_payment_type == 1 ? "Pay Per Month" : "Termin",
                     'htmlOptions'=>array('width'=>'200px', 
                            'style' => 'a:active:#468847;text-align: left;color:#468847;')),  

              array(    
                     'name'=>'Amount',
                     'value'=>Yii::app()->numberFormatter->format('Rp ###,###,###',($model->amount)),
                     'htmlOptions'=>array('width'=>'200px', 
                            'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

              array(    
                     'name'=>'Term',
                     'visible'=>$model->id_payment_type != 1,
                     'value'=> Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM payment_term where id_project=$model->id_project")->queryScalar(). ' Termin',
                     'htmlOptions'=>array('width'=>'200px', 
                            'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

              array(    
                     'name'=>'Pay Per Month',
                     'visible'=>$model->id_payment_type == 1,
                     'value'=>Yii::app()->numberFormatter->format('Rp ###,###,###',($model->amount / $model->month)),
                     'htmlOptions'=>array('width'=>'200px', 
                            'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

              array(    
                     'name'=>'Month',
                     'visible'=>$model->id_payment_type == 1,
                     'value'=>$model->month. ' months',
                     'htmlOptions'=>array('width'=>'200px', 
                            'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

              ),
)); ?>