<?php include'class/setting.php';?>
<?php require'sdk/facebook-sdk/facebook.php';?>
<?php include'get-facebook-user.php'?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>หน้าแรก : IGENBLOG <?php echo $setting->getSetting($dbHandle,26);?></title>

<!-- Favicon -->
<link rel="shortcut icon" href="image/favicon/icon.ico" />

<!-- Style File -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

<!-- LIB -->
<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/sbbeditor.js" type="text/javascript"></script>
<script src="lib/mydev.js" type="text/javascript"></script>
<script src="lib/textarea.autosize.js" type="text/javascript"></script>

<!-- Highcharts -->
<script type="text/javascript" src="highcharts/highcharts.js"></script>
<script type="text/javascript" src="highcharts/modules/exporting.js"></script>
<script type="text/javascript" src="js/chart/chart.js"></script>


</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>

<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <div class="title"><i class="fa fa-home"></i> หน้าแรก</div>
        <div class="option">
        </div>
        <div class="content">
          <div class="versionBox">
            <p>เวอร์ชันปัจจุบัน <span class="s"><?php echo $setting->getSetting($dbHandle,26);?></span></p>
            <div class="btn">ดาวน์โหลด <p>Version 3.1.2</p></div>
            <!-- <div class="btn">อัพเดทแล้ว</div> -->
            <div class="note">หลังจากอัพเดทไฟล์แล้ว ให้ท่านคลิกที่ "ปรับปรุงฐานข้อมูล"</div>
            <div class="btn update">ปรับปรุงฐานข้อมูล</div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="timeLoad"></div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="sqlLoad"></div>
          </div>


        </div>
        <div class="activity">

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> คลิปวิดีโอยอดนิยม</div>
            <?php $video->monitorAllVideo($dbHandle,'view',5);?>
          </div>

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> บทความยอดนิยม</div>
            <?php $article->monitorAllArticle($dbHandle,'view',5);?>
          </div>

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> ภาพยอดนิยม</div>
            <?php $photo->monitorAllPhoto($dbHandle,'view',5);?>
          </div>

        </div>
    </div>
</div>

</body>
</html>