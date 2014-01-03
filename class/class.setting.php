<?php
class Setting{
	
	//Get Setting Data
	public function getSetting($setting_id){
		$query = "SELECT se_value FROM bl_setting WHERE se_id = '".mysql_real_escape_string($setting_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		$setting = mysql_fetch_array($result, MYSQL_ASSOC);
		return $setting['se_value'];
	}
}
?>