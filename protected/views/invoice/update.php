<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
$this->pageTitle='Update Invoice - ' . $model->invoice_number;
?>

<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>