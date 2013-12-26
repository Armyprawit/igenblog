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

<!-- AJAX -->
<script src="js/ajax/banner.js" type="text/javascript"></script>

</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>


<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <div class="title"><i class="fa fa-home"></i> Banner <span id="console"></span></div>
        <div class="content">
          <!-- Option -->
          <div class="option">
            <div class="item" onClick="Javascript:toCreateCategory();"><i class="fa fa-plus-circle"></i> เพิ่มหมวดใหม่</div>
            <div class="item" id="option-item-1" onClick="Javascript:modeCategory(1);"><i class="fa fa-check-circle-o"></i> Enable</div>
            <div class="item" id="option-item-0" onClick="Javascript:modeCategory(0);"><i class="fa fa-circle-o"></i> Disable</div>
            <div class="search"><input type="text" class="input-text" id="q" OnKeyUp="Javascript:searchCategory(document.getElementById('q').value);" placeholder="ค้นหาชื่อหมวด,url,id"></div>
          </div>


          <div class="display" id="list">

            <?php for($i=0;$i<12;$i++){?>
            <div class="bannerItem">
              <div class="photo">
                <img src="http://i1.ytimg.com/vi/A3PDXmYoF5U/maxresdefault.jpg">
              </div>
              <div class="info">
                <div class="zone">zone A</div>
                <div class="text">GoPro HERO3: Almost as Epic as the HERO3+</div>
                <p>Link: http://www.igensite.com</p>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
        <div class="activity">
          <div class="display" id="result">
            <?php include'html/banner-form.php';?>
          </div>
          

        </div>
    </div>
</div>

</body>
</html>