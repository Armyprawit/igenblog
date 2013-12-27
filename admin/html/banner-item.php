			<div class="bannerItem" onclick="Javascript:toSelectBanner(<?php echo $var['ba_id'];?>);">
              <div class="photo">
                <img src="<?php echo $var['ba_image'];?>">
              </div>
              <div class="info">
                <div class="zone">Position: <?php echo $var['ba_zone'];?></div>
                <div class="text"><?php echo $var['ba_title'];?> <span id="loading-<?php echo $var['ba_id'];?>"></span></div>
                <p><?php echo $var['ba_link'];?></p>
              </div>
            </div>