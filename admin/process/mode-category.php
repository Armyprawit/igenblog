<?php
	include'../class/setting.php';
	$category->listCategory($dbHandle,'ajax',$_POST['mode'],0,100);
?>