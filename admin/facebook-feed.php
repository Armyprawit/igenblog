<?php include'class/setting.php';?>
<?php require'sdk/facebook-sdk/facebook.php';?>
<?php include'get-facebook-user.php';?>
<?php
  if(!$license->checkLicense($dbHandle,'b0h987g6fd5k')){
    header('Location:index.php');
  }
  //Page this Active (Menu Navigator Css Style)
  $pageActive = 'facebookfeed';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Facebook Feed : IGENBLOG <?php echo $setting->getSetting($dbHandle,26);?></title>

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
<script src="js/ajax/facebook-feed.js" type="text/javascript"></script>

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
          <div class="title"><i class="fa fa-facebook-square"></i> FB Feed</div>
          <div class="categoryMode">
            <select id="feedType" class="input-select" onChange="Javascript:modeListFacebookFeed($('#feedType').val());">
              <option value="all">ทั้งหมด</option>
              <option value="photo">Photo</option>
              <option value="video">Video</option>
              <!-- <option value="link">Link</option>
              <option value="status">Status</option> -->
            </select>
          </div>
        </div>

        <div class="activity">
          <div class="display" id="result">
          </div>
        </div>

        <div class="content">
          
          <!-- Option -->
          <div class="option">
            <!-- <div class="search"><input type="text" class="input-text" id="username" OnKeyUp="Javascript:getMetaFanpage($('#username').val());" placeholder="ค้นหาชื่อหมวด,url,id"></div> -->
          </div>

          <!-- Display -->
          <div class="display" id="list">
            <?php $facebookpage->listFacebookFeed($dbHandle,'normal','all',1,0,10);?>
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