<header id="header">
  <a href="index.php" target="_parent"><div id="logo"><?php echo $setting->getSetting($dbHandle,25);?></div></a>
  <div id="description"><i class="fa fa-quote-left"></i> <?php echo $setting->getSetting($dbHandle,16);?> <i class="fa fa-quote-right"></i></div>

  <!-- ZONE 1 -->
  <?php
  if($banner->countBanner($dbHandle,1)){
  ?>
  <div class="banner">
    <?php $banner->showBanner($dbHandle,1);?>
  </div>
  <?php
  }
  ?>

  <div id="category">
    <?php $category->listCategory($dbHandle,$_GET['c']);?>
  </div>

  <!-- ZONE 2 -->
  <?php
  if($banner->countBanner($dbHandle,2)){
  ?>
  <div class="banner">
    <?php $banner->showBanner($dbHandle,2);?>
  </div>
  <?php
  }
  ?>

  <div id="navigator">
    <a href="video.php" target="_parent"><div class="navItem"><i class="fa fa-youtube-play"></i> Video <!-- <span class="total">34</span> --></div></a>
    <a href="article.php" target="_parent"><div class="navItem"><i class="fa fa-book"></i> Article <!-- <span class="total">194</span> --></div></a>
    <a href="gallery.php" target="_parent"><div class="navItem"><i class="fa fa-camera"></i> Photo <!-- <span class="total">4</span> --></div></a>
  </div>

  <!-- ZONE 3 -->
  <?php
  if($banner->countBanner($dbHandle,3)){
  ?>
  <div class="banner">
    <?php $banner->showBanner($dbHandle,3);?>
  </div>
  <?php
  }
  ?>

  <footer id="footer">
    <p>All photos belong to their respective owners. Remaining content copyright © 2014 IGenblog. All rights reserved.</p>
    <p class="cr"><a href="http://igensite.com" target="_parent">IGenBlog</a> (ver 3.0) Design by <a href="http://igensite.com" target="_parent">IGenSite</a></p>
    
  </footer>
</header>