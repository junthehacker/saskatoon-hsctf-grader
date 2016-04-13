<?php
  include "../config.php";
  include "../include/user_status_ajax.php";
  include "../include/databaseconnection.php";
  include "../include/contest.php";

  if($userInfo["group"] != "saskatoonhsctf-admin"){
    exit;
  } else {
    $contestStatus = json_decode(file_get_contents("../status.json"),true);
    $contestStatus["status"] = "open";
    $contestStatus["begin-time"] = time();
    $contestStatus["duration"] = $_POST["duration"];
    if(file_put_contents("../status.json",json_encode($contestStatus))){
      echo "success";
    } else {
      echo "failed";
    }
  }
?>
