<?php
	include'../class/setting.php';
	$var = $banner->getBannerData($dbHandle,$_POST['id']);
	include'../html/banner-form-edit.php';
?>