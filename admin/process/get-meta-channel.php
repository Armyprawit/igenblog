<?php
	include'../class/setting.php';

	$var = $youtube->getChannelData($_POST['username']);
	include'../html/channel-item-meta.php';
?>