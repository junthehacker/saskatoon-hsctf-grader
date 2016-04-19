<?php
  include_once "config.php";
  include_once "nus-php-sdk/include.php";
  $client = new NusClient($apiLink);

  $userLoggedin = false;
  $userInfo = false;

  $result = $client->authorizeToken($_COOKIE["skhsctf-un"],$_COOKIE["skhsctf-tk"]);
  if($result["status"] == "success"){
    if($result["data"]["group"] == $usernamePrefix . "admin" || $result["data"]["group"] == $usernamePrefix . "competitor"){ //Only login if user is under sasktoonhsctf namespace
      $userLoggedin = true;
      $userInfo = $result["data"];
      //Read or initialize user information
      $users = json_decode(file_get_contents("data/users.json"),true);
      $userFound = false;
      $index = 0;
      foreach($users as $user){
        if($user["username"] == $userInfo["username"]){
          $userFound = true;
          $userInfo["problems_solved"] = $user["problems_solved"];
          $userInfo["points"] = $user["points"];
          $userInfo["index"] = $index;
        }
        $index++;
      }
      $index++;
      if(!$userFound){
        //Initialize user information
        array_push($users,array(
          "username"=>$userInfo["username"],
          "problems_solved"=>array(),
          "points"=>0
        ));
        $userInfo["problems_solved"] = array();
        $userInfo["points"] = 0;
        file_put_contents("data/users.json",json_encode($users));
        $userInfo["index"] = $index;
      }
    }
  }
?>
