<?php
	//Start Session and Cookie.
	session_start();
	ob_start();
	
	//CONNECTION DATABASE CONFIG.
	include'config.php';
	
	
	//COUNT TIME ON LOAD PAGE
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$starttime = $mtime;
	
	//COUNT QUERY STATEMENT
	$res = mysql_query("SHOW SESSION STATUS LIKE 'Questions'");
	$igen = mysql_fetch_array($res, MYSQL_ASSOC);
	define("START_QUERIES",$igen['Value']);
	
	// ALL CLASS ////////////////////////////
	include'class.mydev.php';
	include'class.admin.php';
	include'class.analytic.php';
	include'class.fanpage.php';
	include'class.youtube.php';
	include'class.timeline.php';
	include'class.video.php';
	include'class.category.php';
	include'class.article.php';
	include'class.photo.php';
	include'class.banner.php';
	include'class.setting.php';
	include'class.api.php';
	
	//CREATE OBJECT
	$admin = new Admin;
	$analytic = new Analytic;
	$article = new Article;
	$category = new Category;
	$timeline = new Timeline;
	$youtube = new Youtube;
	$video = new Video;
	$photo = new Photo;
	$banner = new Banner;
	$mydev = new MyDev;
	$setting = new Setting;
	$api = new Api;
	$facebookpage = new FacebookPage;

	if($_GET['e'] == loginG){
    	if($admin->loginG($dbHandle,$_POST['username'],$_POST['password'])){
      		$_SESSION['adminG'] = 'igenblog';
    	}
    	else{
     		header('Location:login.php?e=fail');
    	}
  	}
  
  	else if($_GET['e']=='logoutG'){
    	session_destroy();
    	header('Location:login.php');
  	}

  	if($_SESSION['adminG'] != 'igenblog'){
		header('Location:login.php');
	}
?>