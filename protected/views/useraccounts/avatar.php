<?php
/* @var $this UseraccountsController */
/* @var $model Useraccounts */
$this->pageTitle='Update Avatar - ' . $model->fullname;
?>

<?php echo $this->renderPartial('_form_avatar', array('model'=>$model)); ?>