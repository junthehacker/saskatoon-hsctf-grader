<?php
  class NusClient {
    public $apiAddress;
    function __construct($apiLink){
      $this->apiAddress = $apiLink;
    }

    function curlGet($path,$header){
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL,$this->apiAddress . $path);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
      $out = curl_exec($ch);
      curl_close($ch);
      return $out;
    }

    function curlPost($path,$header,$body){
      $ch = curl_init();
      foreach($body as $key=>$value) { $fieldsString .= urlencode($key).'='.urlencode($value).'&'; }
      rtrim($fieldsString, '&');
      curl_setopt($ch,CURLOPT_URL, $this->apiAddress . $path);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
      curl_setopt($ch,CURLOPT_POST, count($body));
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fieldsString);

      $out = curl_exec($ch);
      curl_close($ch);
      return $out;
    }

    function authorizeToken($username,$token){
      $result = $this->curlGet("/users/" . $username . "/tokens",array("TokenBody: $token"));
      $result = json_decode($result,true);
      return $result;
    }

    function authorizeUser($username,$password){
      $result = $this->curlPost("/users/" . $username . "/tokens",array(),array("password"=>$password));
      $result = json_decode($result,true);
      return $result;
    }

    function getAllUsers($username,$token){
      $result = $this->curlGet("/users",array("TokenUsername: $username","TokenBody: $token"));
      $result = json_decode($result,true);
      return $result;
    }

    function getAllTokens($username,$token){
      $result = $this->curlGet("/tokens",array("TokenUsername: $username","TokenBody: $token"));
      $result = json_decode($result,true);
      return $result;
    }

    function createUser($username,$password,$email,$group,$tokenUsername,$token){
      $result = $this->curlPost("/users",array("TokenUsername: $tokenUsername","TokenBody: $token"),array("username"=>$username,"password"=>$password,"email"=>$email,"group"=>$group));
      $result = json_decode($result,true);
      return $result;
    }
  }
?>
