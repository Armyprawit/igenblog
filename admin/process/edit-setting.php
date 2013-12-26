<?php
	include'../class/setting.php';

	if($_POST['type']== 1){
		$headTitle = '<i class="fa fa-leaf" style="color:#1abc9c;"></i> Site Setting';
	}
	else if($_POST['type']== 2){
		$headTitle = '<i class="fa fa-cog" style="color:#555555;"></i> Admin Setting';
	}
	else if($_POST['type']== 3){
		$headTitle = '<i class="fa fa-facebook-square" style="color:#2980b9;"></i> Facebook Setting';
	}
	else if($_POST['type']== 4){
		$headTitle = '<i class="fa fa-google-plus-square" style="color:#e74c3c;"></i> Google Setting';
	}
	else if($_POST['type']== 5){
		$headTitle = '<i class="fa fa-youtube-play" style="color:#e74c3c;"></i> Youtube Setting';
	}
	else if($_POST['type']== 6){
		$headTitle = '<i class="fa fa-cogs" style="color:#34495e;"></i> Other Setting';
	}
	else if($_POST['type']== 7){
		$headTitle = '<i class="fa fa-twitter" style="color:#3498db;"></i> Twitter Setting';
	}
	else{
		$headTitle = '...';
	}
?>
	<div class="headTitle"><?php echo $headTitle;?></div>
    <div class="form">
        <?php $setting->listSetting($dbHandle,$_POST['type'],1);?>
    </div>


<!--
1 = SiteSetting
2 = AdminSetting
3 = FacebookSetting
4 = GoogleSetting
5 = YoutubeSetting
6 = OtherSetting
7 = TwitterSetting
-->