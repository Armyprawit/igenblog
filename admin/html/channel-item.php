            <div class="videoItem" onClick="Javascript:toSelectChannel(<?php echo $var['ch_id'];?>);">
              <div class="image">
                <img src="<?php echo $var['ch_image'];?>">
              </div>
              <div class="info">
                <div class="head">
                  <div class="id">#<?php echo $var['ch_id']+1024;?></div>

                  <div class="category"></div>
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

                <div class="name"><?php echo $var['ch_title'];?> <span id="loading-<?php echo $var['vi_id'];?>"></span></div>
                <div class="description"><?php echo iconv_substr($var['ch_description'],0,320,"UTF-8").'...';?></div>
              </div>
            </div>