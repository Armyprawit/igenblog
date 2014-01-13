<?php
	include'../class/setting.php';

	$timeline->getFeedTimeline($dbHandle,'feed','ajax',$_POST['type']+0,$_POST['category']+0,$_POST['start']+0,9);
?>
<!-- LIB -->
<script src="../lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../lib/jquery.imagefill.js" type="text/javascript"></script>
<script src="../lib/mydev.js" type="text/javascript"></script>