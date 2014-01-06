<div class="social">

        <!-- Facebook Like and Share -->
        <div class="item">
          <div class="fb-like" data-href="<?php echo $setting->getSetting($dbHandle,2);?>/image-<?php echo $photoData['im_id']+1024;?>-<?php echo $mydev->urlSEO(iconv_substr($photoData['im_text'],0,70,"UTF-8"));?>.html" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        </div>

        <!-- Google Share -->
        <div class="item">
          <!-- Place this tag where you want the share button to render. -->
<div class="g-plus" data-action="share" data-annotation="bubble" data-href="<?php echo $setting->getSetting($dbHandle,2);?>/image-<?php echo $photoData['im_id']+1024;?>-<?php echo $mydev->urlSEO(iconv_substr($photoData['im_text'],0,70,"UTF-8"));?>.html"></div>

<!-- Place this tag after the last share tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script></div>

        <!-- Tumblr -->
        <div class="item">
          <?php
            $urlLink = $setting->getSetting($dbHandle,2).'/image-'.$_GET['v'].'-'.$mydev->urlSEO(iconv_substr($photoData['im_text'],0,70,"UTF-8")).'.html';
          ?>
          <a href="http://www.tumblr.com/share/link?url=<?php echo urlencode($urlLink); ?>&name=<?php echo urlencode($mydev->convTextToMetaTag($photoData['im_title'])); ?>&description=<?php echo urlencode($mydev->convTextToMetaTag($photoData['im_description'])) ?>" title="Share on Tumblr" style="display:inline-block; text-indent:-9999px; overflow:hidden; width:81px; height:20px; background:url('http://platform.tumblr.com/v1/share_1.png') top left no-repeat transparent;">Share on Tumblr</a>
</div>
        
        <!-- Linkedin -->
        <div class="item">
          <script src="//platform.linkedin.com/in.js" type="text/javascript">
 lang: en_US
</script>
<script type="IN/Share" data-url="<?php echo $setting->getSetting($dbHandle,2);?>/image-<?php echo $photoData['im_id']+1024;?>-<?php echo $mydev->urlSEO(iconv_substr($photoData['im_text'],0,70,"UTF-8"));?>.html" data-counter="right"></script></div>

        <!-- Twitter Tweet -->
        <div class="item">
          <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $setting->getSetting($dbHandle,2);?>/image-<?php echo $photoData['im_id']+1024;?>-<?php echo $mydev->urlSEO(iconv_substr($photoData['im_text'],0,70,"UTF-8"));?>.html" data-text="<?php echo $mydev->convTextToMetaTag(iconv_substr($photoData['im_description'],0,70,"UTF-8"));?> : <?php echo $setting->getSetting($dbHandle,1);?>" data-via="PuwadonSricha" data-related="recommend" data-hashtags="hashtag-igensite">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></div>

        <!-- Google Plus -->
        <div class="item">
          <!-- วางแท็กนี้ในตำแหน่งที่คุณต้องการให้ ปุ่ม +1 ปรากฏ -->
<div class="g-plusone" data-size="medium"></div>

<!-- วางแท็กนี้หลังแท็ก ปุ่ม +1 สุดท้าย -->
<script type="text/javascript">
  window.___gcfg = {lang: 'th'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script></div>
        
        

        <!-- Pinterest -->
        <div class="item">
          <a href="//www.pinterest.com/pin/create/button/?url=<?php echo $setting->getSetting($dbHandle,2);?>/image-<?php echo $photoData['im_id']+1024;?>-<?php echo $mydev->urlSEO(iconv_substr($photoData['im_text'],0,70,"UTF-8"));?>.html&media=<?php echo $photoData['im_image'];?>&description=<?php echo $mydev->convTextToMetaTag(iconv_substr($photoData['im_description'],0,70,"UTF-8"));?>" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a></div>

      </div>