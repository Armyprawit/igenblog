<?php
	include'../class/setting.php';
	$article->listArticle($dbHandle,'ajax',$_POST['category'],1,1,0,5);
?>