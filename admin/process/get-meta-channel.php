<?php
	include'../class/setting.php';

	$var = $youtube->getChannelMeta($_POST['username']);
	include'../html/channel-item-meta.php';
?>