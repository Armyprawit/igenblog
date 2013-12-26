<?php
	include'../class/setting.php';

	$type = 1;
	$status = 1;

	if(strpos($_POST['id'],"youtu.be") > 0){
		$var = $youtube->getVideoDataByLinkAPI($_POST['id'],2);
	}
	else if(strpos($_POST['id'],"youtube.com") > 0){
		$var = $youtube->getVideoDataByLinkAPI($_POST['id'],1);
	}
	// this Video is Vimeo.com
	else if(strpos($_POST['id'],"vimeo.com") > 0){

	}
	// this Video is Dailymotion.com
	else if(strpos($_POST['id'],"dailymotion.com") > 0){

	}

	// echo $_POST['category'].'<br>';
	// echo $_POST['title'].'<br>';
	// echo $_POST['description'].'<br>';
	// echo $_POST['keyword'].'<br>';
	
	// echo $var['duration'].'<br>';
	// echo $var['code'].'<br>';
	// echo $var['image_mini'].'<br>';
	// echo $var['image_hd'].'<br>';
	// echo $var['uploader'].'<br>';

	echo $video->newVideo($dbHandle,$_POST['category'],0,0,$_POST['title'],$_POST['description'],$var['duration'],$_POST['keyword'],$var['image_mini'],$var['image_hd'],$var['code'],$var['uploader'],$type,$status);
?>