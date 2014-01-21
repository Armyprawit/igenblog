<?php include'class/setting.php';?>
<?php require'sdk/facebook-sdk/facebook.php';?>
<?php include'get-facebook-user.php';?>
<?php
  //Page this Active (Menu Navigator Css Style)
  $pageActive = 'index';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>IGENBLOG <?php echo $setting->getSetting($dbHandle,26);?></title>

<!-- Favicon -->
<link rel="shortcut icon" href="image/favicon/icon.ico" />

<!-- Style File -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="css/offline.css" type="text/css"/>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

<!-- LIB -->
<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/sbbeditor.js" type="text/javascript"></script>
<script src="lib/jquery.touchSwipe.min.js" type="text/javascript"></script>
<script src="lib/mydev.js" type="text/javascript"></script>
<script src="lib/textarea.autosize.js" type="text/javascript"></script>
<script src="lib/offline.js" type="text/javascript"></script>
<script src="js/connection.js" type="text/javascript"></script>

<!-- Highcharts -->
<script type="text/javascript" src="highcharts/highcharts.js"></script>
<script type="text/javascript" src="highcharts/modules/exporting.js"></script>
<script type="text/javascript" src="js/chart/timeload.js"></script>


</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>

<div id="display">
    <?php
      include'bar.php';
      include'header.php';
    ?>

    <div id="mainContent">
        <!-- HEAD TITLE -->
        <div class="mainHead">
          <div class="title"><i class="fa fa-home"></i> หน้าแรก</div>
        </div>
        
        <div class="option">
        </div>
        <div class="content">
          <?php
          if($license->checkLicense($dbHandle,'b0h987g6fd5k')){
          ?>
          <div class="versionBox">
            <p>เวอร์ชันปัจจุบัน <span class="s"><?php echo $setting->getSetting($dbHandle,26);?></span></p>
            <!-- <div class="btn">ดาวน์โหลด <p>Version 3.1.2</p></div> -->
            <!-- <div class="btn">อัพเดทแล้ว</div> -->
            <!-- <div class="note">หลังจากอัพเดทไฟล์แล้ว ให้ท่านคลิกที่ "ปรับปรุงฐานข้อมูล"</div> -->
            <!-- <div class="btn update">ปรับปรุงฐานข้อมูล</div> -->
          </div>
          <?php }?>

          <?php
          if(!$license->checkLicense($dbHandle,'b0h987g6fd5k')){
          ?>
          <div class="alertBox">
            <p class="alert"><i class="fa fa-exclamation-circle"></i> ท่านใส่ Website Secret Key ไม่ถูกต้อง</p>
            <p>ใส่คีย์ที่นี่ <a href="setting.php" target="_parent">ตั้งค่า</a> -> Site Setting -> Website Secret Key</p>
            <p><a href="http://igensite.com/key.php" target="_bank"><i class="fa fa-hand-o-right"></i> ยังไม่มีคีย์</a></p>
          </div>
          <?php }?>

          <?php
          if($license->checkLicense($dbHandle,'b0h987g6fd5k')){
          ?>
          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="timeloadAll"></div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="timeloadPlayer"></div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="timeloadRead"></div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="timeloadPhoto"></div>
          </div> 
          <?php }?>         

        </div>
        <div class="activity">

          <?php
          if($license->checkLicense($dbHandle,'b0h987g6fd5k')){
          ?>
          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> คลิปวิดีโอยอดนิยม</div>
            <?php $video->monitorAllVideo($dbHandle,'view',10);?>
          </div>

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> บทความยอดนิยม</div>
            <?php $article->monitorAllArticle($dbHandle,'view',10);?>
          </div>

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> ภาพยอดนิยม</div>
            <?php $photo->monitorAllPhoto($dbHandle,'view',10);?>
          </div>
          <?php }?>

        </div>
    </div>
</div>

</body>
</html>