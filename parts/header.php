<?php
  include "include/user_status.php";
  date_default_timezone_set('Canada/Saskatchewan');
  //We read all data here
  $title = "Saskatoon HSCTF Online Grader";

  if($userLoggedin){
    if(!$_GET["page"]) {
      $title = "Saskatoon HSCTF Online Grader - Dashboard";
      $bodyPath = "parts/main.php";
    } else if ($_GET["page"] == "problems") {
      $title = "Saskatoon HSCTF Online Grader - Problems";
      $bodyPath = "parts/problems.php";
    } else if ($_GET["page"] == "problemview") {
      $title = "Saskatoon HSCTF Online Grader - [Problem Name Here]";
      $bodyPath = "parts/problemviewer.php";
    } else if ($_GET["page"] == "admin") {
      $title = "Saskatoon HSCTF - Admin";
      $bodyPath = "parts/admin.php";
      if(!$_GET["tab"]){
        $adminBodyPath = "parts/admin/main.php";
      }
    }
  } else {
    $title = "Saskatoon HSCTF Online Grader - Login";
    $bodyPath = "parts/login.php";
  }
?>
<!doctype html>
<html>
  <head>
    <link href="less/main.less" type="text/less" rel="stylesheet" />
    <link href="https://ssl.jackzh.com/file/css/font-awesome-4.4.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href="https://ssl.jackzh.com/file/css/bootstrap/bootstrap-3-3-6/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="https://ssl.jackzh.com/file/css/bootstrap/theme/superhero/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <script src="https://ssl.jackzh.com/file/js/less-js/less.min.js"></script>
    <script src="https://ssl.jackzh.com/file/js/jquery/jquery-2.2.2.min.js"></script>
    <script src="https://ssl.jackzh.com/file/css/bootstrap/bootstrap-3-3-6/js/bootstrap.min.js"></script>
    <script src="js/util.js"></script>
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">@saskatoonhsctf</a>
        </div>
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav">
            <li><a href="?page="><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="?page=problems"><i class="fa fa-question-circle"></i> Problems</a></li>
            <?php if($userInfo["group"] == "saskatoonhsctf-admin"){ ?>
              <li><a href="?page=admin"><i class="fa fa-cog"></i> Admin Panel</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
