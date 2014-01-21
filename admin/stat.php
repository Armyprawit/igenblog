<?php include'class/setting.php';?>
<?php require'sdk/facebook-sdk/facebook.php';?>
<?php include'get-facebook-user.php';?>
<?php
  if(!$license->checkLicense($dbHandle,'b0h987g6fd5k')){
    header('Location:index.php');
  }
  //Page this Active (Menu Navigator Css Style)
  $pageActive = 'stat';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>สถิติ : IGENBLOG <?php echo $setting->getSetting($dbHandle,26);?></title>

<!-- Favicon -->
<link rel="shortcut icon" href="image/favicon/icon.ico" />

<!-- Style File -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
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
<script type="text/javascript" src="js/chart/chart.js"></script>
<script type="text/javascript" src="js/chart/online.js"></script>
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
          <div class="title"><i class="fa fa-bar-chart-o"></i> สถิติ</div>
        </div>

        <div class="option">
        </div>
        <div class="content">

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


        </div>
        <div class="activity">
          <div class="statBox full">
            <div class="value"><?php echo number_format($article->infoArticleData($dbHandle,'total'));?></div>
            <p><i class="fa fa-globe"></i> บทความ</p>
          </div>

          <div class="statBox mini">
            <div class="value"><?php echo number_format($video->infoVideoData($dbHandle,'total'));?></div>
            <p><i class="fa fa-globe"></i> คลิปวิดีโอ</p>
          </div>
          
          <div class="statBox mini right">
            <div class="value"><?php echo number_format($photo->infoPhotoData($dbHandle,'total'));?></div>
            <p><i class="fa fa-globe"></i> รูปภาพ/ภาพถ่าย</p>
          </div>

        	<div class="statBox mini">
        		<div class="value"><?php echo number_format($banner->infoBannerData($dbHandle,'total'));?></div>
        		<p><i class="fa fa-globe"></i> ป้ายโฆษณา</p>
        	</div>
        	<div class="statBox mini right">
        		<div class="value"><?php echo number_format($category->infoCategoryData($dbHandle,'total'));?></div>
        		<p><i class="fa fa-globe"></i> หมวดหมู่</p>
        	</div>

          <div class="statBox mini">
            <div class="value"><?php echo number_format($analytic->pageViewData($dbHandle,2));?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (article.php)</p>
          </div>
          
          <div class="statBox mini right">
            <div class="value"><?php echo number_format($analytic->pageViewData($dbHandle,3));?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (video.php)</p>
          </div>

          <div class="statBox mini">
            <div class="value"><?php echo number_format($analytic->pageViewData($dbHandle,4));?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (gallery.php)</p>
          </div>
          
          <div class="statBox mini right">
            <div class="value"><?php echo number_format($analytic->pageViewData($dbHandle,10));?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (category.php)</p>
          </div>

          <div class="statBox mini">
            <div class="value"><?php echo number_format($analytic->pageViewData($dbHandle,6));?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (Watch Video)</p>
          </div>
          
          <div class="statBox mini right">
            <div class="value"><?php echo number_format($analytic->pageViewData($dbHandle,7));?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (Read Article)</p>
          </div>

          <div class="statBox mini">
            <div class="value"><?php echo number_format($analytic->pageViewData($dbHandle,8));?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (View Photo)</p>
          </div>

          <div class="statBox mini right">
            <div class="value"><?php echo number_format($analytic->pageViewData($dbHandle,1));?></div>
            <p><i class="fa fa-globe"></i> จำนวนการเรียกหน้าเว็บ (index.php)</p>
          </div>
        	

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> คลิปวิดีโอยอดนิยม</div>
            <?php $video->monitorAllVideo($dbHandle,'view',12);?>
          </div>

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> บทความยอดนิยม</div>
            <?php $article->monitorAllArticle($dbHandle,'view',12);?>
          </div>

          <div class="topBox">
            <div class="topic"><i class="fa fa-arrow-up"></i> ภาพยอดนิยม</div>
            <?php $photo->monitorAllPhoto($dbHandle,'view',12);?>
          </div>

        </div>
    </div>
</div>

</body>
</html>