<?php
	include'../class/setting.php';
	$var = $youtube->getChannelData($dbHandle,$_POST['id']);
	include'../html/channel-form.php';
?>