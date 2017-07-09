<?php
/* @var $this ProjectController */
/* @var $model Project */
$this->pageTitle='Add Project';
?>

<?php echo $this->renderPartial('_form_create',array(
	'model'=>$model,
	'Projectdetail' => $Projectdetail,
	'validatedMembers' => $validatedMembers,
	'PaymentTerm' => $PaymentTerm,
	'validatedPaymentTerm' => $validatedPaymentTerm,
	));
?>