<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<section class="content">

    <div class="error-page">
        <h2 class="headline text-info"> <?php echo $code; ?></h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Error <?php echo $code; ?></h3>
            <p>
                <?php echo CHtml::encode($message); ?>.
            </p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->

</section><!-- /.content -->