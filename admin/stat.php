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
<script type="text/javascript" src="js/chart/chart.js"></script>


</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>

<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <div class="title"><i class="fa fa-home"></i> สถิติ</div>
        <div class="option">
        </div>
        <div class="content">

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="timeLoad"></div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="sqlLoad"></div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="pageAccess"></div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="actionEvent"></div>
          </div>

          <div class="chartBox">
            <div class="topic"><i class="fa fa-bar-chart-o"></i> กราฟสถิติ</div>
            <div id="online"></div>
          </div>


        </div>
        <div class="activity">
          <div class="statBox full">
            <div class="value"><?php echo $article->infoArticleData($dbHandle,'total');?></div>
            <p><i class="fa fa-globe"></i> บทความ</p>
          </div>

          <div class="statBox mini">
            <div class="value"><?php echo $video->infoVideoData($dbHandle,'total');?></div>
            <p><i class="fa fa-globe"></i> คลิปวิดีโอ</p>
          </div>
          
          <div class="statBox mini right">
            <div class="value"><?php echo $photo->infoPhotoData($dbHandle,'total');?></div>
            <p><i class="fa fa-globe"></i> รูปภาพ/ภาพถ่าย</p>
          </div>

        	<div class="statBox mini">
        		<div class="value"><?php echo $banner->infoBannerData($dbHandle,'total');?></div>
        		<p><i class="fa fa-globe"></i> ป้ายโฆษณา</p>
        	</div>
        	<div class="statBox mini right">
        		<div class="value"><?php echo $category->infoCategoryData($dbHandle,'total');?></div>
        		<p><i class="fa fa-globe"></i> หมวดหมู่</p>
        	</div>

          <div class="statBox mini">
            <div class="value"><?php echo $analytic->pageViewData($dbHandle,2)?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (article.php)</p>
          </div>
          
          <div class="statBox mini right">
            <div class="value"><?php echo $analytic->pageViewData($dbHandle,3)?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (video.php)</p>
          </div>

          <div class="statBox mini">
            <div class="value"><?php echo $analytic->pageViewData($dbHandle,4)?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (gallery.php)</p>
          </div>
          
          <div class="statBox mini right">
            <div class="value"><?php echo $analytic->pageViewData($dbHandle,10)?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (category.php)</p>
          </div>

          <div class="statBox mini">
            <div class="value"><?php echo $analytic->pageViewData($dbHandle,6)?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (Watch Video)</p>
          </div>
          
          <div class="statBox mini right">
            <div class="value"><?php echo $analytic->pageViewData($dbHandle,7)?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (Read Article)</p>
          </div>

          <div class="statBox mini">
            <div class="value"><?php echo $analytic->pageViewData($dbHandle,8)?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (View Photo)</p>
          </div>

          <div class="statBox mini right">
            <div class="value"><?php echo $analytic->pageViewData($dbHandle,1)?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (index.php)</p>
          </div>
        	

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

        </div>
    </div>
</div>

</body>
</html>