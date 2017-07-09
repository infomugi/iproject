<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="./dokumen/favicon/<?php echo Yii::app()->db->createCommand("SELECT favicon FROM settings where id_settings=1")->queryScalar(); ?>">

  <script>
    function cetak(){
      document.getElementById("p").style.visibility="hidden";
      window.print();
    }

    window.onload = function () {
      window.print();
    };
  </script>
</head>

<body class="">
  <img style="padding: 0px;" src="./dokumen/invoice/<?php echo Yii::app()->db->createCommand("SELECT invoice FROM settings where id_settings=1")->queryScalar(); ?>">

  <div id="invoice" style="width: 780px;text-align: center;padding: 10px;margin-top: -940px;
  position: sticky;">
  <div style="text-align: left;">
    <?php echo $content; ?>
  </div>
</div>
</body>
</html>


