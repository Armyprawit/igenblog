<?php
include'../class/setting.php';
$banner->listBanner($dbHandle,'ajax',$_POST['zone'],$_POST['start']+0,5);
?>