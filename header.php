<header id="header">
  <a href="index.php" target="_parent"><div id="logo">IGENBLOG</div></a>
  <div id="description"><i class="fa fa-quote-left"></i> Work :
Web Developer at http://igensite.com
Education: 
King Mongkut's University of Technology North Bangkok <i class="fa fa-quote-right"></i></div>
  <div id="category">
    <?php $category->listCategory($dbHandle,0);?>
  </div>
  <div id="navigator">
    <div class="navItem"><i class="fa fa-youtube-play"></i> Video <span class="total">34</span></div>
    <div class="navItem"><i class="fa fa-book"></i> Article <span class="total">194</span></div>
    <div class="navItem"><i class="fa fa-camera"></i> Photo <span class="total">4</span></div>
  </div>
</header>