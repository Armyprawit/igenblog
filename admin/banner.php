<?php include'class/setting.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ป้ายโฆษณา : IGENBLOG <?php echo $setting->getSetting($dbHandle,26);?></title>

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
        <div class="title"><i class="fa fa-bullhorn"></i> ป้ายโฆษณา 
            <span class="categoryMode">
              <select id="categoryMode" class="input-select" onChange="Javascript:modeListBanner($('#categoryMode').val());">
                <option value="0">ทั้งหมด</option>
                <option value="1">ZONE 1</option>
                <option value="2">ZONE 2</option>
                <option value="3">ZONE 3</option>
                <option value="4">ZONE 4</option>
                <option value="5">ZONE 5</option>
                <option value="6">ZONE 6</option>
              </select>
            </span>
        </div>

        <div class="activity">
          <div class="display" id="result">
            <?php include'html/banner-form.php';?>
          </div>
        </div>

        <div class="content">
          <!-- Option -->
          <div class="option">
            <div class="item" onClick="Javascript:toCreateBanner();"><i class="fa fa-plus-circle"></i> ป้ายโฆษณาใหม่</div>
            <!-- <div class="item" id="option-item-1" onClick="Javascript:modeCategory(1);"><i class="fa fa-check-circle-o"></i> Enable</div>
            <div class="item" id="option-item-0" onClick="Javascript:modeCategory(0);"><i class="fa fa-circle-o"></i> Disable</div>
            <div class="search"><input type="text" class="input-text" id="q" OnKeyUp="Javascript:searchCategory(document.getElementById('q').value);" placeholder="ค้นหาชื่อหมวด,url,id"></div> -->
          </div>


          <div class="display" id="list">

            <?php $banner->listBanner($dbHandle,'normal',0,0,5);?>

          </div>
        </div>
        
    </div>
</div>

</body>
</html>