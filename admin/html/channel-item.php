            <div class="channelItem" onClick="Javascript:toSelectChannel(<?php echo $var['ch_id'];?>);">
              <div class="image">
                <img src="<?php echo $var['ch_image'];?>">
              </div>
              <div class="info">
                <div class="head">
                  <!-- <div class="btn left delete">#<?php //echo $var['ch_id']+1024;?></div> -->
                  <?php
                  if($var['ch_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusChannel(<?php echo $var['ch_id'];?>,<?php echo $var['ch_status'];?>);">ทำงาน</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusChannel(<?php echo $var['ch_id'];?>,<?php echo $var['ch_status'];?>);">ปิดอัพเดท</div><?php
                  }
                  ?>
                  
                  
                </div>

                <?php $var['ch_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ch_title']);?>
                <?php $var['ch_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ch_description']);?>

                <div class="fanpage"><i class="fa fa-clock-o"></i> <?php echo parent::fb_thaidate($var['ch_update_time']);?> / <a href="http://www.youtube.com/user/<?php echo $var['ch_username'];?>" target="_bank"><i class="fa fa-youtube-play"></i> <?php echo $var['ch_username'];?></a></div>

                <div class="name"><?php echo $var['ch_title'];?> <span id="loading-<?php echo $var['vi_id'];?>"></span></div>
                <div class="description"><?php echo iconv_substr($var['ch_description'],0,320,"UTF-8").'...';?></div>
              </div>
            </div>