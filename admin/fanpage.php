<?php include'class/setting.php';?>
<?php require'sdk/facebook-sdk/facebook.php';?>
<?php include'get-facebook-user.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>แฟนเพจ : IGENBLOG <?php echo $setting->getSetting($dbHandle,26);?></title>

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

<!-- AJAX -->
<script src="js/ajax/fanpage.js" type="text/javascript"></script>

</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>

<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <div class="title">
          <i class="fa fa-facebook-square"></i> Facebook Page
        </div>

        <div class="activity">
          <div class="display" id="result">
          </div>
        </div>

        <div class="content">
          
          <!-- Option -->
          <div class="option">
            <div class="item btn" onClick="Javascript:createFanpage($('#username').val());"><i class="fa fa-plus-circle"></i> แฟนเพจใหม่</div>
            <div class="search"><input type="text" class="input-text" id="username" OnKeyUp="Javascript:getMetaFanpage($('#username').val());" placeholder="ค้นหาชื่อหมวด,url,id"></div>
          </div>

          <!-- Display -->
          <div class="display" id="list">
			<?php $facebookpage->listFacebookPage($dbHandle,'normal',1,1,0,5);?>
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

</body>
</html>