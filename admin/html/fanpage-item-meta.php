            <div class="fanpageItem meta">
              <div class="image">
                <img src="https://graph.facebook.com/<?php echo $fanpage['id'];?>/picture">
              </div>
              <div class="info">
                <div class="head">
                </div>

                <?php $var['ch_title'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ch_title']);?>
                <?php $var['ch_description'] = str_replace($q,"<span class=\"highlight\">$q</span>",$var['ch_description']);?>

                <div class="name"><?php echo $fanpage['name'];?> <span id="loading-<?php echo $var['vi_id'];?>"></span></div>
              </div>
            </div>