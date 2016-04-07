<?php
  include "../config.php";
  include "../nus-php-sdk/include.php";
  $client = new NusClient($apiLink);

  $resultArray = array("status"=>"failed");

  $result = $client->authorizeUser($_POST["username"],$_POST["password"]);
  if($result["status"] == "success"){
    $userInfo = $client->authorizeToken($_POST["username"],$result["data"]["token_body"]);
    if($userInfo["data"]["group"] != "saskatoonhsctf-admin" && $userInfo["data"]["group"] != "saskatoonhsctf-competitor") {
      $resultArray["data"]= "namespace error";
    } else {
      $resultArray["status"]="success";
      $resultArray["data"]= $result["data"];
    }
  }

  echo json_encode($resultArray);
?>
