<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	"Favicon",
	);

$this->pageTitle='Favicon Settings';
?>

<?php echo $this->renderPartial('_form_favicon', array('model'=>$model)); ?>