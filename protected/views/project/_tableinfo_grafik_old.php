<div class="row">
  <div class="col-lg-4 col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>
          Project
        </h3>
        <p> 
          Start : <b><?= $model->start_date ?></b></br>
          Deadline : <b><?= $model->deadline ?></b></br>
          Duration : <b><?php include "_countdate.php"; ?></b></br>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-calendar"></i>
      </div>
      <a class="small-box-footer">
        <i class="ion ion-refreshing"></i>
      </a>
    </div>
  </div><!-- ./col -->

  <div class="col-lg-4 col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>
          Payment
        </h3>
        <p> 
          Method : <b><?= $model->id_payment_type == 1 ? "Pay Per Month" : "Termin" ?></b></br>
          Amount : <b><?= Yii::app()->numberFormatter->format('Rp ###,###,###',($model->amount)) ?></b></br>
          Status : <b><?= $model->status == 1 ? "Complete" : "On Progress" ?></b></br>

        </p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
      <a class="small-box-footer">
        <i class="ion ion-refreshing"></i>
      </a>
    </div>
  </div><!-- ./col -->

  <div class="col-lg-4 col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>
          <?= $model->id_payment_type == 1 ? "PPM" : "Termin" ?>
        </h3>
        <p> 


          Invoice : <b><?php echo Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar();?> Printed</b></br>
          <?php if ($model->id_payment_type == 1){
            ?>
            PPM : <b><?= Yii::app()->numberFormatter->format('Rp ###,###,###',($model->amount / $model->month)) ?></b></br>
            Month : <b><?= $model->month ?> Months</b>
            <?php
          }else{ ?>
          Term : <b><?= Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM payment_term where id_project=$model->id_project")->queryScalar(). ' Termin' ?></b></br>

          Percent : <?php
          $sql = 'SELECT percent FROM payment_term where id_project = ' . $model->id_project .'';
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
      <a class="small-box-footer">
        <i class="ion ion-refreshing"></i>
      </a>
    </div>
  </div><!-- ./col -->
</div>                    
