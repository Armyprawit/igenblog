<a href="cat-<?php echo $var['ca_url'];?>.html" target="_parent">
<div class="categoryItem <?php if($category_id == $var['ca_url']){echo'active';}?>"><i class="fa fa-folder"></i> <?php echo $var['ca_title']?> <span class="total"><?php echo $vars['COUNT(tl_id)'];?></span></div>
</a>