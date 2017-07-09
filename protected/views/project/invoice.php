    array(    
    'name'=>'Pay Per Month',
    'visible'=>'$data->project->id_payment_type !== 1',
    'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",($data->project->amount / $data->project->month))',
    'footer'=>"".Yii::app()->numberFormatter->format("Rp ###,###,###",'Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$data->id_project")->queryScalar() * ($data->project->amount / $data->project->month)'),
    'htmlOptions'=>array('width'=>'250px', 
    'style' => 'a:active:#468847;text-align: left;color:#468847;')), 

    <table class="table">
      <tbody><tr>
        <th style="width:50%">Sudah di Bayar:</th>
        <td><?php echo Yii::app()->numberFormatter->format("Rp ###,###,###",(Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar() * $model->amount / $model->month)); ?></td>
      </tr>
      <tr>
        <th>Belum di Bayar:</th>
        <td><?php echo Yii::app()->numberFormatter->format("Rp ###,###,###",($model->amount - Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar() * $model->amount / $model->month)); ?></td>
      </tr>
      <tr>
        <th>Total:</th>
        <td><?php echo Yii::app()->numberFormatter->format("Rp ###,###,###",$model->amount); ?></td>
      </tr>
    </tbody></table>
    