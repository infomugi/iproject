<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	"Invoice",
	);

$this->pageTitle='Invoice Settings';
?>

<?php echo $this->renderPartial('_form_invoice', array('model'=>$model)); ?>