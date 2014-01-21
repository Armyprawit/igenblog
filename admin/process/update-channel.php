<?php
	include'../class/setting.php';
	$var = $youtube->getChannelData($dbHandle,$_POST['id']);
?>
			<div class="headTitle"><i class="fa fa-facebook-square"></i> <?php echo $var['ch_username'];?> <span id="loading" class="loading"></span> <span id="setting" class="setting"></span> <div id="process"></div></div>
			<div class="fanpageForm">
				<div class="startBtn" onClick="javascript:window.open('popup/popup-update-youtube-channel.php?e=start&id=<?php echo $var['ch_id'];?>','Update Fanpage' ,'menuber=no,toorlbar=no,location=no,scrollbars=no,status=no,resizable=no,width=500,height=500,top=0,left=960');">เริ่มอัพเดท <?php echo $var['ch_username'];?></div>
	
				<div class="note"><i class="fa fa-info"></i> ระบบจะเปิดหน้า Popup กรุณาอย่าปิด จนกว่าจะทำงานเสร็จ</div>
			</div>