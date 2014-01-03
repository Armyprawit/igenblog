<?php
class Meta{
	//Get Meta Tag
	public function getMeta($meta_id){
		$query = "SELECT * FROM bl_meta WHERE me_id = '".mysql_real_escape_string($meta_id)."'";
		mysql_query("SET NAMES UTF8");
		$result = mysql_query($query);
		return $meta = mysql_fetch_array($result, MYSQL_ASSOC);
	}
}
?>