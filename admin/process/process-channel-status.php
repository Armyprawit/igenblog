<?php
	include'../class/setting.php';

	if($_POST['stat'] == 1){
		$status = 0;
		?><div class="btn left delete" onClick="Javascript:statusChannel(<?php echo $_POST['id'];?>,<?php echo $status;?>);">ปิดอัพเดท</div><?php
	}
	else{
		$status = 1;
		?><div class="btn left normal" onClick="Javascript:statusChannel(<?php echo $_POST['id'];?>,<?php echo $status;?>);">ทำงาน</div><?php
	}

	$youtube->statusChannel($dbHandle,$_POST['id'],$status);
?>