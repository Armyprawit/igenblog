			<a href="../play-<?php echo $var['vi_id']+1024;?>-<?php echo parent::urlSEO($var['vi_title']);?>.html" target="_bank">
			<div class="item">
              <h1><i class="fa fa-youtube-play"></i> <?php echo $var['vi_title'];?></h1>
              <div class="time"><i class="fa fa-clock-o"></i> ชมล่าสุด <?php echo parent::fb_thaidate($var['vi_update_time']);?></div>
              <div class="value"><i class="fa fa-flag"></i> <?php echo $var['vi_c_view'];?></div>
            </div>
            </a>