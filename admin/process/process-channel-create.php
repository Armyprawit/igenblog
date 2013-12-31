<?php
	include'../class/setting.php';

	$user = $youtube->getChannelData($_POST['username']);
	echo $youtube->newChannel($dbHandle,$user['title'],$user['description'],$user['username'],$user['image'],$user['href'],$user['url'],$user['google'],$user['location']);
?>