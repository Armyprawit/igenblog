<?php include'class/setting.php';?>
<?php require'sdk/facebook-sdk/facebook.php';?>
<?php include'get-facebook-user.php';?>
<?php
  if(!$license->checkLicense($dbHandle,'b0h987g6fd5k')){
    header('Location:index.php');
  }
  //Page this Active (Menu Navigator Css Style)
  $pageActive = 'category';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>หมวดหมู่ : IGENBLOG <?php echo $setting->getSetting($dbHandle,26);?></title>

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
<script src="js/ajax/category.js" type="text/javascript"></script>

</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>


<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <!-- HEAD TITLE -->
        <div class="mainHead">
          <div class="title"><i class="fa fa-folder-open"></i> หมวดหมู่</div>
        </div>

        <div class="activity">
          <div class="display" id="result">
            <?php include'html/category-form.php';?>
          </div>
        </div>

        <div class="content">
          <!-- Option -->
          <div class="option">
            <div class="item" onClick="Javascript:toCreateCategory();"><i class="fa fa-plus-circle"></i> เพิ่มหมวด</div>
            <div class="item" id="option-item-0" onClick="Javascript:modeCategory(0);"><i class="fa fa-circle-o"></i> แบบร่าง</div>
            <div class="search"><input type="text" class="input-text" id="q" OnKeyUp="Javascript:searchCategory(document.getElementById('q').value);" placeholder="ค้นหาหมวดหมู่"></div>
          </div>


          <div class="display" id="list">
            <?php $category->listCategory($dbHandle,'normal',1,0,100);?>
          </div>
        </div>

    </div>
</div>

</body>
</html>