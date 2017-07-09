<?php
/* @var $this ProjectController */
/* @var $model Project */
$this->pageTitle='Edit Project - ' . $model->title;
?>

<?php echo $this->renderPartial('_form_update_month',array('model'=>$model)); ?>