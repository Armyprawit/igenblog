<?php include'class/setting.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ตั้งค่า :: IGenGoods</title>

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
<script src="js/ajax/setting.js" type="text/javascript"></script>

</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>

<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <div class="title"><i class="fa fa-home"></i> Setting <span id="console"></span></div>
        <div class="content">

          <div class="display" id="list">

            <div class="settingItem" onClick="Javascript:toSelectSetting(1);">
              <i class="fa fa-leaf" style="color:#1abc9c;"></i> Site Setting
              <p>คำอธืบายการตั้งค่าต่างๆ</p>
            </div>

            <div class="settingItem" onClick="Javascript:toSelectSetting(2);">
              <i class="fa fa-cog" style="color:#555555;"></i> Admin Setting
              <p>คำอธืบายการตั้งค่าต่างๆ</p>
            </div>

            <div class="settingItem" onClick="Javascript:toSelectSetting(3);">
              <i class="fa fa-facebook-square" style="color:#2980b9;"></i> Facebook Setting
              <p>คำอธืบายการตั้งค่าต่างๆ</p>
            </div>

            <div class="settingItem" onClick="Javascript:toSelectSetting(4);">
              <i class="fa fa-google-plus-square" style="color:#e74c3c;"></i> Google Setting
              <p>คำอธืบายการตั้งค่าต่างๆ</p>
            </div>

            <div class="settingItem" onClick="Javascript:toSelectSetting(5);">
              <i class="fa fa-youtube-play" style="color:#e74c3c;"></i> Youtube Setting
              <p>คำอธืบายการตั้งค่าต่างๆ</p>
            </div>

            <div class="settingItem" onClick="Javascript:toSelectSetting(7);">
              <i class="fa fa-twitter" style="color:#3498db;"></i> Twitter Setting
              <p>คำอธืบายการตั้งค่าต่างๆ</p>
            </div>

            <div class="settingItem" onClick="Javascript:toSelectSetting(6);">
              <i class="fa fa-cogs" style="color:#34495e;"></i> Other Setting
              <p>คำอธืบายการตั้งค่าต่างๆ</p>
            </div>


          </div>
        </div>
        <div class="activity">
          <div class="display" id="result">
          </div>
          
        </div>
    </div>
</div>

</body>


<!--
1 = SiteSetting
2 = AdminSetting
3 = FacebookSetting
4 = GoogleSetting
5 = YoutubeSetting
6 = OtherSetting
7 = TwitterSetting
-->

</html>