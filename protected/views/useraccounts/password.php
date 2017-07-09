<?php
/* @var $this UseraccountsController */
/* @var $model Useraccounts */
$this->pageTitle='Edit Password - ' . $model->fullname;
?>

<?php echo $this->renderPartial('_form_password', array('model'=>$model)); ?>