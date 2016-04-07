<?php
  include_once "../config.php";
  include_once "../nus-php-sdk/include.php";
  $client = new NusClient($apiLink);

  $userLoggedin = false;
  $userInfo = false;

  $result = $client->authorizeToken($_COOKIE["skhsctf-un"],$_COOKIE["skhsctf-tk"]);
  if($result["status"] == "success"){
    if($result["data"]["group"] == "saskatoonhsctf-admin" || $result["data"]["group"] == "saskatoonhsctf-competitor"){ //Only login if user is under sasktoonhsctf namespace
      $userLoggedin = true;
      $userInfo = $result["data"];
    }
  }
?>
