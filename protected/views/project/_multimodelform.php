<?php
$memberFormConfig= array(
	'elements'=>array(
		'member'=>array(
			'type'=>'text',
			'maxlength'=>40,
			'class' => 'form-control span2',
			'placeholder' => 'Member Name'
			),
		'job'=>array(
			'type'=>'text',
			'maxlength'=>40,
			'class' => 'form-control span2',
			'placeholder' => 'Job Desc'
			),
		'status'=>array(
			'type'=>'dropdownlist',
			'items'=>array(''=>'Project Status',0=>'Start',1=>'Done'),
			'class' => 'form-control',
			),

		)
	);
$this->widget('application.extensions.MultiModelForm',array(
'id' => 'id', //the unique widget id
'formConfig' => $memberFormConfig, //the form configuration array
'model' => $Projectdetail, //instance of the form model
'validatedItems' => $validatedMembers,
'data' => $Projectdetail->findAll('id_project=:id_project', array(':id_project'=>$model->id_project)),
'sortAttribute' => 'id_projectdetail',
'hideCopyTemplate'=>true,
'clearInputs'=>false,
'tableView' => true, 
'addItemAsButton' => false,
'showAddItemOnError' => true, 

'fieldsetWrapper' => array('tag' => 'div',
	'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
	),

'addItemText' => '<div class="btn btn-info btn-flat btn-small btn-sm"><i class="icon-plus"></i> Add Project Detail</div>',
'removeHtmlOptions' => array('class' => 'btn btn-danger btn-flat btn-small', 'style' => 'margin-top: -13px;margin-bottom: -1px;'),

));
?> 
