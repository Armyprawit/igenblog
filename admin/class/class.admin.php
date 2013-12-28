<?php
class Admin extends MyDev{
	
	//ADMIN LOGIN
	public function loginG($dbHandle,$user,$password){

		$user = parent::encryptionKeys($user);
		$password = parent::encryptionKeys($password);

		try{
    		$stmt = $dbHandle->prepare('SELECT se_id FROM bl_setting WHERE se_value = :value AND se_id = 20');
			
			$stmt->bindParam(':value',$user);
    		$stmt->execute();
			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if($var['se_id'] == 20){

				$stmt = $dbHandle->prepare('SELECT se_id FROM bl_setting WHERE se_value = :value AND se_id = 21');
				$stmt->bindParam(':value',$password);
    			$stmt->execute();
				$var = $stmt->fetch(PDO::FETCH_ASSOC);

				if($var['se_id'] == 21){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		catch(PDOException $e){
			return false;
		}
	}
}
?>