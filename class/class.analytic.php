<?php
class Analytic extends MyDev{
	////////////////////////////////////
	// SAVE LOG my site. ///////////////
	////////////////////////////////////
	public function saveLog($user_id,$action,$url,$time_load,$count_sql,$type){
		$query = "SELECT pv_value FROM bl_analytic_page_view WHERE pv_id = '".mysql_real_escape_string($type)."'";
		$query = "INSERT INTO lb_log (lg_ip,lg_user_id,lg_action,lg_target,lg_url,lg_time,lg_time_load,lg_sql,lg_type) VALUES ('".parent::getIpAddress()."','".mysql_real_escape_string($$user_id)."','".mysql_real_escape_string($action)."','".mysql_real_escape_string($target)."','".mysql_real_escape_string($url)."','".time()."','".mysql_real_escape_string($time_load)."','".mysql_real_escape_string($count_sql)."','".mysql_real_escape_string($type)."')";
		mysql_query("SET NAMES UTF8");
		mysql_query($query);
		$this->overLog();
	}
	
	private function overLog(){
		$query = "SELECT COUNT(lg_id) FROM lb_log";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$log = mysql_fetch_array($result, MYSQL_ASSOC);
		
		if($log['COUNT(lg_id)'] > 300){
			$query = "DELETE FROM lb_log ORDER BY lg_time ASC LIMIT 100 ";
			mysql_query($query);
		}
	}
	
	//Get Count Query of load Fage
	public function countQuery(){
		$res = mysql_query("SHOW SESSION STATUS LIKE 'Questions'");
		$igen = mysql_fetch_array($res, MYSQL_ASSOC);
		define("STOP_QUERIES",$igen['Value']);
		return "".(STOP_QUERIES-START_QUERIES-1);
	}
	
	
	
	
	/////////////////////////////////
	// LIVE ONLINE //////////////////
	/////////////////////////////////
	// Check User Live Online by Session , IP address
	public function liveOnline(){
		// Time of Respon Active Check user online.
		// 60(s) = 1 Min
		$time_check = time()-300;
		
		//Find Session ID 
		$session_db = mysql_query("SELECT COUNT(*) FROM bl_live_online WHERE lo_session = '".mysql_real_escape_string(session_id())."'");
		$session_check = mysql_result($session_db,0);
		
		//Session not Found !	
		if ($session_check == "0"){
			mysql_query("INSERT INTO bl_live_online VALUES ('".mysql_real_escape_string(session_id())."','".parent::getIpAddress()."',0,'".time()."',1)");
		}
		//Session is Found (Update new Time this Session ID)
		else{
			mysql_query("UPDATE bl_live_online SET lo_time = '".time()."' WHERE lo_session = '".mysql_real_escape_string(session_id())."'");
		}
		
		//Delete Session ID is Respon Active over time_check.
		mysql_query("DELETE FROM bl_live_online WHERE lo_time < $time_check");
	}
	
	// Get User live online by Type (1 = Desktop, 2 = Mobile)
	public function getLiveOnline($type){
		$count_user = mysql_query("SELECT COUNT(lo_session) FROM bl_live_online WHERE lo_type = '".mysql_real_escape_string($type)."'");
		$online = mysql_result($count_user,0);
	
		return $online;
	}
	
	
	
	
	///////////////////////////////
	//Update Page View on Site/////
	///////////////////////////////
	
	//Update Page View
	public function updatePageView($type){
		$query = "SELECT pv_value FROM bl_analytic_page_view WHERE pv_id = '".mysql_real_escape_string($type)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$pageview = mysql_fetch_array($result, MYSQL_ASSOC);
		
		$query = "UPDATE bl_analytic_page_view SET pv_value = '".mysql_real_escape_string($pageview['pv_value']+1)."' WHERE pv_id = '".mysql_real_escape_string($type)."'";
		mysql_query("SET NAMES UTF8");
		mysql_query($query);
	}
	
	//Get Page View by Type
	public function getPageView($type){
		$query = "SELECT pv_value FROM bl_analytic_page_view WHERE pv_id = '".mysql_real_escape_string($type)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$pageview = mysql_fetch_array($result, MYSQL_ASSOC);
		
		return $pageview['pv_value'];
	}
}
?>