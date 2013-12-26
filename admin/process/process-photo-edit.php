<?php
	include'../class/setting.php';
	echo $photo->updatePhoto($dbHandle,$_POST['id'],$_POST['category'],$_POST['image'],$_POST['title'],$_POST['description'],$_POST['keyword']);
?>