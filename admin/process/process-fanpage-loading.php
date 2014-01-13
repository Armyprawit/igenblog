<?php
include'../class/setting.php';
$facebookpage->listFacebookPage($dbHandle,'ajax',1,1,$_POST['start']+0,5);
?>