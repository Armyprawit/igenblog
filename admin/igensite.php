<?php include'class/setting.php';?>
<?php require'sdk/facebook-sdk/facebook.php';?>
<?php include'get-facebook-user.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ระบบจัดการร้านค้า :: IGenGoods</title>

<!-- Favicon -->
<link rel="shortcut icon" href="image/favicon/icon.ico" />

<!-- Style File -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

<!-- LIB -->
<script src="lib/jquery-2.0.3.min.js" type="text/javascript"></script>
<script src="lib/sbbeditor.js" type="text/javascript"></script>
<script src="lib/jquery.touchSwipe.min.js" type="text/javascript"></script>
<script src="lib/mydev.js" type="text/javascript"></script>
<script src="lib/textarea.autosize.js" type="text/javascript"></script>
<script src="lib/offline.js" type="text/javascript"></script>
<script src="js/connection.js" type="text/javascript"></script>

<!-- AJAX -->
<script src="js/ajax/banner.js" type="text/javascript"></script>

</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<?php include'navigator.php';?>


<div id="display">
    <?php include'header.php';?>

    <div id="mainContent">
        <!-- HEAD TITLE -->
        <div class="mainHead">
          <div class="title"><i class="fa fa-home"></i> Igensite</div>
          <div class="categoryMode">
            <select id="categoryMode" class="input-select" onChange="Javascript:modeListBanner($('#categoryMode').val());">
              <option value="0">ทั้งหมด</option>
              <option value="1">ZONE 1</option>
              <option value="2">ZONE 2</option>
              <option value="3">ZONE 3</option>
              <option value="4">ZONE 4</option>
              <option value="5">ZONE 5</option>
              <option value="6">ZONE 6</option>
            </select>
          </div>
        </div>

        <div id="news">

          <?php for($i=0;$i<20;$i++){?>
          <div class="newsItem">
            <div class="image"><img src="https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-frc3/1501127_575019025906607_287992841_o.jpg"></div>
            <div class="info">
              <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2014</div>
              <h1>ปี 2014 ตัวอออกใหม่ 2 ตัวครับ</h1>
              <p>#prepos เครื่องมือที่ช่วย #compile ไฟล์ #LESS ที่เพิ่งนำมาใช้ในการพัฒนาใน #IGENBLOG ver 3.0 ครับ #prepos เครื่องมือที่ช่วย #compile ไฟล์ #LESS ที่เพิ่งนำมาใช้ในการพัฒนาใน #IGENBLOG ver 3.0 ครับ #prepos เครื่องมือที่ช่วย #compile ไฟล์ #LESS ที่เพิ่งนำมาใช้ในการพัฒนาใน #IGENBLOG ver 3.0 ครับ</p>
            </div>
          </div>

          <div class="newsItem">
            <div class="image"><img src="https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-ash3/1528621_715899055094495_694123906_n.jpg"></div>
            <div class="info">
              <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2014</div>
              <h1>Dogilike #dogilike #dog</h1>
              <p>ใครคิดว่าน้องหมาของตัวเองเหมือนตุ๊กตาบ้างค้าา มาแชร์ความน่ารักกัน</p>
            </div>
          </div>

          <div class="newsItem">
            <div class="image"><img src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-prn1/1097143_10151984210089597_1304447069_o.jpg"></div>
            <div class="info">
              <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2014</div>
              <h1>ไป่ตู้ แอนตี้ไวรัส</h1>
              <p>“ไป่ตู้ แอนตี้ไวรัส” คว้ารางวัลชนะเลิศ “Most Promising Antivirus of 2013” จาก Softonic.com</p>
            </div>
          </div>

          <div class="newsItem">
            <div class="image"><img src="https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-frc3/t31/1502786_10151984187844597_1730296175_o.jpg"></div>
            <div class="info">
              <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2014</div>
              <h1>Assassin’s Creed</h1>
              <p>ลือ! Assassin’s Creed เตรียมออกพร้อมกันสองภาคในปี 2014</p>
            </div>
          </div>
          <?php }?>

        </div>
    </div>
</div>

</body>
</html>