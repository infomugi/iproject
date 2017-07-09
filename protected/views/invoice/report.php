<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Transaksi Pemesanan',
	);

$this->pageTitle='Report Invoice';
$from=$_REQUEST['startDate'];
$until=$_REQUEST['endDate'];
$statusInvoice=$_REQUEST['statusInvoice'];

$tampa = "'%"."$from"."%'";
$tampb = "'%"."$until"."%'";
$status = "'%"."$statusInvoice"."%'";
?>

<section class="col-xs-12">

	<CENTER>
		<H1><?php echo Yii::app()->db->createCommand("SELECT system_title FROM Settings where id_settings=1")->queryScalar(); ?></H1>
		<DIV style="line-height:5px;">
			<SMALL>
				<p><?php echo Yii::app()->db->createCommand("SELECT address FROM Settings where id_settings=1")->queryScalar(); ?> Phone <?php echo Yii::app()->db->createCommand("SELECT phone FROM Settings where id_settings=1")->queryScalar(); ?></p>
				<p>Email : <?php echo Yii::app()->db->createCommand("SELECT system_email FROM Settings where id_settings=1")->queryScalar(); ?></p>
			</SMALL>
		</DIV>
	</CENTER>
	<HR>
		<DIV style="background:#A7501D;color:#FFF;padding:10px 0;font-weight:700;text-align:center;">
			Laporan Tanggal : <?php echo($from);?> s/d <?php echo($until);?> - Status : <?PHP echo Invoice::model()->status($status); ?>
		</DIV>
		<?php
		$dataProvider = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'invoice_date >= ' . $tampa . ' AND invoice_date <= ' . $tampb . ' AND status='.$status
				)
			));

		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view_print',
			'summaryText'=>'',
			)); ?>

		</section>