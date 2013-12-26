<?php
class Admin extends MyDev{
	
	//ADMIN LOGIN
	public function loginG($dbHandle,$user,$password){
		try{
    		$stmt = $dbHandle->prepare('SELECT cf_id FROM ig_config WHERE cf_value = :value AND cf_id = 1');
			$user = parent::encryptionKeys($user);
			$stmt->bindParam(':value',$user);
    		$stmt->execute();
			$var = $stmt->fetch(PDO::FETCH_ASSOC);
			echo $userC = $var['cf_id'];
			if($userC == 1){
				$stmt = $dbHandle->prepare('SELECT cf_id FROM ig_config WHERE cf_value = :value AND cf_id = 2');
				$password = parent::encryptionKeys($password);
				$stmt->bindParam(':value',$password);
    			$stmt->execute();
				$var = $stmt->fetch(PDO::FETCH_ASSOC);
				echo $passwordC = $var['cf_id'];
				if($passwordC == 2){
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