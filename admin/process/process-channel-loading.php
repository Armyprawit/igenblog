<?php
include'../class/setting.php';

$youtube->listChannel($dbHandle,'ajax',1,1,$_POST['start']+0,5);
?>