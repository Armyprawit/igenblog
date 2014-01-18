<?php
	include'../class/setting.php';

	if($_POST['stat'] == 1){
		$status = 0;
		?><div class="btn left delete" onClick="Javascript:statusBanner(<?php echo $_POST['id'];?>,<?php echo $status;?>);">แบบร่าง</div><?php
	}
	else{
		$status = 1;
		?><div class="btn left normal" onClick="Javascript:statusBanner(<?php echo $_POST['id'];?>,<?php echo $status;?>);">เผยแพร่</div><?php
	}
	$banner->statusBanner($dbHandle,$_POST['id'],$status);
?>