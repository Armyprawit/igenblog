<?php
	include'../class/setting.php';
	echo $message = $category->newCategory($dbHandle,$_POST['title'],$_POST['description'],$_POST['url'],$_POST['keyword'],$_POST['image']);
?>