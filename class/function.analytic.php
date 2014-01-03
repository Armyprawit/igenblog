<?php


function updatePageView($type){
	$query = "SELECT pv_value FROM bl_analytic_page_view WHERE pv_id = '".mysql_real_escape_string($type)."'";
	mysql_query("SET NAMES UTF8");
	$result = mysql_query($query);
	$pageview = mysql_fetch_array($result, MYSQL_ASSOC);
	
	$temp = $pageview['pv_value']+1;
	$query = "UPDATE bl_analytic_page_view SET pv_value = '$temp' WHERE pv_id = '".mysql_real_escape_string($type)."'";
	mysql_query("SET NAMES UTF8");
	mysql_query($query);
}
?>