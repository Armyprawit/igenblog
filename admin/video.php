<?php include'class/setting.php';?>
<?php require'sdk/facebook-sdk/facebook.php';?>
<?php include'get-facebook-user.php';?>
<?php
  if(!$license->checkLicense($dbHandle,'b0h987g6fd5k')){
    header('Location:index.php');
  }
  //Page this Active (Menu Navigator Css Style)
  $pageActive = 'video';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>คลิปวิดีโอ : IGENBLOG <?php echo $setting->getSetting($dbHandle,26);?></title>

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

<!-- AJAX -->
<script src="js/ajax/video.js" type="text/javascript"></script>

</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>

<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <!-- HEAD TITLE -->
        <div class="mainHead">
          <div class="title"><i class="fa fa-video-camera"></i> คลิปวิดีโอ</div>
          <div class="categoryMode">
            <select id="categoryMode" class="input-select" onChange="Javascript:modeListVideo($('#categoryMode').val());">
              <option value="0">ทั้งหมด</option>
              <?php $category->listCategoryToSelectForm($dbHandle,0,1);?>
            </select>
          </div>
        </div>

        <div class="activity">
          <div class="display" id="result">
            <?php include'html/video-form.php';?>
          </div>
        </div>

        <div class="content">
          
          <!-- Option -->
          <div class="option">
            <div class="item" onClick="Javascript:toCreateVideo();"><i class="fa fa-plus-circle"></i> เพิ่มคลิป</div>
            <!-- <div class="item" id="option-item-1" onClick="Javascript:modeCategory(1);"><i class="fa fa-check-circle-o"></i> Enable</div> -->
            <!-- <div class="item" id="option-item-0" onClick="Javascript:modeCategory(0);"><i class="fa fa-circle-o"></i> Disable</div> -->
            <div class="search"><input type="text" class="input-text" id="q" OnKeyUp="Javascript:searchVideo(document.getElementById('q').value);" placeholder="ค้นหาคลิปวิดีโอ"></div>
          </div>

          <!-- Display -->
          <div class="display" id="list">
            <?php $video->listVideo($dbHandle,'normal',0,1,1,0,5);?>
          </div>
        </div>

    </div>
</div>

<div id="viewExample">
  <div class="display" id="exampleDisplay"></div>
  <div class="control">
    <div class="item" onClick="Javascript:showLiveView('close');"><i class="fa fa-reply"></i> ปิดหน้าต่าง</div>
  </div>
</div>

<div id="console" onClick="Javascript:$(this).hide();"></div>
<?php include'html/loading-process.php';?>

</body>
</html>