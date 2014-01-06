<?php
	include'../class/setting.php';

	$article->updateStatus($dbHandle,'watch',$_POST['id']);
?>