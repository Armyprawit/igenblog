<?php
	include'../class/setting.php';
	$type = 1;

	// Status = 1 = active
	$status = 1;

	// GET Feed Data By ID
	$var = $facebookpage->getFeedData($dbHandle,$_POST['id']);
	
	// Process add new Photo
	echo $photo->newPhoto($dbHandle,$_POST['category'],0,0,'title',$_POST['description'],$_POST['keyword'],$_POST['image'],$type,$status);

	//Update Status to 1 (Updated)
	$facebookpage->statusUpdate($dbHandle,$_POST['id']);
?>