            <div class="articleItem <?php if($var['ar_status'] == 0){echo'draft';}?>" onClick="Javascript:toSelectArticle(<?php echo $var['ar_id'];?>);">
              <div class="photo">
                <img src="<?php echo $var['ar_image'];?>">
              </div>
              <div class="info">
              	<div class="head">
              		<div class="id">#<?php echo $var['ar_id']+1024;?></div>

                  <div class="category" onClick="Javascript:modeListArticle(<?php echo $var['ca_id'];?>);$('#categoryMode').val('<?php echo $var['ca_id'];?>');"><i class="fa fa-folder-open"></i> <?php echo $var['ca_title'];?></div>
                  <?php
                  if($var['ar_status'] == 1){
                    ?><div class="status s" onClick="Javascript:statusArticle(<?php echo $var['ar_id'];?>,<?php echo $var['ar_status'];?>);"><i class="fa fa-globe"></i> เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="status d" onClick="Javascript:statusArticle(<?php echo $var['ar_id'];?>,<?php echo $var['ar_status'];?>);"><i class="fa fa-file-text-o"></i> แบบร่าง</div><?php
                  }
                  ?>
                  
              		
              	</div>

                <?php $var['ar_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ar_title']);?>
                <?php $var['ar_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ar_description']);?>

                <h1><i class="fa fa-globe fa-spin"></i> <?php echo $var['ar_title'];?> <span id="loading-<?php echo $var['ar_id'];?>"></span></h1>
                <div class="text"><?php echo iconv_substr($var['ar_description'],0,320,"UTF-8").'...';?></div>
              </div>
            </div>