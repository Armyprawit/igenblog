<?php include'class/setting.php';?>
<?php
  $photoData = $image->getPhotoData($dbHandle,$_GET['i']-1024);
  $_GET['c'] = $photoData['ca_url'];
  $image->updateStatus($dbHandle,'view',$photoData['im_id']);
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
<meta name="description"          content="<?php echo $mydev->convTextToMetaTag($photoData['im_description']);?>">
<meta name="keywords"             content="<?php echo $photoData['im_keyword'];?>" />

<meta property="og:title"         content="<?php echo $mydev->convTextToMetaTag(iconv_substr($photoData['im_description'],0,70,"UTF-8"));?> : <?php echo $setting->getSetting($dbHandle,1);?>"/>
<meta property="og:description"   content="<?php echo $mydev->convTextToMetaTag($photoData['im_description']);?>"/>
<meta property="og:url"           content="<?php echo $setting->getSetting($dbHandle,2);?>/image-<?php echo $photoData['im_id']+1024;?>-<? echo $mydev->urlSEO(iconv_substr($photoData['im_text'],0,70,"UTF-8"));?>.html"/>
<meta property="og:image"         content="<?php echo $photoData['im_image'];?>"/>

<meta property="og:type"          content="website"/>
<meta property="og:site_name"     content="<?php echo $setting->getSetting($dbHandle,5);?>"/>
<meta property="fb:app_id"        content="<?php echo $setting->getSetting($dbHandle,3);?>"/>
<meta property="fb:admins"        content="<?php echo $setting->getSetting($dbHandle,4);?>"/>

<meta name="author" content="Igensite">
<meta name="generator" content="IGenBlog 1.0" />

<!-- Add the following three tags inside head -->
<meta itemprop="name"             content="<?php echo $mydev->convTextToMetaTag(iconv_substr($photoData['im_description'],0,70,"UTF-8"));?> : <?php echo $setting->getSetting($dbHandle,1);?>">
<meta itemprop="description"      content="<?php echo $mydev->convTextToMetaTag($photoData['im_description']);?>">
<meta itemprop="image"            content="<?php echo $photoData['im_image'];?>">

<title><?php echo $mydev->convTextToMetaTag(iconv_substr($photoData['im_description'],0,70,"UTF-8"));?> : <?php echo $setting->getSetting($dbHandle,1);?></title>

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

<!-- Add jQuery library -->
<!-- <script type="text/javascript" src="lib/fancyBox/lib/jquery-1.10.1.min.js"></script> -->

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="lib/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="lib/fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="lib/fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="lib/fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="lib/fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="lib/fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="lib/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="lib/fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    
<!-- Photo LightBox Fancy -->
<script type="text/javascript" src="lib/photo-fancy-light-box.js"></script>

</head>

<body>

<div id="fb-root"></div>
<input type="hidden" id="photoID" value="<?php echo $photoData['im_id'];?>">

<?php
include'header.php';
?>

<div id="mainContent">
  <div class="mainContent">
    
    <div id="show">
      <h1 class="hidden"><?php echo stripslashes($photoData['im_description']);?></h1>
      <div class="stat">
        <div class="time"><i class="fa fa-clock-o"></i> <?php echo $mydev->fb_thaidate($photoData['im_post_time']);?></div>
        <div class="time"><i class="fa fa-folder"></i> <a href="cat-<?php echo $photoData['ca_url'];?>.html" target="_parent"><?php echo $photoData['ca_title'];?></a></div>
        <div class="statBox"><i class="fa fa-coffee"></i> <?php echo $photoData['im_c_view'];?> Read</div>
      </div>

      <div class="photo">
        <a class="fancybox" rel="group" href="<?php echo $photoData['im_image'];?>" title="<?php echo stripslashes($photoData['im_description']);?>">
        <img  src="<?php echo $photoData['im_image'];?>" alt="">
        </a>
      </div>

      <div class="text"><?php echo stripslashes($photoData['im_text']);?></div>

      <?php include'html/photo-share.php';?>

      <div class="comment">
        <div class="fb-comments" data-href="http://example.com/comments" data-width="500" data-numposts="10" data-colorscheme="light"></div>
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

  <?php $timeline->getFeedTimeline($dbHandle,'feature','normal',3,$photoData['ca_id'],0,7);?>
  <?php $timeline->getFeedTimeline($dbHandle,'feature','normal',0,0,0,3);?>
</div>

<!-- Update Action after 12s. -->
<script type="text/javascript">
  $(document).ready(function(){
    setTimeout('updateWatch("photo",$("#photoID").val());',12000);
  });
</script>

</body>
</html>

<?php
  // Analytic Event to log
  $log['url'] = 'image.php';
  $log['target'] = 'image';
  $log['action'] = 'view';
  $log['user'] = '0';

  $analytic->updatePageview($dbHandle,1);
  $analytic->updatePageview($dbHandle,8);

  include'footer.php';
?>