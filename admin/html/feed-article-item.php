			<a href="../read-<?php echo $var['ar_id']+1024;?>-<?php echo parent::urlSEO($var['ar_title']);?>.html" target="_bank">
			<div class="item">
              <h1><i class="fa fa-book"></i> <?php echo $var['ar_title'];?></h1>
              <div class="time"><i class="fa fa-clock-o"></i> ชมล่าสุด <?php echo parent::fb_thaidate($var['ar_update_time']);?></div>
              <div class="value"><i class="fa fa-flag"></i> <?php echo $var['ar_c_view'];?></div>
            </div>
            </a>