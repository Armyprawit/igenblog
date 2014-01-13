<?php
	include'../class/setting.php';
	require'../sdk/facebook-sdk/facebook.php';
	include'../get-facebook-user.php';
	
	if($user){
		$fanpage = $facebook->api($_POST['link']);
		if($fanpage['id'] != ''){
			$facebookpage->newFanpage($dbHandle,$fanpage['id'],$fanpage['name'],$fanpage['link'],$fanpage['cover']['source'],$fanpage['likes'],$fanpage['talking_about_count'],1,1);
		}
		else{
			echo'API Error !';
		}
	}
?>