<div class="featureItem">
	<a href="read-<?php echo $var['ar_id']+1024;?>-<?php echo parent::urlSEO($var['ar_title']);?>.html" target="_parent">
    <div class="photo">
    	<img class="img" src="<?php echo $var['ar_image']?>" alt="">
        <div class="tri"></div>
    </div>
    </a>

    <div class="detail">
      <h2><a href="read-<?php echo $var['ar_id']+1024;?>-<?php echo parent::urlSEO($var['ar_title']);?>.html" target="_parent"><?php echo stripslashes($var['ar_title']);?> <i class="fa fa-book"></i></a></h2>
    </div>
    <div class="stat">
    	<div class="time"><i class="fa fa-clock-o"></i> <?php echo parent::fb_thaidate($var['ar_post_time']);?></div>
    	<div class="time"><i class="fa fa-folder"></i> <a href="cat-<?php echo $var['ca_url'];?>.html" target="_parent"><?php echo $var['ca_title'];?></a></div>
        <div class="statBox"><i class="fa fa-coffee"></i> <?php echo $var['ar_c_view'];?> อ่านแล้ว</div>
    </div>
  </div>