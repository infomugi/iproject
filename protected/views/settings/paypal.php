<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	"Paypal",
	);

$this->pageTitle='Paypal Settings';
?>

<?php echo $this->renderPartial('_form_paypal', array('model'=>$model)); ?>