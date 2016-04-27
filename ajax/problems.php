<?php
  include "../include/util.php";
  include "../config.php";
  include "../include/user_status_ajax.php";
  include "../include/databaseconnection.php";
  $dbConnection = new DatabaseConnection($blogDatabaseHost,$blogDatabaseUsername,$blogDatabasePassword,$blogDatabaseName);
  include "../include/contest.php";
  $contestStatus = json_decode(file_get_contents("../status.json"),true);

  if($userInfo["group"] != $usernamePrefix . "admin" && $userInfo["group"] != $usernamePrefix . "competitor"){
    exit; //Not loggedin
  } else {
    if($_GET["id"] != 40){
      echo "problem not found";
      exit;
    } else {
      $problem = getProblem($dbConnection,$_GET["id"]);
      if($problem){
        $problem["flag"] = md5($problem["flag"]);
        echo json_encode($problem);
      } else {
        echo "problem not found";
      }
    }
  }
?>
