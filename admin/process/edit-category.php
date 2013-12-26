<?php
	include'../class/setting.php';
	$var = $category->getCategoryData($dbHandle,$_POST['id']);
	include'../html/category-form-edit.php';
?>