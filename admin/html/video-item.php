            <div class="videoItem">
              <div class="image" onClick="Javascript:toSelectVideo(<?php echo $var['vi_id'];?>);">
                <img src="<?php echo $var['vi_image_hd'];?>">
              </div>
              <div class="info">
                <div class="head">
                  <!-- <div class="btn left delete"><?php //echo $var['vi_id']+1024;?></div> -->

                  <div class="btn right delete" onClick="Javascript:modeListVideo(<?php echo $var['ca_id'];?>);$('#categoryMode').val('<?php echo $var['ca_id'];?>');"><?php echo $var['ca_title'];?></div>
                  <div id="status-<?php echo $var['vi_id'];?>">
                  
                  <?php
                  if($var['vi_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusVideo(<?php echo $var['vi_id'];?>,<?php echo $var['vi_status'];?>);">เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusVideo(<?php echo $var['vi_id'];?>,<?php echo $var['vi_status'];?>);">แบบร่าง</div><?php
                  }
                  ?>
                  </div>

                  <div class="btn left loading" id="loading-<?php echo $var['vi_id'];?>"></div>
                  
                </div>

                <?php $var['vi_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['vi_title']);?>
                <?php $var['vi_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['vi_description']);?>

                <div class="name"><?php echo stripslashes($var['vi_title']);?> <span id="loading-<?php echo $var['vi_id'];?>"> <a href="../play-<?php echo $var['vi_id']+1024;?>-<?php echo parent::urlSEO($var['vi_title']);?>.html" target="_bank"><i class="fa fa-globe"></i></a> </span></div>
                <div class="link"><?php echo $var['vi_code'];?></div>
                <div class="description"><?php echo iconv_substr(stripslashes($var['vi_description']),0,120,"UTF-8").'...';?></div>
              </div>
            </div>