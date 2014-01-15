<?php
	include'../class/setting.php';

	//Update Status to 1 (Updated)
	$facebookpage->deleteFacebookFeed($dbHandle,$_POST['id']);
?>