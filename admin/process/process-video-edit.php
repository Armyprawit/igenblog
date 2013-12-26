<?php
	include'../class/setting.php';
	echo $video->updateVideo($dbHandle,$_POST['id'],$_POST['category'],$_POST['title'],$_POST['description'],$_POST['keyword']);
?>