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

<!-- AJAX -->
<script src="js/ajax/category.js" type="text/javascript"></script>

</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<script type="text/javascript">
<!--

function updateClock ( )
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );

  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Choose either "AM" or "PM" as appropriate
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  // Convert the hours component to 12-hour format if needed
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Update the time display
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

// -->

</script>


<?php include'navigator.php';?>


<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <div class="title"><i class="fa fa-home"></i> Category <span id="console"></span></div>
        <div class="content">
          <!-- Option -->
          <div class="option">
            <div class="item" onClick="Javascript:toCreateCategory();"><i class="fa fa-plus-circle"></i> เพิ่มหมวดใหม่</div>
            <div class="item" id="option-item-1" onClick="Javascript:modeCategory(1);"><i class="fa fa-check-circle-o"></i> Enable</div>
            <div class="item" id="option-item-0" onClick="Javascript:modeCategory(0);"><i class="fa fa-circle-o"></i> Disable</div>
            <div class="search"><input type="text" class="input-text" id="q" OnKeyUp="Javascript:searchCategory(document.getElementById('q').value);" placeholder="ค้นหาชื่อหมวด,url,id"></div>
          </div>


          <div class="display" id="list">
            <?php $category->listCategory($dbHandle,'normal',1,0,100);?>
          </div>
        </div>
        <div class="activity">
          <div class="display" id="result">
            <?php include'html/category-form.php';?>
          </div>
          

        </div>
    </div>
</div>

</body>
</html>