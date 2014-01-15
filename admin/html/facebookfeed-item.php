            <div class="facebookFeedItem" id="<?php echo $var['ff_id'];?>">
              <div class="image">
                <a href="<?php echo $var['ff_link'];?>" target="_bank">
                <img src="<?php echo $var['ff_picture'];?>">
                </a>
              </div>
              <div class="info">
                <div class="head">
                  <?php
                  if($var['ff_type'] == 'video'){
                    ?><div class="btn left normal" onclick="Javascript:feedToPost('video','<?php echo $var['ff_id'];?>');"><i class="fa fa-youtube-play"></i> โพสคลิป</div><?php
                  }
                  else if($var['ff_type'] == 'photo'){
                    ?>
                    <div class="btn left normal" onclick="Javascript:feedToPost('article','<?php echo $var['ff_id'];?>');"><i class="fa fa-coffee"></i> โพสบทความ</div>

                    <div class="btn left normal" onclick="Javascript:feedToPost('photo','<?php echo $var['ff_id'];?>');"><i class="fa fa-camera"></i> โพสภาพถ่าย</div>
                    <?php
                  }
                  ?>
                  <div class="btn right delete" ondblclick="Javascript:deleteFeed('<?php echo $var['ff_id'];?>');"><i class="fa fa-trash-o"></i> ลบ</div>
                  
                </div>

                <?php $var['fp_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['fp_title']);?>
                <?php $var['fp_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['fp_description']);?>

                <div class="fanpage"><i class="fa fa-clock-o"></i> <?php echo parent::fb_thaidate($var['ff_update_time']);?> / <a href="<?php echo $var['fp_link'];?>" target="_bank"><i class="fa fa-facebook-square"></i> <?php echo $var['fp_name'];?></a></div>
                <div class="description"><?php echo iconv_substr(stripslashes($var['ff_message']),0,300,"UTF-8").'...';?></div>
                
              </div>
            </div>