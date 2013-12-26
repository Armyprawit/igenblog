<?php
	include'../class/setting.php';
	$var = $photo->getPhotoData($dbHandle,$_POST['id']);
	include'../html/photo-form-edit.php';
?>