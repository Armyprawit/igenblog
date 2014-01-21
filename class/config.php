<?php
	//DATABASE CONNECTION
	$config['username'] = "root"; //Username of Username.
	$config['password'] = "31032534"; //Username of Password.
	$config['dbname'] = "igen_blog"; //Name of Database.
	
	//SITE SETTING
	$config['site_start'] = "2013-07-1"; // year month day
	$config['loginC'] = 'igenblog'; // KEY FOR CHECK SESSION LOGIN AT ADMIN SYSTEM
	
	//PHP Data Objects (PDO)
	$dbHandle = new PDO('mysql:host=localhost;dbname='.$config['dbname'].';charset=utf8;',$config['username'],$config['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$dbHandle->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// always disable emulated prepared statement when using the MySQL driver
	$dbHandle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	//$dbHandle->exec("SET CHARACTER SET utf8");
?>