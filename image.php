<?php include'class/setting.php';?>
<?php
  $photoData = $image->getPhotoData($dbHandle,$_GET['i']-1024);
?>
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

<div id="fb-root"></div> <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>

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
  <div id="navigator">
    <div class="navItem">Video</div>
    <div class="navItem">Article</div>
    <div class="navItem">Photo</div>
  </div>
</header>

<div id="mainContent">
  <div class="mainContent">
    
    <div id="show">
      <h1><?php echo $photoData['im_description'];?></h1>
      <div class="stat">
        <div class="time"><i class="fa fa-clock-o"></i> <?php echo $mydev->fb_thaidate($photoData['im_post_time']);?></div>
        <div class="time"><i class="fa fa-folder"></i> <?php echo $photoData['ca_title'];?></div>
        <div class="statBox"><i class="fa fa-coffee"></i> <?php echo $photoData['im_c_view'];?> Read</div>
      </div>

      <div class="photo"><img class="img" src="<?php echo $photoData['im_image'];?>" alt=""></div>

      <div class="text"><?php echo $photoData['im_text'];?></div>

      <div class="comment">
        <div class="fb-comments" data-href="http://example.com/comments" data-width="500" data-numposts="10" data-colorscheme="light"></div>
      </div>
    </div>

  </div>
</div>

<div id="feature">
  <?php for($i=0;$i<20;$i++){?>
  <div class="featureItem">
    <div class="photo"><img class="img" src="https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-ash3/1478946_271959249623011_168190678_n.jpg" alt=""></div>
    <div class="detail">
      <h2>เจนี่ เปิดใจเรื่องความรักสามี เอ๋ ชนม์สวัสดิ์ พร้อมเปิดใจทั้งน้ำตาขอโทษเพื่อน ๆ ที่ไม่ได้บอกกล่าว</h2>
    </div>
    <div class="stat">
      <div class="time"><i class="fa fa-clock-o"></i> 12 Dec 2014</div>
      <div class="statBox"><i class="fa fa-coffee"></i> 213 Read</div>
    </div>
  </div>
  <?php }?>
</div>

</body>
</html>