<?php
	include'../class/setting.php';

	// Type = 4 = Facebook Video Embed player.
	$type = 1;

	// Status = 1 = active
	$status = 1;

	// GET Feed Data By ID
	$var = $facebookpage->getFeedData($dbHandle,$_POST['id']);

	echo $article->newArticle($dbHandle,$_POST['category'],0,$_POST['title'],$_POST['keyword'],$_POST['image'],$_POST['context'],$_POST['credit'],$type,$status);

	//Update Status to 1 (Updated)
	$facebookpage->statusUpdate($dbHandle,$_POST['id']);
?>