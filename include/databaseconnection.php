<?php
  class DatabaseConnection{
    public $mysqliObject;
    function __construct($host,$username,$password,$database){
      $this->mysqliObject = new mysqli($host,$username,$password,$database);
      if($this->mysqliObject->errno){
        echo "Failed to connect to database";
        exit;
      }
    }
  }
?>
