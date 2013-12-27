<?php
	include'../class/setting.php';
	echo $banner->updateBanner($dbHandle,$_POST['id'],$_POST['image'],$_POST['link'],$_POST['title'],$_POST['zone']);
?>