<?php
	// Start Session and Cookie.
	session_start();
	ob_start();
	
	// Other Function
	include'config.php';
	//Setting my Site.
	
	
	//COUNT TIME ON LOAD PAGE
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$starttime = $mtime;
	
	// COUNT QUERY STATEMENT
	$res = mysql_query("SHOW SESSION STATUS LIKE 'Questions'");
	$igen = mysql_fetch_array($res, MYSQL_ASSOC);
	define("START_QUERIES",$igen['Value']);
	
	// ALL CLASS /////////////////////////////
	include'class.license.php';
	include'class.setting.php';
	include'class.mydev.php';
	include'class.meta.php';
	include'class.category.php';
	include'class.timeline.php';
	include'class.analytic.php';
	include'class.article.php';
	include'class.video.php';
	include'class.image.php';
	include'class.banner.php';
?>