    <div class="feedItem">

      <a href="play-<?php echo $var['vi_id']+1024;?>-<?php echo parent::urlSEO($var['vi_title']);?>.html" target="_blank">
      <div class="image">
      <img class="img" src="<?php echo $var['vi_image_hd']?>" alt="">
      </div>
      </a>
      
      <div class="detail">
        <h1><a href="play-<?php echo $var['vi_id']+1024;?>-<?php echo parent::urlSEO($var['vi_title']);?>.html" target="_blank"><?php echo $var['vi_title']?></a></h1>
        <p><?php echo $var['vi_description']?></p>
      </div>
      <div class="stat">
        <div class="time"><i class="fa fa-clock-o"></i> <?php echo parent::fb_thaidate($var['vi_post_time']);?></div>
        <div class="time"><i class="fa fa-folder"></i> <?php echo $var['ca_title'];?></div>
        <div class="statBox"><i class="fa fa-coffee"></i> 213 Read</div>
      </div>
    </div>