<?php
class Banner{
	
	// Count Banner if > 0 this Show to Page.
	public function checkBanner($zone){
		if($zone == 'A'){
			$query = "SELECT COUNT(ba_id) FROM bl_banner WHERE ba_zone = '1' AND ba_status = '1'";
			mysql_query("SET NAMES UTF8");
			$result = mysql_query($query);
			$banner = mysql_fetch_array($result, MYSQL_ASSOC);
			if($banner['COUNT(ba_id)'] > 0){
				return true;
			}
			else{
				return false;
			}
		}
		else if($zone == 'B'){
			$query = "SELECT COUNT(ba_id) FROM bl_banner WHERE ba_zone = '2' AND ba_status = '1'";
			mysql_query("SET NAMES UTF8");
			$result = mysql_query($query);
			$banner = mysql_fetch_array($result, MYSQL_ASSOC);
			if($banner['COUNT(ba_id)'] > 0){
				return true;
			}
			else{
				return false;
			}
		}
		else if($zone == 'C'){
			$query = "SELECT COUNT(ba_id) FROM bl_banner WHERE ba_zone = '3' AND ba_status = '1'";
			mysql_query("SET NAMES UTF8");
			$result = mysql_query($query);
			$banner = mysql_fetch_array($result, MYSQL_ASSOC);
			if($banner['COUNT(ba_id)'] > 0){
				return true;
			}
			else{
				return false;
			}
		}
	}
	
	
	// Get Banner Ads to Web Page
	public function getBannerDisplay($zone){
		if($zone == 'A'){
			$query = "SELECT ba_title,ba_image,ba_link,ba_follow FROM bl_banner WHERE ba_zone = '1' AND ba_status = '1'";
			mysql_query("SET NAMES UTF8");
			$result = mysql_query($query);
			while($banner = mysql_fetch_array($result, MYSQL_ASSOC)){
				?>
                <a href="<?php echo $banner['ba_link'];?>" <?php if($banner['ba_follow']=='1'){echo"";}else{echo"rel=\"nofollow\"";}?> title="<?php echo $banner['ba_title'];?>">
                <section class="item"><img src="<?php echo $banner['ba_image'];?>" alt="<?php echo $banner['ba_title'];?>"></section>
                </a>
				<?php
			}
		}
		else if($zone == 'B'){
			$query = "SELECT ba_title,ba_image,ba_link,ba_follow FROM bl_banner WHERE ba_zone = '2' AND ba_status = '1'";
			mysql_query("SET NAMES UTF8");
			$result = mysql_query($query);
			while($banner = mysql_fetch_array($result, MYSQL_ASSOC)){
				?>
                <a href="<?php echo $banner['ba_link'];?>" <?php if($banner['ba_follow']=='1'){echo"";}else{echo"rel=\"nofollow\"";}?> title="<?php echo $banner['ba_title'];?>">
                <section class="item"><img src="<?php echo $banner['ba_image'];?>" alt="<?php echo $banner['ba_title'];?>"></section>
                </a>
				<?php
			}
		}
		else if($zone == 'C'){
			$query = "SELECT ba_title,ba_image,ba_link,ba_follow FROM bl_banner WHERE ba_zone = '3' AND ba_status = '1'";
			mysql_query("SET NAMES UTF8");
			$result = mysql_query($query);
			while($banner = mysql_fetch_array($result, MYSQL_ASSOC)){
				?>
                <a href="<?php echo $banner['ba_link'];?>" <?php if($banner['ba_follow']=='1'){echo"";}else{echo"rel=\"nofollow\"";}?> title="<?php echo $banner['ba_title'];?>">
                <section class="item"><img src="<?php echo $banner['ba_image'];?>" alt="<?php echo $banner['ba_title'];?>"></section>
                </a>
				<?php
			}
		}
	}
}
?>