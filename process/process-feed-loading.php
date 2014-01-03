<?php
	include'../class/setting.php';

	$timeline->getFeedTimeline($dbHandle,'ajax',0,0,$_POST['start']+0,21);
?>
<!-- LIB -->
<script src="../lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../lib/jquery.imagefill.js" type="text/javascript"></script>
<script src="../lib/mydev.js" type="text/javascript"></script>