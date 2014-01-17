			<div class="categoryItem" onClick="Javascript:showCategory(<?php echo $var['ca_id'];?>);" id="<?php echo $var['ca_id'];?>">
				<div class="info">
					<div class="head">

                  <div class="btn left delete"><?php echo $var['ca_url'];?></div>
                  <?php
                  if($var['ca_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusCategory(<?php echo $var['ca_id'];?>,<?php echo $var['ca_status'];?>);">เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusCategory(<?php echo $var['ca_id'];?>,<?php echo $var['ca_status'];?>);">แบบร่าง</div><?php
                  }
                  ?>

                  <?php
                  if($var['ca_id'] != 10000){
                  ?>
                  <div class="btn right delete" ondblclick="Javascript:deleteCategory('<?php echo $var['ca_id'];?>');">ลบ</div>
                  <?php
                  }?>
              		
              	</div>
              	</div>

				<?php $var['ca_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ca_title']);?>
				<?php $var['ca_url'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ca_url']);?>
				<?php $var['ca_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ca_description']);?>

            	<div class="name">
            		<i class="fa fa-folder-o"></i> <span id="loading-<?php echo $var['ca_id'];?>"></span> <?php echo $var['ca_title'];?> 
            	</div>
            	<div class="description"><?php echo $var['ca_description'];?></div>
            </div>