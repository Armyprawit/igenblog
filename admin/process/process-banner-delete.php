<?php
	include'../class/setting.php';

	echo $banner->deleteBanner($dbHandle,$_POST['id']);
?>