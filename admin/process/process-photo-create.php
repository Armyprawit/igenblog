<?php
	include'../class/setting.php';

	$type = 1;
	$status = 1;
	echo $photo-> newPhoto($dbHandle,$_POST['category'],0,0,'title',$_POST['description'],$_POST['keyword'],$_POST['image'],$type,$status);
?>