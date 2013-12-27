<?php
	include'../class/setting.php';
	$banner->listBanner($dbHandle,'ajax',$_POST['type'],0,5);
?>