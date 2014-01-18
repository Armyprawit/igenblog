<?php
class Analytic extends MyDev{

	public function saveLog($dbHandle,$ip,$user,$target,$action,$url,$timeLoad,$countSQL,$type){
		try{
			$stmt = $dbHandle->prepare('INSERT INTO lb_log(lg_ip,lg_user_id,lg_action,lg_target,lg_url,lg_time,lg_time_load,lg_sql,lg_type) VALUES(:ip,:user,:action,:target,:url,:create_time,:time_load,:sql,:type)');

			$stmt->bindParam(':ip',$ip);
			$stmt->bindParam(':user',$user);
			$stmt->bindParam(':action',$action);
			$stmt->bindParam(':target',$target);
			$stmt->bindParam(':url',$url);
			$stmt->bindParam(':create_time',time());
			$stmt->bindParam(':time_load',$timeLoad);
			$stmt->bindParam(':sql',$countSQL);
			$stmt->bindParam(':type',$type);
			
			$stmt->execute();
			$this->overLog($dbHandle);
				
			return 0;
		}
		catch(PDOException $e){
			//return $msg['0'];
		}
	}
	
	private function overLog($dbHandle){
		$stmt = $dbHandle->prepare('SELECT COUNT(lg_id) FROM lb_log');
    	$stmt->execute();
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['COUNT(lg_id)'] > 1000){
			$stmt = $dbHandle->prepare('DELETE FROM lb_log ORDER BY lg_time ASC LIMIT 100');
    		$stmt->execute();
		}
	}

	public function updatePageview($dbHandle,$id){
		$stmt = $dbHandle->prepare('SELECT pv_value FROM bl_analytic_page_view WHERE pv_id = ?');
    	$stmt->execute(array($id));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);

		$pageview = $var['pv_value'] + 1;

		$stmt = $dbHandle->prepare('UPDATE bl_analytic_page_view SET pv_value = ? WHERE pv_id = ?');
		$stmt->execute(array($pageview,$id));

	}
	
	// Check User Live Online by Session , IP address
	public function liveOnlines($dbHandle,$session,$ip,$user,$device){
		$time_check = time()-60;

		//Find Session ID 
		$stmt = $dbHandle->prepare('SELECT COUNT(lo_session) FROM bl_live_online WHERE lo_session = ?');
    	$stmt->execute(array($session));
		$var = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($var['COUNT(lo_session)'] == 0){
			// Add new session to db (Session not Found!)
			$stmt = $dbHandle->prepare('INSERT INTO bl_live_online(lo_session,lo_ip,lo_user_id,lo_time,lo_type) VALUES (:session,:ip,:user,:time,:device)');
			$stmt->bindParam(':session',$session);
			$stmt->bindParam(':ip',$ip);
			$stmt->bindParam(':user',$user);
			$stmt->bindParam(':time',time());
			$stmt->bindParam(':device',$device);

    		$stmt->execute();
		}
		else{
			//if Session find found. Update Session time to time now.
			$stmt = $dbHandle->prepare('UPDATE bl_live_online SET lo_time = :time WHERE lo_session = :session');
			$stmt->bindParam(':time',time());
			$stmt->bindParam(':session',$session);

    		$stmt->execute();
		}
		
		//Delete Session ID is Respon Active over time_check.
		$stmt = $dbHandle->prepare('DELETE FROM bl_live_online WHERE lo_time < :timeCheck');
		$stmt->bindParam(':timeCheck',$time_check);

		$stmt->execute();
	}
}
?>