<?php
$this->pageTitle=Yii::app()->name . ' - Reports';
?>

<?php
 // $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
 //    //'themeCssFile'=>'cupertino/jquery-ui.min.css',
 //    'options'=>array(
 //        'header'=>array(
 //            'left'=>'prev,next,today',
 //            'center'=>'title',
 //            'right'=>'month,agendaWeek,agendaDay',
 //        ),
 //        'events'=>$this->createUrl('project/ScheduleTask'), // URL to get event
 //    )));
?>

<?php $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
    //'themeCssFile'=>'cupertino/jquery-ui.min.css',
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next,today',
            'center'=>'title',
            'right'=>'month,agendaWeek,agendaDay',
        ),
        'events'=>$this->createUrl('project/schedule'),
        'eventClick'=> 'js:function(calEvent, jsEvent, view) {
            $("#myModalHeader").html(calEvent.title);
            $("#myModalBody").load("'.Yii::app()->createUrl("project/view").'"+calEvent.id+"?asModal=true");
            $("#myModal").modal();
        }',
    )));
?>