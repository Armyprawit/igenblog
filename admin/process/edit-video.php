<?php
	include'../class/setting.php';
	$var = $video->getVideoData($dbHandle,$_POST['id']);
	include'../html/video-form-edit.php';
?>