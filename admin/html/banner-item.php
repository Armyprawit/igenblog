			<div class="bannerItem" onclick="Javascript:toSelectBanner(<?php echo $var['ba_id'];?>);">
              <div class="photo">
                <img src="<?php echo $var['ba_image'];?>">
              </div>
              <div class="info">
              	<div class="head">
                  <div class="id">#<?php echo $var['ba_id']+1024;?></div>

                  <div class="category" onClick="Javascript:modeListBanner(<?php echo $var['ba_zone'];?>);$('#categoryMode').val('<?php echo $var['ba_zone'];?>');"><i class="fa fa-folder-open"></i> ZONE <?php echo $var['ba_zone'];?></div>
                  <?php
                  if($var['ba_status'] == 1){
                    ?><div class="status s" onClick="Javascript:statusBanner(<?php echo $var['ba_id'];?>,<?php echo $var['ba_status'];?>);"><i class="fa fa-globe"></i> เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="status d" onClick="Javascript:statusBanner(<?php echo $var['ba_id'];?>,<?php echo $var['ba_status'];?>);"><i class="fa fa-file-text-o"></i> แบบร่าง</div><?php
                  }
                  ?>
                  
                  
                </div>

                <div class="text"><?php echo $var['ba_title'];?> <span id="loading-<?php echo $var['ba_id'];?>"></span></div>
                <p><?php echo $var['ba_link'];?></p>
              </div>
            </div>