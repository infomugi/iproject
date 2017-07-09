<?php
/* @var $this GroupsController */
/* @var $data Groups */
?>

<div class="box box-<?PHP if($data->status==1){ echo "success";}else{echo "warning";}?>">
    <div class="box-header">
        <i class="fa fa-eye"></i>
        <h3 class="box-title">
            <?php echo CHtml::link(CHtml::encode($data->Project->title), array('project/view', 'id'=>$data->group)); ?>
        </h3>

        <div class="box-tools pull-left">

            <?PHP if($data->status == 1){ ?>
            <div class="label label-success" data-toggle="tooltip" title="" data-original-title="<?PHP echo "Active"; ?>"><i class="fa fa-check-square"></i> <?PHP echo "Active"; ?></div>
            <?php }else{ ?>
            <div class="label label-warning" data-toggle="tooltip" title="" data-original-title="<?PHP echo "Non Active"; ?>"><i class="fa fa-minus-square"></i> <?PHP echo "Non Active"; ?></div>
            <?php } ?>
            <div class="label label-info" data-toggle="tooltip" title="" data-original-title="<?PHP echo Useraccounts::model()->status($data->User->level); ?>"><i class="fa fa-user"></i> <?PHP echo $data->User->fullname; ?></div> 

        </div>

        <div class="box-tools pull-right">
           <div class="btn-group">

            <?PHP if($data->status == 1){ ?>

            <?php echo CHtml::link('<i class="fa fa-square text-green"></i>',
               array('active','id'=>$data->id_group),
               array('class' => 'btn btn-default btn-sm active'));
               ?>

               <?php echo CHtml::link('<i class="fa fa-square text-red"></i>',
                array('nonactive','id'=>$data->id_group),
                array('class' => 'btn btn-default btn-sm'));
                ?>

                <?php echo CHtml::link('<i class="fa fa-edit"></i>',
                    array('update','id'=>$data->id_group),
                    array('class' => 'btn btn-default btn-sm'));
                    ?>


                    <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',
                        array('delete','id'=>$data->id_group),
                        array('class' => 'btn btn-default btn-sm'));
                        ?>
                        <?php }else{ ?>

                        <?php echo CHtml::link('<i class="fa fa-square text-green"></i>',
                            array('active','id'=>$data->id_group),
                            array('class' => 'btn btn-default btn-sm'));
                            ?>

                            <?php echo CHtml::link('<i class="fa fa-square text-red"></i>',
                                array('nonactive','id'=>$data->id_group),
                                array('class' => 'btn btn-default btn-sm active'));
                                ?>


                                <?php echo CHtml::link('<i class="fa fa-edit"></i>',
                                    array('update','id'=>$data->id_group),
                                    array('class' => 'btn btn-default btn-sm'));
                                    ?>


                                    <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',
                                        array('delete','id'=>$data->id_group),
                                        array('class' => 'btn btn-default btn-sm'));
                                        ?>


                                        <?php } ?>




                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-header -->
