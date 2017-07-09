<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	"General",
	);

$this->pageTitle='System Settings';
?>

<?php echo $this->renderPartial('_form_general', array('model'=>$model)); ?>