<?php
/* @var $this UseraccountsController */
/* @var $model Useraccounts */
$this->pageTitle='Update Account - ' . $model->fullname;
?>

<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>