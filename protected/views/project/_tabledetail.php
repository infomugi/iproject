<div class="table-responsive">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
   'id'=>'Projectdetails-grid',
   'itemsCssClass' => 'table table-hover dataTable table-danger',
   'dataProvider'=>$Projectdetails,
   'summaryText'=>'',
   'columns'=>array(

    array(
      'header'=>'No',
      'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
      'htmlOptions'=>array('width'=>'10px', 
        'style' => 'text-align: left;')),

    array(
      'header'=>'View',
      'type'=>'raw',
      'visible'=>Yii::app()->user->record->level==1 || Yii::app()->user->record->level==3,
      'value'=>'CHtml::link("Detail", array("projectdetail/view", "id"=>$data->id_projectdetail), array("class"=>"label label-info","title"=>"View Detail"));',
      'htmlOptions'=>array('width'=>'10px', 
        'style' => 'text-align: left;')),                         

    array(    
      'header'=>'Member',
      'type'=>'raw', 
      'value'=>'$data->member',
      'sortable' => TRUE, 
      'htmlOptions'=>array('width'=>'200px', 
        'style' => 'text-align: left;')),

    array(    
      'header'=>'Job',
      'type'=>'raw', 
      'value'=>'$data->job',
      'sortable' => TRUE, 
      'htmlOptions'=>array('width'=>'200px', 
        'style' => 'text-align: left;')),

    array(    
      'header'=>'Start Date',
      'type'=>'raw', 
      'visible'=>Yii::app()->user->record->level==1 || Yii::app()->user->record->level==3,
      'value'=>'CHtml::link($data->status == 1 ? "" : "Start", array("projectdetail/StartTask", "id"=>$data->id_projectdetail, "id_project"=>$data->id_project))',
      'sortable' => TRUE,
      'htmlOptions'=>array('width'=>'200px', 
        'style' => 'text-align: left;')), 

    array(    
      'header'=>'Edit',
      'type'=>'raw', 
      'visible'=>Yii::app()->user->record->level==1 || Yii::app()->user->record->level==3,
      'value'=>'CHtml::link($data->status == 0 ? "" : "Cancel", array("projectdetail/start", "id"=>$data->id_projectdetail, "id_project"=>$data->id_project))',
      'sortable' => TRUE,
      'htmlOptions'=>array('width'=>'200px', 
        'style' => 'text-align: left;')),


    array(    
      'header'=>'Progress',
      'type'=>'raw', 
      'value'=>function($data){
        return '
        <div class="label label-'.Project::model()->color($data->status).'">
          '.Project::model()->status($data->status).'
        </div>
        ';
      },
      'htmlOptions'=>array('width'=>'200px', 
        'style' => 'text-align: left;')),        

    array(    
      'header'=>'Progress',
      'type'=>'raw', 
      'visible'=>Yii::app()->user->record->level==1 || Yii::app()->user->record->level==3,
      'value'=>'CHtml::link($data->status == 1 ? "Done" : "On Progress", array("projectdetail/status", "id"=>$data->id_projectdetail, "id_project"=>$data->id_project))',
      'sortable' => TRUE,
      'htmlOptions'=>array('style'=>'font-weight:700;'),
      'htmlOptions'=>array('width'=>'200px', 
        'style' => 'text-align: left;')),

    array(
      'header'=>'Start Date',
      'value'=>'$data->job_date == "01-01-1970" ? "-" : $data->job_date',
      'htmlOptions'=>array('width'=>'400px', 
        'style' => 'text-align: left;')),

    array(
      'header'=>'End Date',
      'value'=>'$data->status_update == "01-01-1970" ? "-" : $data->status_update',
      'htmlOptions'=>array('width'=>'400px', 
        'style' => 'text-align: left;')),

    array(
      'header'=>'',
      'type'=>'raw',
      'visible'=>Yii::app()->user->record->level==1 || Yii::app()->user->record->level==3,
      'value'=>'CHtml::link("X", array("projectdetail/removetask", "id"=>$data->id_projectdetail), array("class"=>"ajaxupdate label label-danger","title"=>"Remove Task"));',
      'htmlOptions'=>array('width'=>'10px', 
        'style' => 'text-align: left;')),        



    ),
    )); ?>
  </div>

  <?php 
  if(Yii::app()->user->record->level==1):
    echo CHtml::link('<i class="fa fa-plus icon-white"></i> Task',
      array('projectdetail/create', 'projectid'=>$model->id_project),
      array('class' => 'btn btn-default pull-right'));
  endif;
  ?>    
  <BR><BR>