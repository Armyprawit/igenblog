<?php
	include'../class/setting.php';
	$video->listVideo($dbHandle,'ajax',$_POST['category'],1,1,0,5);
?>