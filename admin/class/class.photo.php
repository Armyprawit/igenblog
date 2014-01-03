<?php
//Message Set
include_once'var-message.php';

class Photo{
	public function newPhoto($dbHandle,$category_id,$user_id,$article_id,$title,$text,$keyword,$image,$type,$status){

		global $msg;
		$stmt = $dbHandle->prepare('SELECT im_id FROM bl_image WHERE im_image = ?');
    	$stmt->execute(array($image));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['im_id'] == ""){

			$description = strip_tags($text);

			try{
				$stmt = $dbHandle->prepare('INSERT INTO bl_image(im_category_id,im_user_id,im_article_id,im_title,im_description,im_text,im_keyword,im_image,im_post_time,im_update_time,im_type,im_status) VALUES(:category,:user,:article,:title,:description,:context,:keyword,:image,:post_time,:update_time,:type,:status)');

				$stmt->bindParam(':category',$category_id);
				$stmt->bindParam(':user',$user_id);
				$stmt->bindParam(':article',$article_id);
				$stmt->bindParam(':title',$title);
				$stmt->bindParam(':description',$description);
				$stmt->bindParam(':context',$text);
				$stmt->bindParam(':keyword',$keyword);
				$stmt->bindParam(':image',$image);
				$stmt->bindParam(':post_time',time()); //Create Time
				$stmt->bindParam(':update_time',time()); //Last time
				$stmt->bindParam(':type',$type);
				$stmt->bindParam(':status',$status);
			
				$stmt->execute();

				// Add Video To Timeline.
				$this->addToTimeLine($dbHandle,$category_id,3,$this->getLastPhotoID($dbHandle),$status,time());
				
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
	public function getLastPhotoID($dbHandle){
		$stmt = $dbHandle->prepare('SELECT im_id FROM bl_image ORDER BY im_post_time DESC LIMIT 1');
    	$stmt->execute();
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var['im_id'];
	}


	public function updatePhoto($dbHandle,$id,$category,$image,$title,$text,$keyword){
		global $msg;
		$stmt = $dbHandle->prepare('SELECT im_id FROM bl_image WHERE im_image = ?');
    	$stmt->execute(array($image));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		//if($var['im_id'] == ""){
		if(true){
			try{
				$description = strip_tags($text);

				$stmt = $dbHandle->prepare('UPDATE bl_image SET im_category_id = :category,im_image = :image,im_title = :title,im_description = :description,im_text = :context,im_keyword = :keyword,im_update_time = :update_time WHERE im_id = :id');
				$stmt->bindParam(':id',$id);
				$stmt->bindParam(':category',$category);
				$stmt->bindParam(':image',$image);
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
		else{
			echo"Process";
			return $msg['8'];
		}
	}

	public function searchPhoto($dbHandle,$event,$q){
		try{
			if($q != ""){
				$s = $q-1024;
				$stmt = $dbHandle->prepare('SELECT im_id,im_image,im_description,im_post_time,im_status,ca_id,ca_title FROM bl_image,bl_category WHERE (im_id LIKE ? OR im_title LIKE ? OR im_description LIKE ? OR im_keyword LIKE ?) AND (im_category_id = ca_id) ORDER BY im_title,im_id,im_description');
				
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
					include'html/photo-item.php';
				}
				else if($event == "ajax"){
					include'../html/photo-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	public function statusPhoto($dbHandle,$image_id,$status){

		global $msg;
		try{
			$stmt = $dbHandle->prepare('UPDATE bl_image SET im_status = :status,im_update_time = :update_time WHERE im_id = :id');

				$stmt->bindParam(':update_time',time()); //Last time
				$stmt->bindParam(':status',$status);
				$stmt->bindParam(':id',$image_id);
			
				$stmt->execute();

				$id = $image_id + 1024;
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

	public function listPhoto($dbHandle,$event,$category,$type,$status,$start,$total){
		try{
			if($category == 0){
				$stmt = $dbHandle->prepare('SELECT im_id,im_image,im_description,im_post_time,im_status,ca_id,ca_title FROM bl_image,bl_category WHERE im_type = :type AND im_category_id = ca_id ORDER BY im_post_time DESC LIMIT :start,:total');
				$stmt->bindParam(':type',$type);
				
				$stmt->bindParam(':start',$start,PDO::PARAM_INT);
				$stmt->bindParam(':total',$total,PDO::PARAM_INT);
    			$stmt->execute();
			}
			else{
				$stmt = $dbHandle->prepare('SELECT im_id,im_image,im_description,im_post_time,im_status,ca_id,ca_title FROM bl_image,bl_category WHERE im_type = :type AND im_category_id = ca_id AND im_category_id = :category ORDER BY im_post_time DESC LIMIT :start,:total');
				$stmt->bindParam(':type',$type);
				$stmt->bindParam(':category',$category);
				
				$stmt->bindParam(':start',$start,PDO::PARAM_INT);
				$stmt->bindParam(':total',$total,PDO::PARAM_INT);
    			$stmt->execute();
			}

			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($event == "normal"){
					include'html/photo-item.php';
				}
				else if($event == "ajax"){
					include'../html/photo-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}


	// GET VIDEO DATA
	public function getPhotoData($dbHandle,$id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_image WHERE im_id = ?');
    	$stmt->execute(array($id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}

	public function infoPhotoData($dbHandle,$event){
		if($event == 'total'){
			$stmt = $dbHandle->prepare('SELECT COUNT(im_id) FROM bl_image');
    		$stmt->execute(array($id));
    		$var = $stmt->fetch(PDO::FETCH_ASSOC);
    		return $var['COUNT(im_id)'];
		}
	}
}
?>