<?php
	include'../class/setting.php';

	if($_POST['stat'] == 1){
		$status = 0;
	}
	else{
		$status = 1;
	}
	echo $article->statusArticle($dbHandle,$_POST['id'],$status);
?>