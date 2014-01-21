<?php
//Start Session and Cookie.
session_start();
ob_start();

if($_SESSION['adminG'] == 'igenblog'){
  header('Location:index.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IGENBLOG</title>

<!-- Responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- favicon -->
<link rel="shortcut icon" href="image/favicon/icon.ico" />
<!-- For all other browsers -->
<link rel="icon" href="image/favicon/icon.ico"/>
<link rel="address bar icon" href="image/favicon/icon.ico">
<!-- For Modern Browsers with PNG Support -->
<link rel="icon" type="image/png" href="image/favicon/icon32x32.png" sizes="32x32">

<!-- For rounded corners and reflective shine in Apple devices -->
<!-- Default 57x57 -->
<link rel="apple-touch-icon" href="image/favicon/icon57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="image/favicon/icon72x72.png" />
<link rel="apple-touch-icon" sizes="144x144" href="image/favicon/icon144x144.png" />
<!-- Favicon without reflective shine -->
<link rel="apple-touch-icon-precomposed" href="image/favicon/icon57x57.png" />

<!-- ICON FOR Windows 8 -->
<meta name="msapplication-TileColor" content="#FFFFFF">
<meta name="msapplication-TileImage" content="image/favicon/icon72x72.png">

<!-- Style File -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/login.css" type="text/css"/>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

<!-- LIB -->
<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

</head>

<body>
  <?php include'bar.php';?>
  <div class="title">IGENBLOG</div>
  <div id="login">
    
    
    <form action="index.php?e=loginG" target="_parent" method="POST">
      <input type="text" name="username" class="input-text" placeholder="Username" autofocus autocomplete="off">
      <input type="password" name="password" class="input-text" placeholder="Password">
      <?php if($_GET['e'] == 'fail'){?>
        <div class="alert"><i class="fa fa-exclamation-circle"></i> ตรวจสอบ Username หรือ Password อีกครั้ง</div>
      <?php }?>
      <input type="submit" class="input-submit" value="เข้าระบบ">
    </form>
    
    <p>Hello World.</p>
  </div>
</body>
</html>