<?php
class Image{
	
	// GET VIDEO DATA
	public function getPhotoData($dbHandle,$image_id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_image,bl_category WHERE im_category_id = ca_id AND im_id = ?');
    	$stmt->execute(array($image_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}
	
	//Update View Video
	public function updateViewImage($content_id){
		$query = "SELECT im_c_view FROM bl_image WHERE im_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$image = mysql_fetch_array($result, MYSQL_ASSOC);
		
		$query = "UPDATE bl_image SET im_c_view = '".mysql_real_escape_string(++$image['im_c_view'])."' WHERE im_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query($query);
	}
	
	//Update Watch Video
	public function updateWatchImage($content_id){
		$query = "SELECT im_c_watch FROM bl_image WHERE im_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$image = mysql_fetch_array($result, MYSQL_ASSOC);
		
		$query = "UPDATE bl_image SET im_c_watch = '".mysql_real_escape_string(++$image['im_c_watch'])."' WHERE im_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query($query);
	}
}
?>