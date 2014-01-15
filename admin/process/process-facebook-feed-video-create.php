<?php
	include'../class/setting.php';

	// Type = 4 = Facebook Video Embed player.
	$type = 4;

	// Status = 1 = active
	$status = 1;

	// GET Feed Data By ID
	$var = $facebookpage->getFeedData($dbHandle,$_POST['id']);

	// Process Add new Video
	echo $video->newVideo($dbHandle,$_POST['category'],0,0,$_POST['title'],$_POST['description'],$var['duration'],$_POST['keyword'],$var['ff_picture'],$var['ff_picture'],$var['ff_object_id'],$var['ff_page_id'],$type,$status);

	//Update Status to 1 (Updated)
	$facebookpage->statusUpdate($dbHandle,$_POST['id']);
?>