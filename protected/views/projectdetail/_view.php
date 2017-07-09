<?php
/* @var $this ProjectdetailController */
/* @var $data Projectdetail */

?>

<div class="box box-<?PHP if($data->status==0){	echo "warning";}else{echo "success";}?>">
<div class="box-header">
	<i class="ion ion-clipboard"></i>
	<h3 class="box-title">
		Task <b><?php echo CHtml::link(CHtml::encode($data->member . " - " . $data->job), array('view', 'id'=>$data->id_projectdetail)); ?></b>
	</h3>
	<div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status Task">
		<?PHP if($data->status == 0){ ?>
		<small class="label label-warning"><i class="fa fa-clock-o"></i> 
			<?PHP echo $data->status == 0 ? "Start" : "Done"; ?>
		</small>
		<?php }else{ ?>
		<small class="label label-success"><i class="fa fa-clock-o"></i> 
			<?PHP echo $data->status == 0 ? "Start" : "Done"; ?>
		</small>
		<?php } ?>
	</div>
</div>
	</div><!-- /.box-header -->