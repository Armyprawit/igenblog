<?php
class Image{
	
	// GET VIDEO DATA
	public function getPhotoData($dbHandle,$image_id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_image,bl_category WHERE im_category_id = ca_id AND im_id = ?');
    	$stmt->execute(array($image_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}

	public function updateStatus($dbHandle,$event,$id){
		if($event == 'view'){
			$stmt = $dbHandle->prepare('SELECT im_c_view FROM bl_image WHERE im_id = ?');
    		$stmt->execute(array($id));
			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			$var['im_c_view']++;

			$stmt = $dbHandle->prepare('UPDATE bl_image SET im_c_view = :view,im_update_time = :update_time WHERE im_id = :id');
			$stmt->bindParam(':view',$var['im_c_view']);
			$stmt->bindParam(':update_time',time());
			$stmt->bindParam(':id',$id);
    		$stmt->execute();

    		// Update Last time of Timeline
    		$stmt = $dbHandle->prepare('UPDATE bl_timeline SET tl_last_time = :update_time WHERE tl_content_id = :id AND tl_type = 3');
			$stmt->bindParam(':update_time',time());
			$stmt->bindParam(':id',$id);
    		$stmt->execute();
		}
		else if($event == 'watch'){
			$stmt = $dbHandle->prepare('SELECT im_c_watch FROM bl_image WHERE im_id = ?');
    		$stmt->execute(array($id));
			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			$var['im_c_watch']++;

			$stmt = $dbHandle->prepare('UPDATE bl_image SET im_c_watch = :view,im_update_time = :update_time WHERE im_id = :id');
			$stmt->bindParam(':view',$var['im_c_watch']);
			$stmt->bindParam(':update_time',time());
			$stmt->bindParam(':id',$id);
    		$stmt->execute();
		}
	}
}
?>