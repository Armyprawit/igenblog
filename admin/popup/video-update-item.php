	<div class="resultItem <?php if($state == 'already'){echo'already';}?>">
		<div class="type"><i class="fa fa-youtube-play"></i></div>

		<div class="id"><?php echo $data['title'];?></div>
		<?php
		if($state == 'complete'){
			$stateMsg = 'อัพเดท';
		}
		else if($state == 'already'){
			$stateMsg = 'มีแล้ว';
		}
		else{
			$stateMsg = 'ขัดข้อง';
		}
		?>
		<div class="status done"><?php echo $stateMsg;?></div>
	</div>