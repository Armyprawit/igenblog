			<div class="categoryItem" onClick="Javascript:showCategory(<?php echo $var['ca_id'];?>);">
				<div class="info">
					<div class="head">

                  <div class="btn left delete"><i class="fa fa-hand-o-up"></i> <?php echo $var['ca_url'];?></div>
                  <?php
                  if($var['ca_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusCategory(<?php echo $var['ca_id'];?>,<?php echo $var['ca_status'];?>);"><i class="fa fa-globe"></i> เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusCategory(<?php echo $var['ca_id'];?>,<?php echo $var['ca_status'];?>);"><i class="fa fa-file-text-o"></i> แบบร่าง</div><?php
                  }
                  ?>

                  <div class="btn right delete" ondblclick="Javascript:deleteFeed('<?php echo $var['ff_id'];?>');"><i class="fa fa-trash-o"></i> ลบ</div>
                  
              		
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