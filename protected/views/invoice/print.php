<?php 
$this->pageTitle='Invoice - ' . $model->invoice_number;

if($model->Project->id_payment_type==1){ 
	include "_print_ppm.php"; 
}else{
	include "_print_term.php"; 
} 
?>