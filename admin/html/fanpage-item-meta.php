            <div class="videoItem">
              <div class="image">
                <img src="https://graph.facebook.com/<?php echo $fanpage['id'];?>/picture">
              </div>
              <div class="info">
                <div class="head">
                  <div class="id">#<?php echo $fanpage['id'];?></div>

                  <div class="category"><?php //echo parent::fb_thaidate($var['ch_update_time']);?></div>
                  <?php
                  if($var['ch_status'] == 1){
                    ?><div class="status s" onClick="Javascript:statusChannel(<?php echo $var['ch_id'];?>,<?php echo $var['ch_status'];?>);"><i class="fa fa-globe"></i> ทำงาน</div><?php
                  }
                  else{
                    ?><div class="status d" onClick="Javascript:statusChannel(<?php echo $var['ch_id'];?>,<?php echo $var['ch_status'];?>);"><i class="fa fa-file-text-o"></i> ปิดอัพเดท</div><?php
                  }
                  ?>
                  
                  
                </div>

                <?php $var['ch_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ch_title']);?>
                <?php $var['ch_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ch_description']);?>

                <div class="name"><?php echo $fanpage['name'];?> <span id="loading-<?php echo $var['vi_id'];?>"></span></div>
                <div class="description"><?php echo $fanpage['link'];?></div>
              </div>
            </div>