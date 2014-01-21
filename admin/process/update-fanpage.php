<?php
	include'../class/setting.php';
	require'../sdk/facebook-sdk/facebook.php';
	include'../get-facebook-user.php';
	$var = $facebookpage->getFanpageData($dbHandle,$_POST['id']);
?>
<div class="headTitle"><i class="fa fa-facebook-square"></i> <?php echo $var['fp_name'];?> <span id="loading" class="loading"></span> <span id="setting" class="setting"></span> <div id="process"></div></div>
<div class="fanpageForm">
	<?php if($user){?>
	<div class="startBtn" onClick="javascript:window.open('popup/popup-update-fanpage.php?id=<?php echo $var['fp_id'];?>&e=update&page=1&feed=0&already=0','Update Fanpage' ,'menuber=no,toorlbar=no,location=no,scrollbars=no,status=no,resizable=no,width=500,height=500,top=0,left=960');">เริ่มอัพเดท <?php echo $var['fp_name'];?></div>
	
	<div class="note"><i class="fa fa-info"></i> ระบบจะเปิดหน้า Popup กรุณาอย่าปิด จนกว่าจะทำงานเสร็จ</div>
	<?php
	}
	else{
		?><div class="note"><i class="fa fa-info"></i> กรุณา Login Facebook ก่อนอัพเดท !</div><?php
	}
	?>
</div>