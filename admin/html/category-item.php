			<div class="categoryItem" id="<?php echo $var['ca_id'];?>">
				<div class="info">
					<div class="head">

                  <div class="btn left delete"><?php echo $var['ca_url'];?></div>
                  <div id="status-<?php echo $var['ca_id'];?>">
                  <?php
                  if($var['ca_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusCategory(<?php echo $var['ca_id'];?>,<?php echo $var['ca_status'];?>);">เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusCategory(<?php echo $var['ca_id'];?>,<?php echo $var['ca_status'];?>);">แบบร่าง</div><?php
                  }
                  ?>
                  </div>

                  <?php
                  if($var['ca_id'] != 10000){
                  ?>
                  <div class="btn right delete" ondblclick="Javascript:deleteCategory('<?php echo $var['ca_id'];?>');">ลบ</div>
                  <?php
                  }?>

                  <div class="btn left loading" id="loading-<?php echo $var['ca_id'];?>"></div>
              		
              	</div>
              	</div>

				<?php $var['ca_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ca_title']);?>
				<?php $var['ca_url'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ca_url']);?>
				<?php $var['ca_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ca_description']);?>

            	<div class="name" onClick="Javascript:showCategory(<?php echo $var['ca_id'];?>);">
            		<span id="loading-<?php echo $var['ca_id'];?>"></span> <?php echo $var['ca_title'];?> <a href="../cat-<?php echo $var['ca_url'];?>.html" target="_bank"><i class="fa fa-globe"></i></a> 
            	</div>
            	<div class="description"><?php echo $var['ca_description'];?></div>
            </div>