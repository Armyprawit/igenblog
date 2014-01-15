<?php
include'../class/setting.php';

$facebookpage->listFacebookFeed($dbHandle,'ajax',$_POST['type'],1,$_POST['start']+0,10);
?>