<?php
  function arrayContains($arr,$val){
    foreach($arr as $ele){
      if($ele == $val){
        return true;
      }
    }
    return false;
  }
?>
