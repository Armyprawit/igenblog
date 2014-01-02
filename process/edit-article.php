<?php
	include'../class/setting.php';
	$var = $article->getArticleData($dbHandle,$_POST['id']);
	include'../html/article-form-edit.php';
?>