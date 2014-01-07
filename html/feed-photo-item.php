    <div class="feedItem">
      
      <a href="image-<?php echo $var['im_id']+1024;?>-<?php echo parent::urlSEO(iconv_substr($var['im_description'],0,70,"UTF-8"));?>.html" target="_parent">
      <div class="image">
        <img class="img" src="<?php echo $var['im_image']?>" alt="">
        <div class="tri"></div>
      </div>
      </a>

      <div class="detail">
        <h1><a href="image-<?php echo $var['im_id']+1024;?>-<?php echo parent::urlSEO(iconv_substr($var['im_description'],0,70,"UTF-8"));?>.html" target="_parent"><?php echo stripslashes($var['im_title']);?> <i class="fa fa-camera"></i></a></h1>
        <p><?php echo stripslashes($var['im_description']);?></p>
      </div>
      <div class="stat">
        <div class="time"><i class="fa fa-clock-o"></i> <?php echo parent::fb_thaidate($var['im_post_time']);?></div>
        <div class="time"><i class="fa fa-folder"></i> <a href="cat-<?php echo $var['ca_url'];?>.html" target="_parent"><?php echo $var['ca_title'];?></a></div>
        <div class="statBox"><i class="fa fa-coffee"></i> <?php echo $var['im_c_view'];?> เข้าชม</div>
      </div>
    </div>