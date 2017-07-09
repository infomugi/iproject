<?php
/* @var $this UseraccountsController */
/* @var $data Useraccounts */
?>

<div class="col-xs-12 col-md-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title"><?php echo CHtml::link(CHtml::encode($data->fullname), array('profile', 'name'=>$data->username)); ?></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body" style="text-align:center;">
			
			
			<div style="padding:5px;margin-top:10px">
				<?php echo CHtml::image(Yii::app()->request->baseurl.'/dokumen/avatar/'.$data->image,"Foto Profile",array("width"=>130,"class"=>"img-circle")); ?>
			</div>
			
			<b class="hidden-xs"><?php echo $data->email; ?></b>
			<br /> 
			<?php     
			if($data->level == 4)
			{
				?>
				<span class="label label-info"><?php echo Useraccounts::model()->level($data->level); ?></span> - <span class="label label-success"><?php echo $data->status == 0 ? "Belum Diverifikasi" : "Verifikasi"; ?></span>
				<br /> 
				<?php   
			}  
			else{
				?>
				<span class="label label-danger"><?php echo Useraccounts::model()->level($data->level); ?></span>
				<?php
			}
			?>

		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div>

