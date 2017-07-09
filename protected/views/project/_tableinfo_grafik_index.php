<div class="row">
  <div class="col-lg-4 col-md-4 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-abu">
      <div class="inner">
        <h3>
          Project
        </h3>
        <p> 
          Start : <b><?php echo $data->start_date ?></b></br>
          Deadline : <b><?php echo $data->deadline ?></b></br>
          Duration : <b><?php include "_countdate_index.php"; ?></b></br>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-calendar"></i>
      </div>
    </div>
  </div><!-- ./col -->

  <div class="col-lg-4 col-md-4 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-abu">
      <div class="inner">
        <h3>
          Payment
        </h3>
        <p> 
          Method : <b><?php echo $data->id_payment_type == 1 ? "Pay Per Month" : "Termin" ?></b></br>
          Amount : <b><?php echo Yii::app()->numberFormatter->format('Rp ###,###,###',($data->amount)) ?></b></br>
          Status : <b><?php echo $data->status == 1 ? "Complete" : "On Progress" ?></b></br>

        </p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
    </div>
  </div><!-- ./col -->

  <div class="col-lg-4 col-md-4 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-abu">
      <div class="inner">
        <h3>
          <?php echo $data->id_payment_type == 1 ? "PPM" : "Termin" ?>
        </h3>
        <p> 

          Invoice : <b><?php echo Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$data->id_project")->queryScalar();?> Printed</b></br>
          <?php if ($data->id_payment_type == 1){
            ?>
            PPM : <b><?php echo Yii::app()->numberFormatter->format('Rp ###,###,###',($data->amount / $data->month)) ?></b></br>
            Month : <b><?php echo $data->month ?> Months</b>
            <?php
          }else{ ?>
          Term : <b><?php echo Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM term where id_project=$data->id_project")->queryScalar(). ' Termin' ?></b></br>

          Percent : <?php
          $sql = 'SELECT percent FROM term where id_project = ' . $data->id_project .'';
          $rows = Yii::app()->db->createCommand($sql)->queryAll();
          $idx = 1;

          if(!empty($rows))
            foreach ($rows as $row)
            {

              echo '<span class="label label-success" data-original-title="'.($row['percent']) .'%" data-toggle="tooltip">'.($row['percent']).'%</span> ';
              $idx++;
            }
            ?>

            <?php } ?>
          </br>



        </p>
      </div>
      <div class="icon">
        <i class="ion ion-card"></i>
      </div>
    </div>
  </div><!-- ./col -->
</div>                    
