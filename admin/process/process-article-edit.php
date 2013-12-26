<?php
	include'../class/setting.php';

	$type = 1;
	$status = 1;
	echo $article->updateArticle($dbHandle,$_POST['id'],$_POST['category'],0,$_POST['title'],$_POST['keyword'],$_POST['image'],$_POST['context'],$_POST['credit'],$type,$status);
?>