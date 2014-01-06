<?php
class Article extends MyDev{
	
	// GET VIDEO DATA
	public function getArticleData($dbHandle,$article_id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_article,bl_category WHERE ar_category_id = ca_id AND ar_id = ?');
    	$stmt->execute(array($article_id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}
	
	public function updateStatus($dbHandle,$event,$id){
		if($event == 'view'){
			$stmt = $dbHandle->prepare('SELECT ar_c_view FROM bl_article WHERE ar_id = ?');
    		$stmt->execute(array($id));
			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			$var['ar_c_view']++;

			$stmt = $dbHandle->prepare('UPDATE bl_article SET ar_c_view = :view,ar_update_time = :update_time WHERE ar_id = :id');
			$stmt->bindParam(':view',$var['ar_c_view']);
			$stmt->bindParam(':update_time',time());
			$stmt->bindParam(':id',$id);
    		$stmt->execute();
		}
		else if($event == 'watch'){
			$stmt = $dbHandle->prepare('SELECT ar_c_read FROM bl_article WHERE ar_id = ?');
    		$stmt->execute(array($id));
			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			$var['ar_c_read']++;

			$stmt = $dbHandle->prepare('UPDATE bl_article SET ar_c_read = :view,ar_update_time = :update_time WHERE ar_id = :id');
			$stmt->bindParam(':view',$var['ar_c_read']);
			$stmt->bindParam(':update_time',time());
			$stmt->bindParam(':id',$id);
    		$stmt->execute();
		}
	}
}
?>