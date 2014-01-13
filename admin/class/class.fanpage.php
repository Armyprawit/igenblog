<?php
//Message Set
include_once'var-message.php';

class FacebookPage extends MyDev{

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
			$stmt = $dbHandle->prepare('SELECT fp_id,fp_name,fp_link,fp_cover,fp_like,fp_create_time,fp_update_time FROM bl_facebook_page WHERE fp_type = :type ORDER BY fp_update_time DESC LIMIT :start,:total');

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
}
?>