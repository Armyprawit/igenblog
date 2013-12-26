<?php
	include'../class/setting.php';

	echo $banner->newBanner($dbHandle,$_POST['image'],$_POST['link'],$_POST['title'],$_POST['zone']);
?>