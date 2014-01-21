<?php include'class/setting.php';?>
<?php
	$categoryData = $category->getCategoryDataByURL($dbHandle,$_GET['c']);
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
<meta name="description"          content="<?php echo $categoryData['ca_description'];?>">
<meta name="keywords"             content="<?php echo $categoryData['ca_keyword'];?>" />

<meta property="og:title"         content="<?php echo $categoryData['ca_title'];?> : <?php echo $setting->getSetting($dbHandle,1);?>"/>
<meta property="og:description"   content="<?php echo $categoryData['ca_description'];?>"/>
<meta property="og:url"           content="<?php echo $setting->getSetting($dbHandle,2);?>/cat-<?php echo $categoryData['ca_url'];?>.html"/>
<meta property="og:image"         content="<?php echo $categoryData['ca_image'];?>"/>

<meta property="og:type"          content="website"/>
<meta property="og:site_name"     content="<?php echo $setting->getSetting($dbHandle,5);?>"/>
<meta property="fb:app_id"        content="<?php echo $setting->getSetting($dbHandle,3);?>"/>
<meta property="fb:admins" 		  content="<?php echo $setting->getSetting($dbHandle,4);?>"/>

<meta name="author" content="Igensite">
<meta name="generator" content="IGenBlog 3.0" />

<!-- Add the following three tags inside head. -->
<meta itemprop="name" content="<?php echo $categoryData['ca_title'];?> : <?php echo $setting->getSetting($dbHandle,1);?>">
<meta itemprop="description" content="<?php echo $categoryData['ca_description'];?>">
<meta itemprop="image" content="<?php echo $categoryData['ca_image'];?>">

<title><?php echo $categoryData['ca_title'];?> : <?php echo $setting->getSetting($dbHandle,1);?></title>

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

</head>

<body>

<input type="hidden" id="category" value="<?php echo $categoryData['ca_id'];?>">
<input type="hidden" id="type" value="4">

<?php
include'header.php';
?>

<div id="mainContent">
  <div class="mainContent" id="feedDisplay">
  	<div id="title">
  		<h1><?php echo $categoryData['ca_title'];?></h1>
  		<p><i class="fa fa-quote-left"></i> <?php echo $categoryData['ca_description'];?> <i class="fa fa-quote-right"></i></p>
  	</div>
    <?php $timeline->getFeedTimeline($dbHandle,'feed','normal',4,$categoryData['ca_id'],0,21);?>
  </div>
  <div class="loading" id="loadingMore"><i class="fa fa-spinner fa-spin"></i> กำลังโหลด...</div>
</div>

</body>
</html>

<?php
	// Analytic Event to log
	$log['url'] = 'category.php';
	$log['target'] = 'category';
	$log['action'] = 'view';
	$log['user'] = '0';

	$analytic->updatePageview($dbHandle,1);
	$analytic->updatePageview($dbHandle,10);

	include'footer.php';
?>