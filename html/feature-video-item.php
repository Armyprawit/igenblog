<div class="featureItem">
	<a href="play-<?php echo $var['vi_id']+1024;?>-<?php echo parent::urlSEO($var['vi_title']);?>.html" target="_parent">
    <div class="photo">
    	<img class="img" src="<?php echo $var['vi_image_hd']?>" alt="">
      <div class="tri"></div>
      <div class="duration"><?php echo parent::convDuration($var['vi_duration']);?></div>
    </div>
    </a>

    <div class="detail">
      <h2><a href="play-<?php echo $var['vi_id']+1024;?>-<?php echo parent::urlSEO($var['vi_title']);?>.html" target="_parent"><?php echo stripslashes($var['vi_title']);?> <i class="fa fa-youtube-play"></i></a></h2>
    </div>
    <div class="stat">
      <div class="time"><i class="fa fa-clock-o"></i> <?php echo parent::fb_thaidate($var['vi_post_time']);?></div>
        <div class="time"><i class="fa fa-folder"></i> <a href="cat-<?php echo $var['ca_url'];?>.html" target="_parent"><?php echo $var['ca_title'];?></a></div>
        <div class="statBox"><i class="fa fa-coffee"></i> <?php echo $var['vi_c_view'];?> เข้าชม</div>
    </div>
  </div>