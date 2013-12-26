<?php
	include'../class/setting.php';
	echo $message = $category->updateCategory($dbHandle,$_POST['id'],$_POST['title'],$_POST['description'],$_POST['url'],$_POST['keyword'],$_POST['image']);
?>