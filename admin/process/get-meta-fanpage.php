<?php
	include'../class/setting.php';
	require'../sdk/facebook-sdk/facebook.php';
	include'../get-facebook-user.php';

	if($user){
		$fanpage = $facebook->api($_POST['link']);
		if($fanpage['id'] != ''){
			include'../html/fanpage-item-meta.php';
		}
	}
?>