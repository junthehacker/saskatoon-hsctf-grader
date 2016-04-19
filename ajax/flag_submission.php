<?php
  include "../include/util.php";
  include "../config.php";
  include "../include/user_status_ajax.php";
  include "../include/databaseconnection.php";
  $dbConnection = new DatabaseConnection($blogDatabaseHost,$blogDatabaseUsername,$blogDatabasePassword,$blogDatabaseName);
  include "../include/contest.php";
  $contestStatus = json_decode(file_get_contents("../status.json"),true);
  if($contestStatus["status"] != "open"){
    echo "flag submission closed";
    exit;
  }

  if($userInfo["group"] != $usernamePrefix . "admin" && $userInfo["group"] != $usernamePrefix . "competitor"){
    exit; //Not loggedin
  } else {
    $problem = getProblem($dbConnection,$_POST["id"]);
    if($problem){
      if(arrayContains($userInfo["problems_solved"],$_POST["id"])){
        echo "problem already solved";
      } else {
        if($_POST["flag"] == $problem["flag"]){
          array_push($users[$userInfo["index"]]["problems_solved"],$_POST["id"]);
          $users[$userInfo["index"]]["points"] += $problem["weight"];
          echo "success";
          file_put_contents("../data/users.json",json_encode($users));
        } else {
          echo "invalid flag";
        }
      }
    } else {
      echo "problem not found";
    }
  }
?>
