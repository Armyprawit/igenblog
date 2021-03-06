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


	public function updateBanner($dbHandle,$id,$image,$link,$title,$zone){
		global $msg;
		$stmt = $dbHandle->prepare('SELECT ba_id FROM bl_banner WHERE ba_image = ?');
    	$stmt->execute(array($image));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if(true){
			try{

				$stmt = $dbHandle->prepare('UPDATE bl_banner SET ba_title = :title,ba_image = :image,ba_link = :link,ba_zone = :zone WHERE ba_id = :id');

				$stmt->bindParam(':id',$id);
				$stmt->bindParam(':title',$title);
				$stmt->bindParam(':image',$image);
				$stmt->bindParam(':link',$link);
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
			echo"Process";
			return $msg['8'];
		}
	}

	public function statusBanner($dbHandle,$id,$status){

		global $msg;
		try{
			$stmt = $dbHandle->prepare('UPDATE bl_banner SET ba_status = :status WHERE ba_id = :id');

				$stmt->bindParam(':status',$status);
				$stmt->bindParam(':id',$id);
			
				$stmt->execute();

				$id = $id + 1024;
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

	public function listBanner($dbHandle,$event,$zone,$start,$total){
		try{
			if($zone == 0){
				$stmt = $dbHandle->prepare('SELECT ba_id,ba_title,ba_image,ba_link,ba_create_time,ba_zone,ba_status FROM bl_banner ORDER BY ba_create_time DESC LIMIT :start,:total');
				
				$stmt->bindParam(':start',$start,PDO::PARAM_INT);
				$stmt->bindParam(':total',$total,PDO::PARAM_INT);
    			$stmt->execute();
			}
			else{
				$stmt = $dbHandle->prepare('SELECT ba_id,ba_title,ba_image,ba_link,ba_create_time,ba_zone,ba_status FROM bl_banner WHERE ba_zone = :zone ORDER BY ba_create_time DESC LIMIT :start,:total');
				$stmt->bindParam(':zone',$zone);
				
				$stmt->bindParam(':start',$start,PDO::PARAM_INT);
				$stmt->bindParam(':total',$total,PDO::PARAM_INT);
    			$stmt->execute();
			}

			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($event == "normal"){
					include'html/banner-item.php';
				}
				else if($event == "ajax"){
					include'../html/banner-item.php';
				}
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}

	// Delete Category with Change Category id all content
	public function deleteBanner($dbHandle,$banner_id){
		global $msg;
		try{
			// Delete Category
			$stmt = $dbHandle->prepare('DELETE FROM bl_banner WHERE ba_id = :id');
			$stmt->bindParam(':id',$banner_id);
			
			$stmt->execute();

			return $msg['7'];
		}
		catch(PDOException $e){
			return $msg['0'];
		}
	}


	// GET VIDEO DATA
	public function getBannerData($dbHandle,$id){
		$stmt = $dbHandle->prepare('SELECT * FROM bl_banner WHERE ba_id = ?');
    	$stmt->execute(array($id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $var;
	}

	public function infoBannerData($dbHandle,$event){
		if($event == 'total'){
			$stmt = $dbHandle->prepare('SELECT COUNT(ba_id) FROM bl_banner');
    		$stmt->execute();
    		$var = $stmt->fetch(PDO::FETCH_ASSOC);
    		return $var['COUNT(ba_id)'];
		}
	}
}
?>