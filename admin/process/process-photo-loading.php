<?php
include'../class/setting.php';
$photo->listPhoto($dbHandle,'ajax',$_POST['category'],1,1,$_POST['start']+0,5);
?>