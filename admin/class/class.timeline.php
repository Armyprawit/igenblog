<?php
class Timeline extends Mydev{
	
	// Get Feed Timeline.
	public function getFeedTimeline($dbHandle,$feed,$event,$type,$category_id,$start,$total){
		try{
			/*
			Type of Content Feed.
			0 = All Content
			1 = Video Mode
			2 = Article Mode
			3 = Photo Mode
			4 = Category Mode
			*/
			if($feed == 'feed'){
				if($type == 1){
					$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 AND tl_type = :type ORDER BY tl_last_time DESC,tl_post_time DESC LIMIT :start,:total');
					$stmt->bindParam(':type',$type);
				}
				else if($type == 2){
					$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 AND tl_type = :type ORDER BY tl_last_time DESC,tl_post_time DESC LIMIT :start,:total');
					$stmt->bindParam(':type',$type);
				}
				else if($type == 3){
					$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 AND tl_type = :type ORDER BY tl_last_time DESC,tl_post_time DESC LIMIT :start,:total');
					$stmt->bindParam(':type',$type);
				}
				else if($type == 4){
					$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 AND tl_category_id = :category ORDER BY tl_post_time DESC LIMIT :start,:total');
					$stmt->bindParam(':category',$category_id);
				}
				else{
					$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 ORDER BY tl_last_time DESC,tl_post_time DESC LIMIT :start,:total');
				}
			}
			else if($feed == 'feature'){
				if($type == 0){
					$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 ORDER BY RAND() LIMIT :start,:total');
				}
				else{
					$stmt = $dbHandle->prepare('SELECT tl_id,tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status FROM bl_timeline WHERE tl_status = 1 AND tl_type = :type AND tl_category_id = :category ORDER BY RAND() LIMIT :start,:total');
					$stmt->bindParam(':type',$type);
					$stmt->bindParam(':category',$category_id);
				}
			}
				
			// $stmt->bindParam(':type',$type);
			// $stmt->bindParam(':category',$category);

			$stmt->bindParam(':start',$start,PDO::PARAM_INT);
			$stmt->bindParam(':total',$total,PDO::PARAM_INT);

    		$stmt->execute();

    		while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
    			
				if($var['tl_type'] == 1){// Video Feed
					// echo 'Type:'.$type.' / Cat:'.$category_id.'<br>';
					$this->getVideoByContentID($dbHandle,$feed,$event,$var['tl_content_id']);
				}
				else if($var['tl_type'] == 2){// Article Feed
					// echo 'Type:'.$type.' / Cat:'.$category_id.'<br>';
					$this->getArticleByContentID($dbHandle,$feed,$event,$var['tl_content_id']);
				}
				else if($var['tl_type'] == 3){// Image Feed
					// echo 'Type:'.$type.' / Cat:'.$category_id.'<br>';
					$this->getPhotoByContentID($dbHandle,$feed,$event,$var['tl_content_id']);
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
	
	//GET VIDEO by Content ID
	public function getVideoByContentID($dbHandle,$feed,$event,$content_id){
		try{
			$stmt = $dbHandle->prepare('SELECT vi_id,vi_title,vi_description,vi_duration,vi_c_view,vi_code,vi_image_mini,vi_image_hd,vi_post_time,vi_status,ca_id,ca_title,ca_url FROM bl_video,bl_category WHERE vi_id = :id AND vi_category_id = ca_id');

    		$stmt->bindParam(':id',$content_id);
			$stmt->execute();

			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			if($event == 'normal'){
				if($feed == 'feed'){
					include'html/feed-video-item.php';
				}
				else if($feed == 'feature'){
					include'html/feature-video-item.php';
				}
			}
			else if($event == 'ajax'){
				if($feed == 'feed'){
					include'../html/feed-video-item.php';
				}
				else if($feed == 'feature'){
					include'../html/feature-video-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	//GET ARTICLE by Content ID
	public function getArticleByContentID($dbHandle,$feed,$event,$content_id){
		try{
			$stmt = $dbHandle->prepare('SELECT ar_id,ar_title,ar_image,ar_description,ar_post_time,ar_c_view,ar_status,ca_id,ca_title,ca_url FROM bl_article,bl_category WHERE ar_id = :id AND ar_category_id = ca_id');

    		$stmt->bindParam(':id',$content_id);
			$stmt->execute();

			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			if($event == 'normal'){
				if($feed == 'feed'){
					include'html/feed-article-item.php';
				}
				else if($feed == 'feature'){
					include'html/feature-article-item.php';
				}
			}
			else if($event == 'ajax'){
				if($feed == 'feed'){
					include'../html/feed-article-item.php';
				}
				else if($feed == 'feature'){
					include'../html/feature-article-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	//GET PHOTO by Content ID
	public function getPhotoByContentID($dbHandle,$feed,$event,$content_id){
		try{
			$stmt = $dbHandle->prepare('SELECT im_id,im_image,im_description,im_c_view,im_post_time,im_status,ca_id,ca_title,ca_url FROM bl_image,bl_category WHERE im_id = :id AND im_category_id = ca_id');

    		$stmt->bindParam(':id',$content_id);
			$stmt->execute();

			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			if($event == 'normal'){
				if($feed == 'feed'){
					include'html/feed-photo-item.php';
				}
				else if($feed == 'feature'){
					include'html/feature-photo-item.php';
				}
			}
			else if($event == 'ajax'){
				if($feed == 'feed'){
					include'../html/feed-photo-item.php';
				}
				else if($feed == 'feature'){
					include'../html/feature-photo-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
}
?>