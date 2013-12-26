				<p><?php echo $var['se_title']?> <span id="loading-<?php echo $var['se_id']?>"></span></p>
                <input type="text" id="value-<?php echo $var['se_id']?>" class="input-text s" autocomplete="off" placeholder="<?php echo $var['se_placeholder']?>" onblur="Javascript:editSetting(<?php echo $var['se_id']?>,$('#value-<?php echo $var['se_id']?>').val());" value="<?php echo $var['se_value'];?>">
                <?php if($var['se_note'] != ''){
                	?><div class="text w"><?php echo $var['se_note'];?></div><?php
                }?>