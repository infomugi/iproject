<?php
/* @var $this ProjectController */
/* @var $model Project */
$this->pageTitle='Update Project - ' . $model->title;
?>

<?php echo $this->renderPartial('_form_update',array(
	'model'=>$model,
	'Projectdetail' => $Projectdetail,'validatedMembers' => $validatedMembers,
	'PaymentTerm' => $PaymentTerm,'validatedPaymentTerm' => $validatedPaymentTerm,
	));
?>