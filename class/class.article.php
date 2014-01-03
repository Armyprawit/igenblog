<?php
class Article extends MyDev{
	
	// GET VIDEO DATA
	public function getArticleData($dbHandle,$article_id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_article,bl_category WHERE ar_category_id = ca_id AND ar_id = ?');
    	$stmt->execute(array($article_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}
	
	//Update View Video
	public function updateViewArticle($content_id){
		$query = "SELECT ar_c_view FROM bl_article WHERE ar_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$article = mysql_fetch_array($result, MYSQL_ASSOC);
		
		$query = "UPDATE bl_article SET ar_c_view = '".mysql_real_escape_string(++$article['ar_c_view'])."' WHERE ar_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query($query);
	}
	
	//Update Watch Video
	public function updateReadArticle($content_id){
		$query = "SELECT ar_c_read FROM bl_article WHERE ar_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$article = mysql_fetch_array($result, MYSQL_ASSOC);
		
		$query = "UPDATE bl_article SET ar_c_read = '".mysql_real_escape_string(++$article['ar_c_watch'])."' WHERE ar_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query($query);
	}
	
	//Other Image from Image table.
	public function otherImageArticle($article_id){
		$query = "SELECT im_id,im_title,im_image FROM bl_image WHERE im_article_id = '".mysql_real_escape_string($article_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($image = mysql_fetch_array($result, MYSQL_ASSOC)){
		?>
        	<div class="item">
        		<a href="<?php echo $image['im_image'];?>" rel="lightbox[igen]" title="<?php echo $image['im_title'];?>"><img src="<?php echo $image['im_image'];?>" height="50"></a>
        	</div>
		<?php
		}
	}
	
	//Other Video from video table
	public function otherVideoArticle($article_id){
		$query = "SELECT vi_id,vi_title,vi_image_hd FROM bl_video WHERE vi_article_id = '".mysql_real_escape_string($article_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		while($video = mysql_fetch_array($result, MYSQL_ASSOC)){
		?>
        	<div class="item">
            	<a href="play-<?php echo $video['vi_id']+1024;?>-<?php echo parent::urlSEO($video['vi_title']);?>.html" target="_blank">
                <img src="<?php echo $video['vi_image_hd'];?>" width="180" height="120">
                </a>
            	<div class="title">
                	<a href="play-<?php echo $video['vi_id']+1024;?>-<?php echo parent::urlSEO($video['vi_title']);?>.html" target="_blank">
					<?php echo $video['vi_title'];?>
                	</a>
                </div>
            </div>
		<?php
		}
	}
}
?>