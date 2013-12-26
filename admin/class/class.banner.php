<?php
//Message Set
include_once'var-message.php';

class Banner{
	public function newBanner($dbHandle,$image,$link,$title,$zone){

		global $msg;
		$stmt = $dbHandle->prepare('SELECT ba_id FROM bl_banner WHERE ba_image = ?');
    	$stmt->execute(array($image));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if(true){

			try{
				$stmt = $dbHandle->prepare('INSERT INTO bl_banner(ba_title,ba_image,ba_link,ba_create_time,ba_expire_time,ba_zone) VALUES(:title,:image,:link,:create_time,:expire_time,:zone)');

				$stmt->bindParam(':title',$title);
				$stmt->bindParam(':image',$image);
				$stmt->bindParam(':link',$link);
				$stmt->bindParam(':create_time',time());
				$stmt->bindParam(':expire_time',time());
				$stmt->bindParam(':zone',$zone);
			
				$stmt->execute();
				
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