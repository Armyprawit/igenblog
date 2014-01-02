<?php include'class/setting.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IGENBLOG</title>

<!-- Favicon -->
<link rel="shortcut icon" href="image/favicon/icon.ico" />

<!-- Style File -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

<!-- LIB -->
<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/jquery.imagefill.js" type="text/javascript"></script>
<script src="lib/mydev.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).on("ready", function(){
  // make every image fill their direct parent
  $(".img").imagefill();
  
  // subscibe to the "fillsContainer" event
  $(".img").on("fillsContainer", function(event, imageProperties){
    console.log(event, imageProperties);
  });  
});
</script>

</head>

<body>

<header id="header">
  <div id="logo">IGENBLOG</div>
  <div id="description">Work :
Web Developer at http://igensite.com
Education: 
King Mongkut's University of Technology North Bangkok</div>
  <div id="category">
    <div class="categoryItem">Category 1</div>
    <div class="categoryItem">Category 2</div>
    <div class="categoryItem">Category 3</div>
    <div class="categoryItem">Category 4</div>
  </div>
  <div id="navagator">
    <div class="navItem">Video</div>
    <div class="navItem">Article</div>
    <div class="navItem">Photo</div>
  </div>
</header>

<div id="mainContent">
  <div class="mainContent">
    <?php for($i=0;$i<10;$i++){?>
    <div class="feedItem">
      <div class="image"><img class="img" src="https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-ash3/1538781_532376500203105_988343309_n.jpg" alt=""></div>
      <div class="detail">
        <h1>These two have become best friends.</h1>
        <p>There are all sorts of weird Christmas gifts, and you should thank your family and friends that they were sane enough not to give you one of those as presents! http://bit.ly/19ze1r8 There are all sorts of weird Christmas gifts, and you should thank your family and friends that they were sane enough not to give you one of those as presents! http://bit.ly/19ze1r8</p>
      </div>
      <div class="stat">
        <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2014</div>
        <div class="statBox"><i class="fa fa-coffee"></i> 213 Read</div>
      </div>
    </div>

    <div class="feedItem">
      <div class="image"><img class="img" src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-prn2/1532130_532888706818551_1916909369_n.jpg" alt=""></div>
      <div class="detail">
        <h1>Paul walker with his daughter.. Miss you Paul Paul walker with his daughter.. Miss you Paul Paul walker with his daughter.. Miss you Paul</h1>
        <p>Our personalities become altered as we grow older every 4 to 7 yrs. This explains why close friends sometimes grow apart with time.</p>
      </div>
      <div class="stat">
        <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2014</div>
        <div class="statBox"><i class="fa fa-coffee"></i> 213 Read</div>
      </div>
    </div>

    <div class="feedItem">
      <div class="image"><img class="img" src="https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-ash3/993482_512097462238089_134815168_n.jpg" alt=""></div>
      <div class="detail">
        <h1>แนะนำภาพ : เป้ อาภัพ</h1>
        <p>คิ้วโค้งคม อมยิ้ม แก้มอิ่มขาว
ผมตรงยาว สาวนั่ง ยังสดใส
มิผอมบาง ร่างน้อย จ้อยเกินไป
งามเหมาะใน วัยหนอ ดูพอดี</p>
      </div>
      <div class="stat">
        <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2014</div>
        <div class="statBox"><i class="fa fa-coffee"></i> 213 Read</div>
      </div>
    </div>
    <?php }?>

  </div>
</div>

</body>
</html>