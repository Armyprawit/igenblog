            <div class="fanpageItem" id="<?php echo $var['fp_id'];?>" onclick="Javascript:toSelectFanpage(<?php echo $var['fp_id'];?>);">
              <div class="image">
                <img src="https://graph.facebook.com/<?php echo $var['fp_id'];?>/picture">
              </div>
              <div class="info">
                <div class="head">

                  <?php
                  if($var['fp_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusFanpage(<?php echo $var['fp_id'];?>,<?php echo $var['fp_status'];?>);">ทำงาน</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusFanpage(<?php echo $var['fp_id'];?>,<?php echo $var['fp_status'];?>);">ปิดอัพเดท</div><?php
                  }
                  ?>

                  <div class="btn right delete" ondblclick="Javascript:deletePage('<?php echo $var['fp_id'];?>');">ลบ</div>

                  <div class="btn left loading" id="loading-<?php echo $var['fp_id'];?>"></div>
                  
                </div>

                <?php $var['fp_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['fp_title']);?>
                <?php $var['fp_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['fp_description']);?>

                <div class="fanpage"><i class="fa fa-clock-o"></i> ล่าสุด: <?php echo parent::fb_thaidate($var['fp_update_time']);?> / <a href="<?php echo $var['fp_link'];?>" target="_bank"><i class="fa fa-facebook-square"></i> <?php echo $var['fp_name'];?></a></div>
                <div class="name"><?php echo stripslashes($var['fp_name']);?> <span id="loading-<?php echo $var['vi_id'];?>"></span></div>
              </div>
            </div>