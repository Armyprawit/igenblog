<nav id="navigator">
    <div id="facebookLogin">
        <div class="photo">
            <img src="https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn2/960060_10200263455428557_1541239435_n.jpg">
        </div>
    </div>
    <div id="mainMenu">
    	<a href="index.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-globe"></i>ดูหน้าหลัก</div><div class="s"></div>
        </div>
        </a>
        
        <a href="igensite.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-coffee"></i>IGensite</div><div class="s"></div>
        </div>
        </a>
        
        <a href="stat.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-bar-chart-o"></i>สถิติ</div><div class="s"></div>
        </div>
        </a>
        
        <a href="category.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-folder-open"></i>หมวดหมู่ <span class="total"><?php echo $category->infoCategoryData($dbHandle,'total');?></span></div><div class="s"></div>
        </div>
        </a>
        
        <!-- <a href="index.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-tag"></i>แท็ก</div><div class="s"></div>
        </div>
        </a> -->
        
        <a href="video.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-video-camera"></i>วิดีโอคลิป <span class="total"><?php echo $video->infoVideoData($dbHandle,'total');?></span></div><div class="s"></div>
        </div>
        </a>
        
        <a href="article.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-pencil-square-o"></i>บทความ <span class="total"><?php echo $article->infoArticleData($dbHandle,'total');?></span></div><div class="s"></div>
        </div>
        </a>
        
        <a href="photo.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-camera"></i>รูปภาพ <span class="total"><?php echo $photo->infoPhotoData($dbHandle,'total');?></span></div><div class="s"></div>
        </div>
        </a>
        
        <a href="banner.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-bullhorn"></i>ป้ายโฆษณา</div><div class="s"></div>
        </div>
        </a>
        
        <a href="setting.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-cog"></i>ตั้งค่า</div><div class="s"></div>
        </div>
        </a>
        
        <a href="password.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-lock"></i>เปลี่ยนรหัสผ่าน</div><div class="s"></div>
        </div>
        </a>
        
        <a href="index.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-reply"></i>ออกจากระบบ</div><div class="s"></div>
        </div>
        </a>
     </div>
</nav>