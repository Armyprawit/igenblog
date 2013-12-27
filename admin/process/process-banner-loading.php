<?php
include'../class/setting.php';
$banner->listBanner($dbHandle,'ajax',1,$_POST['start']+0,5);
?>