<?php
$this->pageTitle=Yii::app()->name . ' - Reports';
?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-abu">
            <div class="inner">
                <h3>
                    Project
                </h3>
            </div>
            <?php echo CHtml::link('<i class="fa fa-arrow-circle-down"></i> Download Project Report',array('site/page&view=project'),array('class'=>'small-box-footer')); ?>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-abu">
            <div class="inner">
                <h3>
                 Invoice
             </h3>
         </div>
         <?php echo CHtml::link('<i class="fa fa-arrow-circle-down"></i> Download Invoice Report',array('site/page&view=invoice'),array('class'=>'small-box-footer')); ?>
     </div>
 </div><!-- ./col -->
 <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-abu">
        <div class="inner">
            <h3>
                Customer
            </h3>
        </div>
        <?php echo CHtml::link('<i class="fa fa-arrow-circle-down"></i> Download Customer Report',array('site/page&view=customer'),array('class'=>'small-box-footer')); ?>
    </div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-abu">
        <div class="inner">
            <h3>
                Accounts
            </h3>
        </div>
        <?php echo CHtml::link('<i class="fa fa-arrow-circle-down"></i> Download Accounts Report',array('site/page&view=bank'),array('class'=>'small-box-footer')); ?>
    </div>
</div><!-- ./col -->
</div>


<div class="col-xs-12" style="display:none;">
    <div class="col-xs-4">
        <label for="Project_Date_Range">Date  Range</label></div>   

        <form action="<?php echo $this->createUrl('invoice/search');?>" method="post">
            <div class="col-xs-4">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input class="form-control hasDatepicker" placeholder="Starting" id="tgl_awal" name="tgl_awal" type="text"> 
                    </div><!-- /.input group -->
                </div>
            </div>

            <div class="col-xs-4">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input class="form-control hasDatepicker" placeholder="Ending" id="tgl_akhir" name="tgl_akhir" type="text"> 
                    </div><!-- /.input group -->
                </div>
            </div>   
        </form>
    </div>