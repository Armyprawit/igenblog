			<div class="bannerItem">
              <div class="photo" onclick="Javascript:toSelectBanner(<?php echo $var['ba_id'];?>);">
                <img src="<?php echo $var['ba_image'];?>">
              </div>
              <div class="info">
              	<div class="head">
                  <!-- <div class="btn left delete"><?php //echo $var['ba_id']+1024;?></div> -->

                  <div class="btn right delete" onClick="Javascript:modeListBanner(<?php echo $var['ba_zone'];?>);$('#categoryMode').val('<?php echo $var['ba_zone'];?>');">ZONE <?php echo $var['ba_zone'];?></div>

                  <div id="status-<?php echo $var['ba_id'];?>">
                  <?php
                  if($var['ba_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusBanner(<?php echo $var['ba_id'];?>,<?php echo $var['ba_status'];?>);">เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusBanner(<?php echo $var['ba_id'];?>,<?php echo $var['ba_status'];?>);">แบบร่าง</div><?php
                  }
                  ?>
                  </div>
                  
                  
                </div>

                <div class="text"><?php echo $var['ba_title'];?> <span id="loading-<?php echo $var['ba_id'];?>"></span></div>
                <p><i class="fa fa-link"></i> <?php echo $var['ba_link'];?></p>
              </div>
            </div>