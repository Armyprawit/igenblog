<?php
	include'../class/setting.php';

	echo $youtube->newVideoYoutube($dbHandle,$_POST['category'],$_POST['title'],$_POST['text'],$_POST['duration'],$_POST['keyword'],$_POST['image_mini'],$_POST['image_hd'],$_POST['code'],$_POST['uploader'],$_POST['type'],$_POST['status'],$_POST['start']);
?>