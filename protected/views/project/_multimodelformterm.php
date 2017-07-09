</BR>

<?php
$memberFormTermin= array(
'elements'=>array(
	
			'percent'=>array(
				'type'=>'text',
				'maxlength'=>40,
				'class' => 'form-control span5',
				'placeholder' => 'Percent'
				),

			'status'=>array(
				'type'=>'dropdownlist',
				'items'=>array(''=>'Payment Terms Status',0=>'Not Paid',1=>'Paid'),
				'class' => 'form-control',
				),
)
);
$this->widget('ext.multimodelform.MultiModelForm',array(
'id' => 'id_payment_type', //the unique widget id
'formConfig' => $memberFormTermin, //the form configuration array
'model' => $PaymentTerm, //instance of the form model
'data' => $PaymentTerm->findAll('id_project=:id_project', array(':id_project'=>$model->id_project)),
			'sortAttribute' => 'id_paymentterm',
	        'hideCopyTemplate'=>true,
	        'clearInputs'=>false,
	        'tableView' => true, 
	        'addItemAsButton' => false,
	        'showAddItemOnError' => false, 

	        'fieldsetWrapper' => array('tag' => 'div',
	            'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
	        ),

	        'addItemText' => '<div class="btn btn-info btn-flat btn-small btn-sm"><i class="icon-plus"></i> Add Payment Terms</div>',
			'removeHtmlOptions' => array('class' => 'btn btn-danger btn-flat btn-small', 'style' => 'margin-top: -13px;margin-bottom: -1px;'),

));
?> 

<?php
/*
	$memberFormTermin = array(

		  'elements'=>array(
			
			'percent'=>array(
				'type'=>'text',
				'maxlength'=>40,
				'class' => 'form-control span5',
				'placeholder' => 'Percent'
				),

			'status'=>array(
				'type'=>'dropdownlist',
				'items'=>array(''=>'Payment Terms Status',0=>'Not Paid',1=>'Paid'),
				'class' => 'form-control',
				//'style'=>'display:none',
				),

		));

   echo CHtml::script('function alertIds(newElem,sourceElem){alert(newElem.attr("id"));alert(sourceElem.attr("id"));}');

	$this->widget('ext.multimodelform.MultiModelForm',array(
			'id' => 'id_payment_type', //the unique widget id
			'formConfig' => $memberFormTermin, //the form configuration array
			'model' => $PaymentTerm, //instance of the form model
			'validatedPaymentTerm' => $validatedPaymentTerm,
			//'data' => $paymentterm->findAll('id_project=:id_project', array(':id_project'=>$model->id_project)),
			'data' => empty($validatedPaymentTerm) ? $paymentterm->findAll(
                                             array('condition'=>'id_project=:id_project',
                                                   'params'=>array(':id_project'=>$model->id_project),
                                                   'order'=>'status')) : null,
	        'sortAttribute' => 'id_paymentterm',
	        'hideCopyTemplate'=>true,
	        'clearInputs'=>false,
	        'tableView' => true, 
	        'addItemAsButton' => false,
	        'showAddItemOnError' => false, 

	        'fieldsetWrapper' => array('tag' => 'div',
	            'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
	        ),

	        'addItemText' => '<div class="btn btn-info btn-flat btn-small btn-sm"><i class="icon-plus"></i> Add Payment Terms</div>',
			'removeHtmlOptions' => array('class' => 'btn btn-danger btn-flat btn-small', 'style' => 'margin-top: -13px;margin-bottom: -1px;'),

			));
*/
?>