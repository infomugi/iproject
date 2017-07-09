<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	"Theme",
	);

$this->pageTitle='Theme Settings';
?>

<?php echo $this->renderPartial('_form_theme', array('model'=>$model)); ?>