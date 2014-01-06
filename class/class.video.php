<?php
class Video{

	// GET VIDEO DATA
	public function getVideoData($dbHandle,$video_id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_video,bl_category WHERE vi_category_id = ca_id AND vi_id = ?');
    	$stmt->execute(array($video_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}

	public function updateStatus($dbHandle,$event,$id){
		if($event == 'view'){
			$stmt = $dbHandle->prepare('SELECT vi_c_view FROM bl_video WHERE vi_id = ?');
    		$stmt->execute(array($id));
			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			$var['vi_c_view']++;

			$stmt = $dbHandle->prepare('UPDATE bl_video SET vi_c_view = :view,vi_update_time = :update_time WHERE vi_id = :id');
			$stmt->bindParam(':view',$var['vi_c_view']);
			$stmt->bindParam(':update_time',time());
			$stmt->bindParam(':id',$id);
    		$stmt->execute();
		}
		else if($event == 'watch'){
			$stmt = $dbHandle->prepare('SELECT vi_c_watch FROM bl_video WHERE vi_id = ?');
    		$stmt->execute(array($id));
			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			$var['vi_c_watch']++;

			$stmt = $dbHandle->prepare('UPDATE bl_video SET vi_c_watch = :view,vi_update_time = :update_time WHERE vi_id = :id');
			$stmt->bindParam(':view',$var['vi_c_watch']);
			$stmt->bindParam(':update_time',time());
			$stmt->bindParam(':id',$id);
    		$stmt->execute();
		}
	}
}
?>