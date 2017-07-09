<?php
$sql = 'SELECT job, member, status_update, DATE_FORMAT(status_update,"%d %M %Y") AS status_updatex, DATE_FORMAT(status_update,"%d - %m - %Y") AS status_updatew, DATE_FORMAT(status_update,"%h:%i %p") AS status_updatey, DATE_FORMAT(NOW(),"%b %d %Y %h:%i %p") AS thistime FROM projectdetail WHERE status=1 AND id_project = ' . $model->id_project .' GROUP BY status_update';
$rows = Yii::app()->db->createCommand($sql)->queryAll();
$idx = 1;

if(!empty($rows))
  ?>

<ol class='timeline timeline-horizontal'>

  <?php
  foreach ($rows as $row)
  {
    ?>

    <li>
      <time data-original-title="<?php echo ($row['status_updatex']) ?>" data-toggle="tooltip">
        <small><?php echo ($row['status_updatew']) ?></small>
      </time>

      <article>
        <?php
        $datasql = 'SELECT job, member, DATE_FORMAT(status_update,"%W, %d %M %Y") AS status_updatex, DATE_FORMAT(status_update,"%h:%i %p") AS status_updatey, DATE_FORMAT(NOW(),"%b %d %Y %h:%i %p") AS thistime FROM projectdetail WHERE status=1 AND status_update="'.($row['status_update']).'" AND id_project = ' . $model->id_project .'';
        $datarows = Yii::app()->db->createCommand($datasql)->queryAll();
        $idy = 1;

        if(!empty($datarows))
          ?>

        <?php
        foreach ($datarows as $detailproject)
        {
          ?>

          <b><a href="#" data-original-title="<?php echo ($detailproject['member']) ?>" data-toggle="tooltip"><?php echo ($detailproject['job']) ?></a></b>
          <?php
          $idy++;
        }
        ?>
      </article> 

      <div class="line"></div>
    </li>

    <?php
    $idx++;
  }
  ?>

</ol>


<STYLE>
th{width:250px;}
/* line 34, ../sass/_vars.scss */
.timeline article:after {
  content: "";
  display: table;
  clear: both;
}

/* line 1, ../sass/_timeline.scss */
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* line 9, ../sass/_timeline.scss */
.timeline {
  padding: 1rem;
  font-family: helvetica;
  position: relative;
}
/* line 13, ../sass/_timeline.scss */
.timeline > li:before {
  content: "";
  width: 4rem;
  height: 3em;
  display: block;
  position: absolute;
  top: -1em;
  left: calc(22% - 1.5rem);
  border-radius: 4em;
  background-image: radial-gradient(#FFF 30%, #CFD9DB 31%, #CFD9DB 50%, #FFF 51%);
}
/* line 21, ../sass/_timeline.scss */
.timeline img {
  width: 100%;
  margin-bottom: 1rem;
}
/* line 26, ../sass/_timeline.scss */
.timeline em {
  font-style: italic;
}
/* line 30, ../sass/_timeline.scss */
.timeline strong {
  font-weight: bold;
}
/* line 34, ../sass/_timeline.scss */
.timeline > li {
  position: relative;
  list-style-type: none;
  clear: both;
}
/* line 38, ../sass/_timeline.scss */
.timeline > li:before {
  content: '';
  width: 4rem;
  height: 3em;
  display: block;
  position: absolute;
  top: -1em;
  left: -moz-calc(50% - 1.5rem);
  left: -o-calc(50% - 1.5rem);
  left: -webkit-calc(50% - 1.5rem);
  left: calc(50% - 1.5rem);
  border-radius: 4em;
  background-image: -webkit-gradient(radial, 50% 50%, 0, 50% 50%, 51, color-stop(30%, #ffffff), color-stop(31%, #cfd9db), color-stop(50%, #cfd9db), color-stop(51%, #ffffff));
  background-image: -webkit-radial-gradient(#ffffff 30%, #cfd9db 31%, #cfd9db 50%, #ffffff 51%);
  background-image: -moz-radial-gradient(#ffffff 30%, #cfd9db 31%, #cfd9db 50%, #ffffff 51%);
  background-image: -o-radial-gradient(#ffffff 30%, #cfd9db 31%, #cfd9db 50%, #ffffff 51%);
  background-image: radial-gradient(#ffffff 30%, #cfd9db 31%, #cfd9db 50%, #ffffff 51%);
}

.timeline > li:before {
  content: "";
  width: 4rem;
  height: 3em;
  display: block;
  position: absolute;
  top: -1em;
  left: calc(50% - 1.5rem);
  border-radius: 4em;
  background-image: radial-gradient(#FFF 30%, #CFD9DB 31%, #CFD9DB 50%, #FFF 51%);
}
/* line 50, ../sass/_timeline.scss */
.timeline article {
  display: block;
  line-height: 20px;
  border: 1px solid #E9EEEF;
  margin-bottom: 10px;
  padding: 20px;
  text-align: center;
}
@media (min-width: 60em) {
  /* line 50, ../sass/_timeline.scss */
  .timeline article {
    width: 45%;
  }
}
/* line 62, ../sass/_timeline.scss */
.timeline article p, .timeline article ul, .timeline article ol {
  padding: 0 1rem 1rem 1rem;
}
/* line 66, ../sass/_timeline.scss */
.timeline article ul, .timeline article ol {
  list-style-position: inside;
}
/* line 70, ../sass/_timeline.scss */
.timeline time {
  color: white;
  background: #00A65A;
  display: inline-block;
  position: relative;
  font-weight: bold;
  padding: .5em;
}
/* line 79, ../sass/_timeline.scss */
.timeline h2 {
  font-size: 1.5em;
  font-weight: bold;
  font-family: helvetica;
  padding: 1rem;
}
/* line 86, ../sass/_timeline.scss */
.timeline footer {
  background: #f8f9fa;
  padding-top: 1rem;
}
/* line 89, ../sass/_timeline.scss */
.timeline footer a {
  color: #00A65A;
}

@media (min-width: 60em) {
  /* line 142, ../sass/_timeline.scss */
  .timeline-horizontal {
    overflow-x: scroll;
    width: 95%;
    margin: 0 auto;
    white-space: nowrap;
    padding-bottom: 4rem;
    background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, transparent), color-stop(85%, transparent), color-stop(85%, #e9eeef), color-stop(86%, #e9eeef), color-stop(86%, transparent));
    background-image: -webkit-linear-gradient(top, transparent 0%, transparent 85%, #e9eeef 85%, #e9eeef 86%, transparent 86%);
    background-image: -moz-linear-gradient(top, transparent 0%, transparent 85%, #e9eeef 85%, #e9eeef 86%, transparent 86%);
    background-image: -o-linear-gradient(top, transparent 0%, transparent 85%, #e9eeef 85%, #e9eeef 86%, transparent 86%);
    background-image: linear-gradient(top, transparent 0%, transparent 85%, #e9eeef 85%, #e9eeef 86%, transparent 86%);
  }
  /* line 150, ../sass/_timeline.scss */
  .timeline-horizontal:before {
    display: none;
  }
  /* line 154, ../sass/_timeline.scss */
  .timeline-horizontal time {
    position: absolute;
    bottom: -4.5rem;
    left: 33%;
  }
  /* line 159, ../sass/_timeline.scss */
  .timeline-horizontal time:before {
    content: '';
    width: 0;
    height: 0;
    border-width: 0.8rem;
    border-color: transparent;
    border-style: solid;
    border-bottom-color: #00A65A;
    position: absolute;
    top: -1.5rem;
    left: -moz-calc(50% - .8rem);
    left: -o-calc(50% - .8rem);
    left: -webkit-calc(50% - .8rem);
    left: calc(50% - .8rem);
  }
  /* line 167, ../sass/_timeline.scss */
  .timeline-horizontal > li {
    display: inline-block;
    width: 33%;
    margin-right: 2rem;
  }
  /* line 170, ../sass/_timeline.scss */
  .timeline-horizontal > li:before {
    top: auto;
    bottom: -1.25rem;
    position: absolute;
  }
  /* line 181, ../sass/_timeline.scss */
  .timeline-horizontal article {
    float: none;
    clear: both;
    width: 100%;
    white-space: normal;
  }
}
@media (min-width: 60em) and (min-width: 80em) {
  /* line 167, ../sass/_timeline.scss */
  .timeline-horizontal > li {
    width: 25%;
  }

  .garis{
    border: 5px solid #000;

  }
}

.line {
  background-color: #ED5A64;
  height: 4px;
  width: 110%;
}

</STYLE>