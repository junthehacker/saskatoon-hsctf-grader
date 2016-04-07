<?php
  include "../config.php";
  include "../include/user_status_ajax.php";
  include "../include/databaseconnection.php";
  $dbConnection = new DatabaseConnection($blogDatabaseHost,$blogDatabaseUsername,$blogDatabasePassword,$blogDatabaseName);
  include "../include/contest.php";

  if($userInfo["group"] != "saskatoonhsctf-admin"){
    exit;
  } else {
    $result = createProblem($dbConnection,$_POST["title"],$_POST["category"],$_POST["description"],$_POST["weight"],$_POST["flag"]);
    if($result){
      echo "success";
    } else {
      echo "failed";
    }
  }
?>
