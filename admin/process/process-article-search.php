<?php
	include'../class/setting.php';
	$article->searchArticle($dbHandle,'ajax',$_POST['q']);
?>