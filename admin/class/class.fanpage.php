<?php
//Message Set
include_once'var-message.php';

class FacebookPage extends MyDev{

	public function addFacebookFeed($dbHandle,$id,$object_id,$page_id,$message,$link,$name,$description,$picture,$source,$embed,$post_time,$edit_time,$type,$types,$status){
		global $msg;
		
		$stmt = $dbHandle->prepare('SELECT ff_id FROM bl_facebook_feed WHERE ff_id = ?');
    	$stmt->execute(array($id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['ff_id'] == ''){
			try{
				$stmt = $dbHandle->prepare('INSERT INTO bl_facebook_feed (ff_id,ff_object_id,ff_page_id,ff_message,ff_link,ff_name,ff_description,ff_picture,ff_source,ff_embed,ff_created_time,ff_updated_time,ff_type,ff_create_time,ff_update_time,ff_types,ff_status) VALUES(:id,:object,:page,:message,:link,:name,:description,:picture,:source,:embed,:post_time,:edit_time,:type,:create_time,:update_time,:types,:status)');

				$stmt->bindParam(':id',$id);
				$stmt->bindParam(':object',$object_id);
				$stmt->bindParam(':page',$page_id);
				$stmt->bindParam(':message',$message);
				$stmt->bindParam(':link',$link);
				$stmt->bindParam(':name',$name);
				$stmt->bindParam(':description',$description);
				$stmt->bindParam(':picture',$picture);
				$stmt->bindParam(':source',$source);
				$stmt->bindParam(':embed',$embed);
				$stmt->bindParam(':post_time',$post_time);
				$stmt->bindParam(':edit_time',$edit_time);
				$stmt->bindParam(':type',$type);
				$stmt->bindParam(':create_time',time());
				$stmt->bindParam(':update_time',time());
				$stmt->bindParam(':types',$types);
				$stmt->bindParam(':status',$status);
			
				$stmt->execute();
				
				return 'complete';
			}
			catch(PDOException $e){
				return 'System error!';
			}
		}
		else{
			return 'already';
		}
	}

	public function newFanpage($dbHandle,$id,$name,$link,$cover,$like,$talk,$type,$status){
		global $msg;
		
		$stmt = $dbHandle->prepare('SELECT fp_id FROM bl_facebook_page WHERE fp_id = ?');
    	$stmt->execute(array($id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['fp_id'] == ''){
			try{
				$stmt = $dbHandle->prepare('INSERT INTO bl_facebook_page(fp_id,fp_name,fp_link,fp_cover,fp_like,fp_talking,fp_create_time,fp_update_time,fp_type,fp_status) VALUES(:id,:name,:link,:cover,:like,:talk,:create_time,:update_time,:type,:status)');

				$stmt->bindParam(':id',$id);
				$stmt->bindParam(':name',$name);
				$stmt->bindParam(':link',$link);
				$stmt->bindParam(':cover',$cover);
				$stmt->bindParam(':like',$like);
				$stmt->bindParam(':talk',$talk);
				$stmt->bindParam(':create_time',time());
				$stmt->bindParam(':update_time',time());
				$stmt->bindParam(':type',$type);
				$stmt->bindParam(':status',$status);
			
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
	
	public function listFacebookPage($dbHandle,$event,$type,$status,$start,$total){
		try{
			$stmt = $dbHandle->prepare('SELECT fp_id,fp_name,fp_link,fp_cover,fp_like,fp_create_time,fp_update_time,fp_status FROM bl_facebook_page WHERE fp_type = :type ORDER BY fp_update_time DESC LIMIT :start,:total');

    		$stmt->bindParam(':type',$type);

			$stmt->bindParam(':start',$start,PDO::PARAM_INT);
			$stmt->bindParam(':total',$total,PDO::PARAM_INT);
			$stmt->execute();

			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($event == "normal"){
					include'html/fanpage-item.php';
				}
				else if($event == "ajax"){
					include'../html/fanpage-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	public function listFacebookFeed($dbHandle,$event,$type,$status,$start,$total){
		try{
			if($type == 'all'){
				$stmt = $dbHandle->prepare('SELECT * FROM bl_facebook_feed,bl_facebook_page WHERE (ff_status = 0 AND ff_page_id = fp_id) AND (ff_type = "video" OR ff_type = "photo") ORDER BY ff_create_time DESC LIMIT :start,:total');
			}
			else if($type == 'video'){
				$stmt = $dbHandle->prepare('SELECT * FROM bl_facebook_feed,bl_facebook_page WHERE ff_status = 0 AND ff_page_id = fp_id AND ff_type = :type AND ff_object_id != "" ORDER BY ff_create_time DESC LIMIT :start,:total');

    			$stmt->bindParam(':type',$type);
			}
			else if($type == 'photo'){
				$stmt = $dbHandle->prepare('SELECT * FROM bl_facebook_feed,bl_facebook_page WHERE ff_status = 0 AND ff_page_id = fp_id AND ff_type = :type ORDER BY ff_create_time DESC LIMIT :start,:total');

    			$stmt->bindParam(':type',$type);
			}
			else{
				$stmt = $dbHandle->prepare('SELECT * FROM bl_facebook_feed,bl_facebook_page WHERE ff_status = 0 AND ff_page_id = fp_id AND ff_type = :type ORDER BY ff_create_time DESC LIMIT :start,:total');

    			$stmt->bindParam(':type',$type);
			}

			$stmt->bindParam(':start',$start,PDO::PARAM_INT);
			$stmt->bindParam(':total',$total,PDO::PARAM_INT);
			$stmt->execute();

			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($event == "normal"){
					include'html/facebookfeed-item.php';
				}
				else if($event == "ajax"){
					include'../html/facebookfeed-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	// Delete Category with Change Category id all content
	public function deletePage($dbHandle,$page_id){
		global $msg;
		try{
			// Delete Category
			$stmt = $dbHandle->prepare('DELETE FROM bl_facebook_page WHERE fp_id = :id');
			$stmt->bindParam(':id',$page_id);
			
			$stmt->execute();

			return $msg['7'];
		}
		catch(PDOException $e){
			return $msg['0'];
		}
	}
	
	// GET FANPAGE DATA
	public function getFanpageData($dbHandle,$id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_facebook_page WHERE fp_id = ?');
    	$stmt->execute(array($id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}

	// GET FEED DATA
	public function getFeedData($dbHandle,$id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_facebook_feed WHERE ff_id = ?');
    	$stmt->execute(array($id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}

	// GET INFORMATION FANPAGE
	public function infoFanpageData($dbHandle,$event){
		if($event == 'total'){
			$stmt = $dbHandle->prepare('SELECT COUNT(fp_id) FROM bl_facebook_page');
    		$stmt->execute();
    		$var = $stmt->fetch(PDO::FETCH_ASSOC);
    		return $var['COUNT(fp_id)'];
		}
	}

	// GET INFORMATION FACEBOOK FEED
	public function infoFeedData($dbHandle,$event){
		if($event == 'total'){
			$stmt = $dbHandle->prepare('SELECT COUNT(ff_id) FROM bl_facebook_feed WHERE ff_status = 0 AND (ff_type = "video" OR ff_type = "photo")');
    		$stmt->execute();
    		$var = $stmt->fetch(PDO::FETCH_ASSOC);
    		return $var['COUNT(ff_id)'];
		}
	}

	public function statusUpdate($dbHandle,$id){
		try{
			$stmt = $dbHandle->prepare('UPDATE bl_facebook_feed SET ff_status = 1 WHERE ff_id = :id');
			$stmt->bindParam(':id',$id);
			
			$stmt->execute();
			return $msg['7'];
		}
		catch(PDOException $e){
			//return $msg['5'];
			return $e->getMessage();
		}
	}

	public function deleteFacebookFeed($dbHandle,$id){
		try{
			$stmt = $dbHandle->prepare('UPDATE bl_facebook_feed SET ff_status = 99 WHERE ff_id = :id');
			$stmt->bindParam(':id',$id);
			
			$stmt->execute();
			return $msg['7'];
		}
		catch(PDOException $e){
			//return $msg['5'];
			return $e->getMessage();
		}
	}
}
?>