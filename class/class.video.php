<?php
class Video{

	// GET VIDEO DATA
	public function getVideoData($dbHandle,$video_id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_video,bl_category WHERE vi_category_id = ca_id AND vi_id = ?');
    	$stmt->execute(array($video_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}
	
	//Update View Video
	public function updateViewVideo($content_id){
		$query = "SELECT vi_c_view FROM bl_video WHERE vi_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$video = mysql_fetch_array($result, MYSQL_ASSOC);
		
		$query = "UPDATE bl_video SET vi_c_view = '".mysql_real_escape_string(++$video['vi_c_view'])."' WHERE vi_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query($query);
	}
	
	//Update Watch Video
	public function updateWatchVideo($content_id){
		$query = "SELECT vi_c_watch FROM bl_video WHERE vi_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$video = mysql_fetch_array($result, MYSQL_ASSOC);
		
		$query = "UPDATE bl_video SET vi_c_watch = '".mysql_real_escape_string(++$video['vi_c_watch'])."' WHERE vi_id = '".mysql_real_escape_string($content_id)."'";
		mysql_query($query);
	}
}
?>