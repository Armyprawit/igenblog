			<a href="../image-<?php echo $var['im_id']+1024;?>-<?php echo parent::urlSEO(iconv_substr($var['im_description'],0,70,"UTF-8"));?>.html" target="_bank">
			<div class="item">
              <h1><i class="fa fa-camera"></i> <?php echo stripslashes($var['im_description']);?></h1>
              <div class="time"><i class="fa fa-clock-o"></i> ชมล่าสุด <?php echo parent::fb_thaidate($var['im_update_time']);?></div>
              <div class="value"><i class="fa fa-flag"></i> <?php echo $var['im_c_view'];?></div>
            </div>
            </a>