<?php
	include'../class/setting.php';

	echo $category->deleteCategory($dbHandle,$_POST['id']);
?>