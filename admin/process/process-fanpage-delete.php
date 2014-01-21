<?php
	include'../class/setting.php';

	echo $facebookpage->deletePage($dbHandle,$_POST['id']);
?>