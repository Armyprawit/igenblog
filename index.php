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
<link href='http://fonts.googleapis.com/css?family=Unica+One' rel='stylesheet' type='text/css'>

<!-- LIB -->
<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/jquery.imagefill.js" type="text/javascript"></script>
<script src="lib/mydev.js" type="text/javascript"></script>

<!-- AJAX -->
<script src="js/ajax/feed.js" type="text/javascript"></script>

</head>

<body>

<input type="hidden" id="category" value="0">
<input type="hidden" id="type" value="0">

<?php
include'header.php';
?>

<div id="mainContent">
  <div class="mainContent" id="feedDisplay">
    <?php $timeline->getFeedTimeline($dbHandle,'normal',0,0,0,21);?>
  </div>
</div>

</body>
</html>