<?php
/* @var $this UseraccountsController */
/* @var $model Useraccounts */
$this->pageTitle='Assign Account - ' . $model->fullname;
?>

<?php echo $this->renderPartial('_form_level', array('model'=>$model)); ?>