<?php
	include'../class/setting.php';
	if(strpos($_POST['id'],"youtu.be") > 0){
		$var = $youtube->getVideoDataByLinkAPI($_POST['id'],2);
		$var1 = $youtube->getVideoDataByLinkCURL($_POST['id'],2);
	}
	else if(strpos($_POST['id'],"youtube.com") > 0){
		$var = $youtube->getVideoDataByLinkAPI($_POST['id'],1);
		$var1 = $youtube->getVideoDataByLinkCURL($_POST['id'],1);
	}
	// this Video is Vimeo.com
	else if(strpos($_POST['id'],"vimeo.com") > 0){

	}
	// this Video is Dailymotion.com
	else if(strpos($_POST['id'],"dailymotion.com") > 0){

	}

	include'../html/video-form-meta.php';
?>