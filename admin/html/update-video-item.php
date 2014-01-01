				<div class="vidItem" id="vidItem<?php echo $start;?>">
            		<!-- <div class="thumbnail"><img src="<?php //echo $video['image_mini'];?>" alt=""></div> -->
            		<div class="number <?php if($duplicate){echo'duplicate';}?>"><?php echo $start;?></div>
            		<div class="detail">
            			<h3><?php echo $title;?></h3>
            			<p><?php echo parent::convDuration($duration);?> / <?php echo $code;?></p>
            		</div>
            	</div>