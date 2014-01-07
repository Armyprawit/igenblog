<?php include'class/setting.php';?>
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
<meta name="description"          content="<?php echo $setting->getSetting($dbHandle,16);?>">
<meta name="keywords"             content="<?php echo $setting->getSetting($dbHandle,24);?>" />

<meta property="og:title"         content="บทความ : <?php echo $setting->getSetting($dbHandle,1);?>"/>
<meta property="og:description"   content="<?php echo $setting->getSetting($dbHandle,16);?>"/>
<meta property="og:url"           content="<?php echo $setting->getSetting($dbHandle,2);?>/article.php"/>
<meta property="og:image"         content="<?php echo $setting->getSetting($dbHandle,2);?>/logo.png"/>

<meta property="og:type"          content="website"/>
<meta property="og:site_name"     content="<?php echo $setting->getSetting($dbHandle,5);?>"/>
<meta property="fb:app_id"        content="<?php echo $setting->getSetting($dbHandle,3);?>"/>
<meta property="fb:admins"        content="<?php echo $setting->getSetting($dbHandle,4);?>"/>

<meta name="author" content="Igensite">
<meta name="generator" content="IGenBlog 3.0" />

<!-- Add the following three tags inside head. -->
<meta itemprop="name" content="บทความ : <?php echo $setting->getSetting($dbHandle,1);?>">
<meta itemprop="description" content="<?php echo $setting->getSetting($dbHandle,16);?>">
<meta itemprop="image" content="<?php echo $setting->getSetting($dbHandle,2);?>/logo.png">

<title>บทความ : <?php echo $setting->getSetting($dbHandle,1);?></title>

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

<!-- AJAX -->
<script src="js/ajax/feed.js" type="text/javascript"></script>

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

<input type="hidden" id="category" value="0">
<input type="hidden" id="type" value="2">

<?php
include'header.php';
?>

<div id="mainContent">
  <div class="mainContent" id="feedDisplay">
  	<div id="title">
  		<h1>Article</h1>
  		<p><i class="fa fa-quote-left"></i> Article of The Day. <i class="fa fa-quote-right"></i></p>
  	</div>
    <?php $timeline->getFeedTimeline($dbHandle,'feed','normal',2,0,0,21);?>
  </div>
</div>

</body>
</html>