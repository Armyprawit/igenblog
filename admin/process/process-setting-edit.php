<?php
	include'../class/setting.php';
	
	echo $setting->updateSetting($dbHandle,$_POST['id'],$_POST['value']);
?>