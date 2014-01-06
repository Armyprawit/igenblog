<?php include'class/setting.php';?>
<?php
  $videoData = $video->getVideoData($dbHandle,$_GET['v']-1024);
  $_GET['c'] = $videoData['ca_url'];
  $video->updateStatus($dbHandle,'view',$videoData['vi_id']);
?>
<!doctype html>
<html>
<head>

<!-- favicon -->
<link rel="shortcut icon" href="image/favicon/icon.ico" />
<!-- For all other browsers -->
<link rel="icon" href="image/favicon/icon.ico"/>
<link rel="address bar icon" href="image/favicon/icon.ico">
<!-- For Modern Browsers with PNG Support -->
<link rel="icon" type="image/png" href="image/favicon/icon32x32.png" sizes="32x32">

<!-- For rounded corners and reflective shine in Apple devices -->
<!-- Default 57x57 -->
<link rel="apple-touch-icon" href="image/favicon/icon57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="image/favicon/icon72x72.png" />
<link rel="apple-touch-icon" sizes="144x144" href="image/favicon/icon144x144.png" />
<!-- Favicon without reflective shine -->
<link rel="apple-touch-icon-precomposed" href="image/favicon/icon57x57.png" />

<!-- ICON FOR Windows 8 -->
<meta name="msapplication-TileColor" content="#FFFFFF">
<meta name="msapplication-TileImage" content="image/favicon/icon72x72.png">


<!-- Meta Tag -->
<meta charset="utf-8">
<!-- Responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="google-site-verification" content="<?php echo $setting->getSetting($dbHandle,9);?>" />

<!-- Meta Tag Main -->
<meta name="description"          content="<?php echo $mydev->convTextToMetaTag($videoData['vi_description']);?>">
<meta name="keywords"             content="<?php echo $videoData['vi_keyword'];?>" />

<meta property="og:title"         content="<?php echo $mydev->convTextToMetaTag($videoData['vi_title']);?> &raquo; <?php echo $setting->getSetting($dbHandle,1);?>"/>
<meta property="og:description"   content="<?php echo $mydev->convTextToMetaTag($videoData['vi_description']);?>"/>
<meta property="og:url"           content="<?php echo $setting->getSetting($dbHandle,2);?>/play-<?php echo $videoData['vi_id']+1024;?>-<?php echo $mydev->urlSEO($videoData['vi_title']);?>.html"/>
<meta property="og:image"         content="<?php echo $videoData['vi_image_hd'];?>"/>

<meta property="og:type"          content="website"/>
<meta property="og:site_name"     content="<?php echo $setting->getSetting($dbHandle,5);?>"/>
<meta property="fb:app_id"        content="<?php echo $setting->getSetting($dbHandle,3);?>"/>
<meta property="fb:admins"        content="<?php echo $setting->getSetting($dbHandle,4);?>"/>

<meta name="author" content="Igensite">
<meta name="generator" content="IGenBlog 3.0" />

<!-- Add the following three tags inside head -->
<meta itemprop="name"             content="<?php echo $mydev->convTextToMetaTag($videoData['vi_title']);?> : <?php echo $setting->getSetting($dbHandle,1);?>">
<meta itemprop="description"      content="<?php echo $mydev->convTextToMetaTag($videoData['vi_description']);?>">
<meta itemprop="image"            content="<?php echo $videoData['vi_image_hd'];?>">

<title><?php echo $mydev->convTextToMetaTag($videoData['vi_title']);?> : <?php echo $setting->getSetting($dbHandle,1);?></title>

<!-- Style File -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link href='http://fonts.googleapis.com/css?family=Unica+One' rel='stylesheet' type='text/css'>

<!-- LIB -->
<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/jquery.imagefill.js" type="text/javascript"></script>
<script src="lib/mydev.js" type="text/javascript"></script>
<!-- Facebook Connect -->
<script src="js/facebook-connect.js" type="text/javascript"></script>
<!-- Update Analytic -->
<script src="js/ajax/analytic.js" type="text/javascript"></script>

<!-- Pinterest -->
<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
<!-- Tumblr -->
<script src="http://platform.tumblr.com/v1/share.js"></script>



</head>

<body>
<div id="fb-root"></div>
<input type="hidden" id="videoID" value="<?php echo $videoData['vi_id'];?>">

<?php
include'header.php';
?>

<div id="mainContent">
  <div class="mainContent">
    
    <div id="show">
      <h1><?php echo stripslashes($videoData['vi_title']);?></h1>
      <div class="stat">
        <div class="time"><i class="fa fa-clock-o"></i> <?php echo $mydev->fb_thaidate($videoData['vi_post_time']);?></div>
        <div class="time"><i class="fa fa-folder"></i> <a href="cat-<?php echo $videoData['ca_url'];?>.html" target="_parent"><?php echo $videoData['ca_title'];?></a></div>
        <div class="statBox"><i class="fa fa-coffee"></i> <?php echo $videoData['vi_c_view'];?> Read</div>
      </div>

      <!-- Type of Video Embed.
      1 = Youtube
      2 = Vimeo
      3 = Dailymotion
      4 = Facebook -->

      <?php
      if($videoData['vi_type'] == 1){
        // 1 = Youtube
        ?><div class="video"><iframe src="//www.youtube.com/embed/<?php echo $videoData['vi_code'];?>?version=3&amp&rel=0&showinfo=0&autohide=1&theme=light&autoplay=0" allowfullscreen></iframe></div><?php
      }
      else if($videoData['vi_type'] == 2){
        // 2 = Vimeo
        ?><div class="video"><iframe src="//player.vimeo.com/video/82557065" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><?php
      }
      else if($videoData['vi_type'] == 3){
        // 3 = Dailymotion
        ?><div class="video"><iframe src="http://www.dailymotion.com/embed/video/x14zqxn"></iframe></div><?php
      }
      else if($videoData['vi_type'] == 4){
        // 4 = Facebook
        ?><div class="video"><iframe src="http://www.facebook.com/video/embed?video_id=553655174718668" allowfullscreen></iframe></div><?php
      }
      ?>

      <!-- <div class="video"><iframe src="http://www.dailymotion.com/embed/video/x14zqxn"></iframe></div>
      <div class="video"><iframe src="//player.vimeo.com/video/82557065" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
      <div class="video"><iframe src="http://www.facebook.com/video/embed?video_id=553655174718668" allowfullscreen></iframe>
      <div class="video"><iframe src="//www.youtube.com/embed/xp8jgTl-xw0" allowfullscreen></iframe></div> --> 

      <div class="text"><?php echo nl2br(stripslashes($videoData['vi_text']));?></div>

      <?php include'html/video-share.php';?>

      <div class="comment">
        <div class="fb-comments" data-href="<?php echo $setting->getSetting($dbHandle,2);?>/play-<?php echo $videoData['vi_id']+1024;?>-<?php echo $mydev->urlSEO($videoData['vi_title']);?>.html" data-width="500" data-numposts="10" data-colorscheme="light"></div>
      </div>
    </div>

  </div>
</div>

<div id="feature">

  <!-- ZONE 4 -->
  <?php
  if($banner->countBanner($dbHandle,4)){
  ?>
  <div class="banner">
    <?php $banner->showBanner($dbHandle,4);?>
  </div>
  <?php
  }
  ?>


  <div class="likeBox">
    <div class="fb-like-box" data-href="<?php echo $setting->getSetting($dbHandle,12);?>" data-width="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
  </div>

  <!-- ZONE 2 -->
  <?php
  if($banner->countBanner($dbHandle,5)){
  ?>
  <div class="banner">
    <?php $banner->showBanner($dbHandle,5);?>
  </div>
  <?php
  }
  ?>


  <?php $timeline->getFeedTimeline($dbHandle,'feature','normal',1,$videoData['ca_id'],0,7);?>
  <?php $timeline->getFeedTimeline($dbHandle,'feature','normal',0,0,0,3);?>
</div>

<!-- Update Action after 12s. -->
<script type="text/javascript">
  $(document).ready(function(){
    setTimeout('updateWatch("video",$("#videoID").val());',5000);
  });
</script>

</body>
</html>