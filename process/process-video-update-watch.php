<?php
	include'../class/setting.php';

	$video->updateStatus($dbHandle,'watch',$_POST['id']);
?>