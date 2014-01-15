<?php
	include'../class/setting.php';
	$facebookpage->listFacebookFeed($dbHandle,'ajax',$_POST['type'],1,0,10);
?>