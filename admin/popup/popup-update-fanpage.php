<?php include'../class/setting.php';?>
<?php require'../sdk/facebook-sdk/facebook.php';?>
<?php include'../get-facebook-user.php'?>
<?php
	$facebookpageData = $facebookpage->getFanpageData($dbHandle,$_GET['id']);
	if($_GET['e']=="update"){
		try{
			if($_GET['until']!=""){
				$fanpage = $facebook->api('/'.$_GET['id'].'/feed?limit=10&until='.$_GET['until']);
			}
			else{
				$fanpage = $facebook->api('/'.$_GET['id'].'/feed?limit=10');
			}
		}
		catch(FacebookApiException $e){
			error_log($e);
			$user = null;
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>อัพเดท : IGENBLOG <?php echo $setting->getSetting($dbHandle,26);?></title>

<!-- Favicon -->
<link rel="shortcut icon" href="../image/favicon/icon.ico" />

<!-- Style File -->
<link rel="stylesheet" href="../css/reset.css" type="text/css"/>
<link rel="stylesheet" href="../css/popup.css" type="text/css"/>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

<!-- LIB -->
<script src="../lib/jquery-1.7.2.min.js" type="text/javascript"></script>

</head>

<body>

<!-- All Script -->
<script type="text/javascript">
  window.onkeyup = function (event) {
    if (event.keyCode == 27) {
      window.close ();
    }
  }
</script>

<header id="header"><i class="fa fa-facebook-square"></i> Facebook API => <?php echo $_GET['id'];?> (already: <?php echo $_GET['already'];?>)</header>

<div id="content">
  <div class="content">
    <div id="page">
      <div class="image"><img src="https://graph.facebook.com/<?php echo $facebookpageData['fp_id'];?>/picture" alt=""></div>
      <div class="detail">
        <h1><?php echo $facebookpageData['fp_name'];?></h1>
        <p><?php echo $facebookpageData['fp_link'];?></p>
      </div>
      <div class="page">
        <div class="value"><?php echo $_GET['page'];?></div>
        <p>page</p>
      </div>
      <div class="feed">
        <div class="value"><?php echo $_GET['feed'];?></div>
        <p>feed</p>
      </div>
    </div>
	<?php if($_GET['e'] == 'update'){?>
    <div class="loading"><img src="../image/loading4.gif"></div>
	<?php }?>

    <div id="result">
	<?php
	$feed = $_GET['feed'];
	$already = $_GET['already'];
	if($user && $_GET['e']=="update"){
		foreach($fanpage['data'] as $page){
			try{
				// Proceed knowing you have a logged in user who's authenticated.
				$ob = $facebook->api($page['object_id']);
			}catch(FacebookApiException $e){
				error_log($e);
			}
			
			$state = $facebookpage->addFacebookFeed($dbHandle,$page['id'],$page['object_id'],$_GET['id'],$page['message'],$page['link'],$page['name'],$page['description'],$page['picture'],$ob['source'],$ob['embed_html'],$page['created_time'],$page['updated_time'],$page['type'],1,0);
			
			?>
			<div class="resultItem <?php if($state == 'already'){echo'already';}?>">
				<div class="type">
				<?php
				if($page['type'] == 'photo'){
					echo'<i class="fa fa-camera"></i>';
				}
				else if($page['type'] == 'video'){
					echo'<i class="fa fa-youtube-play"></i>';
				}
				else if($page['type'] == 'link'){
					echo'<i class="fa fa-link"></i>';
				}
				else if($page['type'] == 'status'){
					echo'<i class="fa fa-comment"></i>';
				}
				?>
				</div>
				<div class="id"><?php echo $page['id'];?></div>
				<?php
				if($state == 'complete'){
					$stateMsg = 'อัพเดท';
				}
				else if($state == 'already'){
					$stateMsg = 'มีแล้ว';
					$already++;
				}
				?>
				<div class="status done"><?php echo $stateMsg;?></div>
			</div>
			<?php
			
			$feed++;
		}
		
		if(($_GET['e'] == "update" && $_GET['until'] == "" && $_GET['page'] > 1) || ($already > 100)){
			?>
			<meta http-equiv="refresh" content="2;url=popup-update-fanpage.php?id=<?php echo $_GET['id'];?>&page=<?php echo $_GET['page'];?>&feed=<?php echo $feed;?>&already=<?php echo $already;?>">
			<?php
		}
		else{
			?>
			<meta http-equiv="refresh" content="2;url=popup-update-fanpage.php?e=update&id=<?php echo $_GET['id'];?>&until=<?php echo substr($fanpage['paging']['next'],-10,10);?>&page=<?php echo ++$_GET['page'];?>&feed=<?php echo $feed;?>&already=<?php echo $already;?>">
			<?php
		}
	}
	?>
    </div>
  </div>
</div>

<?php
if($_GET['e'] == 'update'){
?>
<a href="popup-update-fanpage.php?id=<?php echo $_GET['id'];?>" target="_parent">
<div id="stopBtn"><i class="fa fa-stop"></i> หยุดอัพเดท</div>
</a>
<?php
}
else{
?>
<a href="popup-update-fanpage.php?id=<?php echo $_GET['id'];?>&e=update&page=1&feed=0&already=0" target="_parent">
<div id="stopBtn"><i class="fa fa-play"></i> เริ่มอัพเดท</div>
</a>
<?php
}
?>

</body>
</html>