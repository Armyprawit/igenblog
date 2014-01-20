            <div class="photoItem">
              <div class="photo" onClick="Javascript:toSelectPhoto(<?php echo $var['im_id'];?>);">
                <img src="<?php echo $var['im_image'];?>">
              </div>
              <div class="info">
              	<div class="head">
                  <!-- <div class="btn left delete"><?php //echo $var['im_id']+1024;?></div> -->

                  <div class="btn right delete" onClick="Javascript:modeListPhoto(<?php echo $var['ca_id'];?>);$('#categoryMode').val('<?php echo $var['ca_id'];?>');"><?php echo $var['ca_title'];?></div>

                  <div id="status-<?php echo $var['im_id'];?>">
                  <?php
                  if($var['im_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusPhoto(<?php echo $var['im_id'];?>,<?php echo $var['im_status'];?>);">เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusPhoto(<?php echo $var['im_id'];?>,<?php echo $var['im_status'];?>);">แบบร่าง</div><?php
                  }
                  ?>
                  </div>

                  <div class="btn left loading" id="loading-<?php echo $var['im_id'];?>"></div>
                  
                </div>
                <div class="text">
                	<?php echo stripslashes($var['im_description']);?> <a href="../image-<?php echo $var['im_id']+1024;?>-<?php echo parent::urlSEO(iconv_substr($var['im_description'],0,70,"UTF-8"));?>.html" target="_bank"><i class="fa fa-globe"></i></a> <span id="loading-<?php echo $var['im_id'];?>"></span>
                </div>
              </div>
            </div>