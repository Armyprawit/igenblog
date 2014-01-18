<?php
	//End Time Load Page.
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$endtime = $mtime;
	$totaltime = number_format(($endtime - $starttime),2);

	$analytic->saveLog($dbHandle,$mydev->getIpAddress(),$log['user'],$log['target'],$log['action'],$log['url'],$totaltime,0,1);
	$analytic->liveOnlines($dbHandle,session_id(),$mydev->getIpAddress(),0,1);
?>