<?php
	include'../class/setting.php';
	$photo->listPhoto($dbHandle,'ajax',$_POST['category'],1,1,0,5);
?>