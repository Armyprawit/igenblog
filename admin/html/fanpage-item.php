            <div class="fanpageItem" onclick="Javascript:toSelectFanpage(<?php echo $var['fp_id'];?>);">
              <div class="image">
                <img src="https://graph.facebook.com/<?php echo $var['fp_id'];?>/picture">
              </div>
              <div class="info">
                <div class="head">

                  <?php
                  if($var['fp_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusFanpage(<?php echo $var['fp_id'];?>,<?php echo $var['fp_status'];?>);"><i class="fa fa-globe"></i> ทำงาน</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusFanpage(<?php echo $var['fp_id'];?>,<?php echo $var['fp_status'];?>);"><i class="fa fa-file-text-o"></i> ปิดอัพเดท</div><?php
                  }
                  ?>
                  
                  
                </div>

                <?php $var['fp_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['fp_title']);?>
                <?php $var['fp_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['fp_description']);?>

                <div class="fanpage"><i class="fa fa-clock-o"></i> <?php echo parent::fb_thaidate($var['ff_update_time']);?> / <a href="<?php echo $var['fp_link'];?>" target="_bank"><i class="fa fa-facebook-square"></i> <?php echo $var['fp_name'];?></a></div>
                <div class="name"><?php echo stripslashes($var['fp_name']);?> <span id="loading-<?php echo $var['vi_id'];?>"></span></div>
              </div>
            </div>