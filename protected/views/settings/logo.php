<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	"Logo",
	);

$this->pageTitle='Logo Settings';
?>

<?php echo $this->renderPartial('_form_logo', array('model'=>$model)); ?>