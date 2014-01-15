            <div class="videoItem" onClick="Javascript:toSelectVideo(<?php echo $var['vi_id'];?>);">
              <div class="image">
                <img src="<?php echo $var['vi_image_hd'];?>">
              </div>
              <div class="info">
                <div class="head">
                  <div class="btn left delete"><?php echo $var['vi_id']+1024;?></div>

                  <div class="btn right delete" onClick="Javascript:modeListVideo(<?php echo $var['ca_id'];?>);$('#categoryMode').val('<?php echo $var['ca_id'];?>');"><i class="fa fa-folder-open"></i> <?php echo $var['ca_title'];?></div>
                  <?php
                  if($var['vi_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusVideo(<?php echo $var['vi_id'];?>,<?php echo $var['vi_status'];?>);"><i class="fa fa-globe"></i> เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusVideo(<?php echo $var['vi_id'];?>,<?php echo $var['vi_status'];?>);"><i class="fa fa-file-text-o"></i> แบบร่าง</div><?php
                  }
                  ?>
                  
                  
                </div>

                <?php $var['vi_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['vi_title']);?>
                <?php $var['vi_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['vi_description']);?>

                <div class="name"><?php echo stripslashes($var['vi_title']);?> <span id="loading-<?php echo $var['vi_id'];?>"></span></div>
                <div class="link"><?php echo $var['vi_code'];?></div>
                <div class="description"><?php echo iconv_substr(stripslashes($var['vi_description']),0,250,"UTF-8").'...';?></div>
              </div>
            </div>