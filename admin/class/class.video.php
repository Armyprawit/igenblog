<?php
//Message Set
include_once'var-message.php';

class Video extends MyDev{
	public function newVideo($dbHandle,$category_id,$user_id,$article_id,$title,$text,$duration,$keyword,$image_mini,$image_hd,$code,$uploader,$type,$status){
		global $msg;
		$stmt = $dbHandle->prepare('SELECT vi_id FROM bl_video WHERE vi_code = ?');
    	$stmt->execute(array($code));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['vi_id'] == ""){

			$description = strip_tags($text);

			try{
				$stmt = $dbHandle->prepare('INSERT INTO bl_video(vi_category_id,vi_user_id,vi_article_id,vi_title,vi_description,vi_text,vi_duration,vi_keyword,vi_image_mini,vi_image_hd,vi_code,vi_uploader,vi_post_time,vi_update_time,vi_type,vi_status) VALUES(:category,:user,:artcle,:title,:description,:context,:duration,:keyword,:image_mini,:image_hd,:code,:uploader,:post_time,:update_time,:type,:status)');
				$stmt->bindParam(':category',$category_id);
				$stmt->bindParam(':user',$user_id);
				$stmt->bindParam(':artcle',$article_id);
				$stmt->bindParam(':title',$title);
				$stmt->bindParam(':description',$description);
				$stmt->bindParam(':context',$text);
				$stmt->bindParam(':duration',$duration);
				$stmt->bindParam(':keyword',$keyword);
				$stmt->bindParam(':image_mini',$image_mini);
				$stmt->bindParam(':image_hd',$image_hd);
				$stmt->bindParam(':code',$code);
				$stmt->bindParam(':uploader',$uploader);
				$stmt->bindParam(':post_time',time()); //Create Time
				$stmt->bindParam(':update_time',time()); //Last time
				$stmt->bindParam(':type',$type);
				$stmt->bindParam(':status',$status);
			
				$stmt->execute();

				// Add Video To Timeline.
				$this->addToTimeLine($dbHandle,$category_id,1,$this->getLastVideoID($dbHandle),$status,time());
				
				return $msg['7'];
			}
			catch(PDOException $e){
				//return $msg['5'];
				return $e->getMessage();
			}
		}
		else{
			return $msg['8'];
		}
	}

	// Add Video To Timeline.
	// Time Type of Content
	// 1 = Video
	// 2 = Article
	// 3 = Photo
	// 4 = Category
	public function addToTimeLine($dbHandle,$category_id,$type,$content_id,$status,$timepost){
		$stmt = $dbHandle->prepare('SELECT tl_id FROM bl_timeline WHERE tl_type = ? AND tl_content_id = ?');
    	$stmt->execute(array($type,$content_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['tl_id'] == ""){

			$stmt = $dbHandle->prepare('INSERT INTO bl_timeline(tl_category_id,tl_type,tl_content_id,tl_post_time,tl_last_time,tl_status) VALUES (:category,:type,:id,:post_time,:update_time,:status)');

				$stmt->bindParam(':category',$category_id);
				$stmt->bindParam(':type',$type);
				$stmt->bindParam(':id',$content_id);
				$stmt->bindParam(':post_time',time()); //Create Time
				$stmt->bindParam(':update_time',time()); //Last time
				$stmt->bindParam(':status',$status);
			
				$stmt->execute();
		}
	}
	// GET Last Id of Content
	public function getLastVideoID($dbHandle){
		$stmt = $dbHandle->prepare('SELECT vi_id FROM bl_video ORDER BY vi_post_time DESC LIMIT 1');
    	$stmt->execute();
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var['vi_id'];
	}


	public function updateVideo($dbHandle,$id,$category,$title,$text,$keyword){
		global $msg;
		try{
			$description = strip_tags($text);

			$stmt = $dbHandle->prepare('UPDATE bl_video SET vi_category_id = :category,vi_title = :title,vi_description = :description,vi_text = :context,vi_keyword = :keyword,vi_update_time = :update_time WHERE vi_id = :id');
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':category',$category);
			$stmt->bindParam(':title',$title);
			$stmt->bindParam(':description',$description);
			$stmt->bindParam(':context',$text);
			$stmt->bindParam(':keyword',$keyword);
			$stmt->bindParam(':update_time',time()); //Last time
			
			$stmt->execute();
				
			return $msg['7'];
		}
		catch(PDOException $e){
			//return $msg['5'];
			return $e->getMessage();
		}

	}

	public function searchVideo($dbHandle,$event,$q){
		try{
			if($q != ""){
				$s = $q-1024;
				$stmt = $dbHandle->prepare('SELECT vi_id,vi_category_id,vi_user_id,vi_article_id,vi_title,vi_description,vi_duration,vi_keyword,vi_image_mini,vi_image_hd,vi_code,vi_uploader,vi_post_time,vi_update_time,vi_type,vi_status FROM bl_video,bl_category WHERE (vi_id LIKE ? OR vi_title LIKE ? OR vi_description LIKE ? OR vi_keyword LIKE ?) AND (vi_category_id = ca_id) ORDER BY vi_title,vi_id,vi_description');
				
				$stmt->bindValue(1,"%$s%",PDO::PARAM_STR);
    			$stmt->bindValue(2,"%$q%",PDO::PARAM_STR);
    			$stmt->bindValue(3,"%$q%",PDO::PARAM_STR);
    			$stmt->bindValue(4,"%$q%",PDO::PARAM_STR);

    			$stmt->execute();
			}
			else{
				return 0;
			}

			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($event == "normal"){
					include'html/video-item.php';
				}
				else if($event == "ajax"){
					include'../html/video-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	public function statusVideo($dbHandle,$video_id,$status){

		global $msg;
		try{
			$stmt = $dbHandle->prepare('UPDATE bl_video SET vi_status = :status,vi_update_time = :update_time WHERE vi_id = :id');

				$stmt->bindParam(':update_time',time()); //Last time
				$stmt->bindParam(':status',$status);
				$stmt->bindParam(':id',$video_id);
			
				$stmt->execute();

				$id = $video_id + 1024;
				if($status == 1){
					return '<span class="style-2"><i class="fa fa-globe"></i> เผยแพร่ #'.$id.'</span>';
				}
				else if($status == 0){
					return '<span class="style-3"><i class="fa fa-file-text-o"></i> ฉบับร่าง #'.$id.'</span>';
				}
			}
		catch(PDOException $e){
			return $msg['0'];
		}
	}

	public function listVideo($dbHandle,$event,$category,$type,$status,$start,$total){
		try{
			if($category == 0){
				$stmt = $dbHandle->prepare('SELECT vi_id,vi_title,vi_description,vi_duration,vi_code,vi_image_mini,vi_image_hd,vi_status,ca_id,ca_title FROM bl_video,bl_category WHERE vi_type = :type AND vi_category_id = ca_id ORDER BY vi_post_time DESC LIMIT :start,:total');

    			$stmt->bindParam(':type',$type);

				$stmt->bindParam(':start',$start,PDO::PARAM_INT);
				$stmt->bindParam(':total',$total,PDO::PARAM_INT);
				$stmt->execute();
			}
			else{
				$stmt = $dbHandle->prepare('SELECT vi_id,vi_title,vi_description,vi_duration,vi_code,vi_image_mini,vi_image_hd,vi_status,ca_id,ca_title FROM bl_video,bl_category WHERE vi_type = :type AND vi_category_id = ca_id AND vi_category_id = :category ORDER BY vi_post_time DESC LIMIT :start,:total');

    			$stmt->bindParam(':type',$type);
				$stmt->bindParam(':category',$category);

				$stmt->bindParam(':start',$start,PDO::PARAM_INT);
				$stmt->bindParam(':total',$total,PDO::PARAM_INT);
				$stmt->execute();
			}

			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($event == "normal"){
					include'html/video-item.php';
				}
				else if($event == "ajax"){
					include'../html/video-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}


	// GET VIDEO DATA
	public function getVideoData($dbHandle,$video_id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_video WHERE vi_id = ?');
    	$stmt->execute(array($video_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}

	public function infoVideoData($dbHandle,$event){
		if($event == 'total'){
			$stmt = $dbHandle->prepare('SELECT COUNT(vi_id) FROM bl_video');
    		$stmt->execute(array($id));
    		$var = $stmt->fetch(PDO::FETCH_ASSOC);
    		return $var['COUNT(vi_id)'];
		}
	}

	public function monitorAllVideo($dbHandle,$event,$total){
		if($event == 'view'){
			$stmt = $dbHandle->prepare('SELECT vi_id,vi_title,vi_c_view,vi_c_watch,vi_post_time,vi_update_time,ca_id,ca_title,ca_url FROM bl_video,bl_category WHERE vi_type = 1 AND vi_status = 1 AND vi_category_id = ca_id ORDER BY vi_c_view DESC LIMIT :total');
		}
		else if($event == 'last'){
			$stmt = $dbHandle->prepare('SELECT vi_id,vi_title,vi_c_view,vi_c_watch,vi_post_time,vi_update_time,ca_id,ca_title,ca_url FROM bl_video,bl_category WHERE vi_type = 1 AND vi_status = 1 AND vi_category_id = ca_id ORDER BY vi_update_time DESC LIMIT :total');
		}

		$stmt->bindParam(':total',$total,PDO::PARAM_INT);
		$stmt->execute();
		while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
			include'html/feed-video-item.php';
		}
	}
}
?>