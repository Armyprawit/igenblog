<?php
//Message Set
include_once'var-message.php';

class Setting{
	public function listSetting($dbHandle,$type,$status){
		try{
    		$stmt = $dbHandle->prepare('SELECT * FROM bl_setting WHERE se_type = :type AND se_status = :status ORDER BY se_sort ASC');
			$stmt->bindParam(':type',$type);
			$stmt->bindParam(':status',$status);
    		$stmt->execute();
			while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
				include'../html/setting-form-item.php';
			}
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
	public function updateSetting($dbHandle,$id,$value){
		global $msg;
		
		try{
			$stmt = $dbHandle->prepare("UPDATE bl_setting SET se_value = :value,se_update_time = :update_time WHERE se_id = :id");
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':value',$value);
			$stmt->bindParam(':update_time',time());
			
			$stmt->execute();
			return $msg['0'];
		}
		catch(PDOException $e){
			return $msg['5'];
		}
	}
}
?>