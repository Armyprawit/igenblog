<?php
class Setting{
	
	//Get Setting Data
	public function getSetting($dbHandle,$setting_id){
		try{
    		$stmt = $dbHandle->prepare('SELECT se_value FROM bl_setting WHERE se_id = ?');
    		$stmt->execute(array($setting_id));
			$var = $stmt->fetch(PDO::FETCH_ASSOC);

			return $var['se_value'];
		}
		catch(PDOException $e){echo'ERROR:'.$e->getMessage();}
	}
}
?>