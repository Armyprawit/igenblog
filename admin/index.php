<?php include'class/setting.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ระบบจัดการร้านค้า :: IGenGoods</title>

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
<script type="text/javascript" src="js/chart/test.js"></script>


</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>

<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <div class="title"><i class="fa fa-home"></i> Title <?php echo 'Session:'.$_SESSION['adminG'];?></div>
        <div class="option">
        </div>
        <div class="content">
          <div class="versionBox">
            <p>เวอร์ชันปัจจุบัน <span class="s">3.0</span></p>
            <div class="btn">ดาวน์โหลด <p>Version 3.1.2</p></div>
            <!-- <div class="btn">อัพเดทแล้ว</div> -->
            <div class="note">หลังจากอัพเดทไฟล์แล้ว ให้ท่านคลิปที่ "ปรับปรุงฐานข้อมูล"</div>
            <div class="btn update">ปรับปรุงฐานข้อมูล</div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> Topic</div>
            <div id="container"></div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> Topic</div>
            <div id="container1"></div>
          </div>


        </div>
        <div class="activity">

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> บทความยอดนิยม</div>
            <?php for($i=0;$i<5;$i++){?>
            <div class="item">
              <h1>40 Awesome Motivational & Inspiring</h1>
              <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2013</div>
              <div class="value"><i class="fa fa-flag"></i> 1256</div>
            </div>
            <?php }?>
          </div>

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> คลิปยอดนิยม</div>
            <?php for($i=0;$i<5;$i++){?>
            <div class="item">
              <h1>40 Awesome Motivational & Inspiring</h1>
              <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2013</div>
              <div class="value"><i class="fa fa-flag"></i> 5256</div>
            </div>
            <?php }?>
          </div>

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> เปิดล่าสุด</div>
            <?php for($i=0;$i<5;$i++){?>
            <div class="item">
              <h1>40 Awesome Motivational & Inspiring</h1>
              <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2013</div>
              <div class="value"><i class="fa fa-flag"></i> 751256</div>
            </div>
            <?php }?>
          </div>

        </div>
    </div>
</div>

</body>
</html>