<?php
	include'../class/setting.php';

	$type = 1;
	$status = 1;
	echo $article->newArticle($dbHandle,$_POST['category'],0,$_POST['title'],$_POST['keyword'],$_POST['image'],$_POST['context'],$_POST['credit'],$type,$status);
?>