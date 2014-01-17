<nav id="navigator">
    <!-- Facebook Account and Login -->
    <div id="facebookLogin">
        <?php
        if($user){
        ?>
        <div class="photo" title="<?php echo $user_profile['first_name'].' '.$user_profile['last_name'];?>">
            <img src="https://graph.facebook.com/<?php echo $user;?>/picture">
        </div>
        <div class="logout"><a href="<?php echo $logoutUrl; ?>">logout</a></div>
        <?php
        }
        else{
        ?>
        <div class="photo">
            <a href="<?php echo $loginUrl; ?>"><img src="image/icon/facebook-login.gif"></a>
        </div>
        <?php
        }
        ?>
    </div>

    <!-- Main Menu -->
    <div id="mainMenu">
    	<a href="index.php" target="_parent">
        <div class="item <?php if($pageActive == 'index'){echo'active';}?>">
            <div class="s"></div> <div class="text"><i class="fa fa-globe"></i> หน้าหลัก</div>
        </div>
        </a>
        
        <!-- <a href="igensite.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-coffee"></i>IGensite</div><div class="s"></div>
        </div>
        </a> -->
        
        <a href="stat.php" target="_parent">
        <div class="item stat <?php if($pageActive == 'stat'){echo'active';}?>">
            <div class="s"></div><div class="text"><i class="fa fa-bar-chart-o"></i> สถิติ</div>
        </div>
        </a>
        
        <a href="category.php" target="_parent">
        <div class="item category <?php if($pageActive == 'category'){echo'active';}?>">
            <div class="s"></div><div class="text"><i class="fa fa-folder-open"></i> หมวดหมู่ <span class="total"><?php echo $category->infoCategoryData($dbHandle,'total');?></span></div>
        </div>
        </a>
        
        <!-- <a href="index.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-tag"></i>แท็ก</div><div class="s"></div>
        </div>
        </a> -->
        
        <a href="video.php" target="_parent">
        <div class="item content <?php if($pageActive == 'video'){echo'active';}?>">
            <div class="s"></div><div class="text"><i class="fa fa-video-camera"></i> วิดีโอคลิป <span class="total"><?php echo $video->infoVideoData($dbHandle,'total');?></span></div>
        </div>
        </a>

        <a href="youtube.php" target="_parent">
        <div class="item youtube <?php if($pageActive == 'channel'){echo'active';}?>">
            <div class="s"></div><div class="text"><i class="fa fa-youtube"></i> Youtube <span class="total"><?php echo $youtube->infoChannelData($dbHandle,'total');?></span></div>
        </div>
        </a>
        
        <a href="article.php" target="_parent">
        <div class="item content <?php if($pageActive == 'article'){echo'active';}?>">
            <div class="s"></div><div class="text"><i class="fa fa-pencil-square-o"></i> บทความ <span class="total"><?php echo $article->infoArticleData($dbHandle,'total');?></span></div>
        </div>
        </a>
        
        <a href="photo.php" target="_parent">
        <div class="item content <?php if($pageActive == 'photo'){echo'active';}?>">
            <div class="s"></div><div class="text"><i class="fa fa-camera"></i> ภาพถ่าย <span class="total"><?php echo $photo->infoPhotoData($dbHandle,'total');?></span></div>
        </div>
        </a>
        
        <a href="banner.php" target="_parent">
        <div class="item banner <?php if($pageActive == 'banner'){echo'active';}?>">
            <div class="s"></div><div class="text"><i class="fa fa-bullhorn"></i> ป้ายโฆษณา <span class="total"><?php echo $banner->infoBannerData($dbHandle,'total');?></span></div>
        </div>
        </a>

        <a href="facebook-feed.php" target="_parent">
        <div class="item facebook <?php if($pageActive == 'facebookfeed'){echo'active';}?>">
            <div class="s"></div><div class="text"><i class="fa fa-facebook-square"></i> Facebook Feed <span class="total"><?php echo $facebookpage->infoFeedData($dbHandle,'total');?></div>
        </div>
        </a>

        <a href="fanpage.php" target="_parent">
        <div class="item facebook <?php if($pageActive == 'facebookpage'){echo'active';}?>">
            <div class="s"></div><div class="text"> <i class="fa fa-facebook-square"></i> Facebook Page <span class="total"><?php echo $facebookpage->infoFanpageData($dbHandle,'total');?></div>
        </div>
        </a>
        
        <a href="setting.php" target="_parent">
        <div class="item <?php if($pageActive == 'setting'){echo'active';}?>">
            <div class="s"></div><div class="text"><i class="fa fa-cog"></i> ตั้งค่า</div>
        </div>
        </a>

        
        <!-- <a href="password.php" target="_parent">
        <div class="item">
            <div class="text"> <i class="fa fa-lock"></i>เปลี่ยนรหัสผ่าน</div><div class="s"></div>
        </div>
        </a> -->

        <a href="../" target="_bank">
        <div class="item">
            <div class="s"></div><div class="text"><i class="fa fa-desktop"></i> หน้าเว็บ</div>
        </div>
        </a>
        
        <a href="index.php?e=logoutG" target="_parent">
        <div class="item logout">
            <div class="s"></div><div class="text"><i class="fa fa-reply"></i> ออกจากระบบ</div>
        </div>
        </a>
     </div>
</nav>