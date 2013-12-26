			<div class="categoryItem" onClick="Javascript:showCategory(<?php echo $var['ca_id'];?>);">

				<?php $var['ca_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ca_title']);?>
				<?php $var['ca_url'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ca_url']);?>
				<?php $var['ca_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ca_description']);?>

            	<div class="name"><span id="loading-<?php echo $var['ca_id'];?>"></span> <?php echo $var['ca_title'];?> <span class="url"><i class="fa fa-globe"></i><?php echo $var['ca_url'];?></span></div>
            	<div class="description"><?php echo $var['ca_description'];?></div>
            	<div class="control">
                	<div class="btn"><i class="fa fa-trash-o"></i>ลบ</div>
                	<div class="btn"><i class="fa fa-unlock"></i></i>Enable</div>
                	<div class="btn"><i class="fa fa-lock"></i>Disable</div>
            	</div>
            </div>