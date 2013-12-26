				<p><?php echo $var['se_title']?></p>
                <input type="text" name="link" id="link" class="input-text s" autocomplete="off" onBlur="Javascript:;" value="<?php echo $var['se_placeholder']?>">
                <?php if($var['se_note'] != ''){
                	?><div class="text w"><?php echo $var['se_note'];?></div><?php
                }?>