<?php
	include'../class/setting.php';

	echo $youtube->deleteChannel($dbHandle,$_POST['id']);
?>