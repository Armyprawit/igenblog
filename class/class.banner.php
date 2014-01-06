<?php
class Banner{
	public function showBanner($dbHandle,$zone){
		try{
			$stmt = $dbHandle->prepare('SELECT ba_title,ba_image,ba_link FROM bl_banner WHERE ba_zone = :zone AND ba_status = 1 ORDER BY ba_create_time DESC');
			$stmt->bindParam(':zone',$zone);

    		$stmt->execute();

    		while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
    			include'html/banner-item.php';
    		}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	public function countBanner($dbHandle,$zone){
		try{
			$stmt = $dbHandle->prepare('SELECT COUNT(ba_id) FROM bl_banner WHERE ba_zone = :zone AND ba_status = 1');
			$stmt->bindParam(':zone',$zone);

    		$stmt->execute();

    		$var = $stmt->fetch(PDO::FETCH_ASSOC);

    		if($var['COUNT(ba_id)'] > 0){
    			return true;
    		}
    		else{
    			return false;
    		}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
}
?>