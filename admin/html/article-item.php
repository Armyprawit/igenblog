            <div class="articleItem">
              <div class="photo" onClick="Javascript:toSelectArticle(<?php echo $var['ar_id'];?>);">
                <img src="<?php echo $var['ar_image'];?>">
              </div>
              <div class="info">
              	<div class="head">
              		<!-- <div class="btn left delete"><?php //echo $var['ar_id']+1024;?></div> -->

                  <div class="btn right delete" onClick="Javascript:modeListArticle(<?php echo $var['ca_id'];?>);$('#categoryMode').val('<?php echo $var['ca_id'];?>');"><?php echo $var['ca_title'];?></div>

                  <div id="status-<?php echo $var['ar_id'];?>">
                  <?php
                  if($var['ar_status'] == 1){
                    ?><div class="btn left normal" onClick="Javascript:statusArticle(<?php echo $var['ar_id'];?>,<?php echo $var['ar_status'];?>);">เผยแพร่</div><?php
                  }
                  else{
                    ?><div class="btn left delete" onClick="Javascript:statusArticle(<?php echo $var['ar_id'];?>,<?php echo $var['ar_status'];?>);">แบบร่าง</div><?php
                  }
                  ?>
                  </div>

                  <div class="btn left loading" id="loading-<?php echo $var['ar_id'];?>"></div>
                  
              		
              	</div>

                <?php $var['ar_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ar_title']);?>
                <?php $var['ar_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ar_description']);?>

                <h1><?php echo stripslashes($var['ar_title']);?> <a href="../read-<?php echo $var['ar_id']+1024;?>-<?php echo parent::urlSEO($var['ar_title']);?>.html" target="_bank"><i class="fa fa-globe"></i></a> <span id="loading-<?php echo $var['ar_id'];?>"></span></h1>
                <div class="text"><?php echo iconv_substr(stripslashes($var['ar_description']),0,120,"UTF-8").'...';?></div>
              </div>
            </div>