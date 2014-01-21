<?php include'../class/setting.php';?>
<?php
  $total = 10;

  // PAGE AND START
  if(!isset($_GET['page'])){
    $start = 0;
    $page = 1;
  }
  else{
    $start = $_GET['page']*$total-$total+1;
  }

	$var = $youtube->getChannelData($dbHandle,$_GET['id']);
  if($_GET['e'] == 'update'){
	 $data = $youtube->getVideoDataByChannelAPI($var['ch_username'],$start,$total);
	 $totalItems = $data['data']['totalItems'];
  }

  $feed = $_GET['feed'];
  $already = $_GET['already'];
  $page = $_GET['page'];
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

<header id="header"><i class="fa fa-facebook-square"></i> Youtube API => <?php echo $_GET['id'];?> (already: <?php echo $_GET['already'];?>)</header>

<div id="content">
  <div class="content">
    <div id="page">
      <div class="image"><img src="<?php echo $var['ch_image'];?>" alt=""></div>
      <div class="detail">
        <h1><?php echo $var['ch_title'];?></h1>
        <p><?php echo $var['ch_username'];?></p>
      </div>
      <div class="page">
        <div class="value"><?php echo $_GET['page'];?> / <?php echo number_format($totalItems/10);?></div>
        <p>page</p>
      </div>
      <div class="feed">
        <div class="value"><?php echo $feed;?></div>
        <p>feed</p>
      </div>
    </div>
    
    <?php if($_GET['e'] == 'start'){?>
    <div id="form">
      <form action="popup-update-youtube-channel.php?e=ready&id=<?php echo $var['ch_id'];?>" target="_parent" method="post">
      <select name="category" class="input-select s">
        <?php $category->listCategoryToSelectForm($dbHandle,10000,0);?>
      </select>

      <select name="status" class="input-select s">
        <option value="0">ฉบับร่าง</option>
        <option value="1">เผยแพร่ทันที</option>
      </select>

      <select name="http" class="input-select s">
        <!-- <option value="0">http</option> -->
        <option value="1" selected>https</option>
      </select>

      <input type="submit" class="input-submit" name="submit" value="เริ่มอัพเดท">
      </form>
    </div>
    <?php }?>

    <?php if($_GET['e'] == 'update'){?>
      <div class="loading"><img src="../image/loading4.gif"></div>
    <?php }?>

    <div id="result">
    <?php
    if($_GET['e'] == 'update'){
      if($data['data']['items']){
        foreach($data['data']['items'] as $data){
          $state = $youtube->newVideoYoutube($dbHandle,$_GET['category'],$data['title'],$data['description'],$data['duration'],'youtube',$data['thumbnail']['sqDefault'],$data['thumbnail']['hqDefault'],$data['id'],$data['uploader'],1,$_GET['status'],0);

          if($state == 'complete'){
            $feed++;
          }
          else if($state == 'already'){
            $already++;
          }

          include'../popup/video-update-item.php';
        }

        $page++;

        ?>
          <meta http-equiv="refresh" content="1;url=popup-update-youtube-channel.php?e=update&id=<?php echo $_GET['id'];?>&category=<?php echo $_GET['category'];?>&status=<?php echo $_GET['status'];?>&http=<?php echo $_GET['http'];?>&page=<?php echo $page;?>&feed=<?php echo $feed;?>&already=<?php echo $already;?>">
        <?php
      }
      else{
        ?>
          <meta http-equiv="refresh" content="1;url=popup-update-youtube-channel.php?e=start&id=<?php echo $_GET['id'];?>&category=<?php echo $_GET['category'];?>&status=<?php echo $_GET['status'];?>&http=<?php echo $_GET['http'];?>&page=<?php echo $page;?>&feed=<?php echo $feed;?>&already=<?php echo $already;?>">
        <?php
      }
    }
    if($_GET['e'] == 'ready'){
      ?>
        <meta http-equiv="refresh" content="1;url=popup-update-youtube-channel.php?e=update&id=<?php echo $var['ch_id'];?>&category=<?php echo $_POST['category'];?>&status=<?php echo $_POST['status'];?>&http=<?php echo $_POST['http'];?>&page=1&feed=0&already=0">
      <?php
    }
    ?>
    </div>
  </div>
</div>
</body>
</html>