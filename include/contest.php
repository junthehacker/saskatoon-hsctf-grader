<?php
  function getAllProblems($dbConnection){
    $stmt = $dbConnection->mysqliObject->prepare("SELECT * FROM saskatoonhsctf_problems");
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($resultId,$resultTitle,$resultCategory,$resultDescription,$resultWeight,$resultFlag);
    $result = array();
    while($stmt->fetch()){
      array_push($result,array(
        "id"=>$resultId,
        "title"=>$resultTitle,
        "category"=>$resultCategory,
        "description"=>$resultDescription,
        "weight"=>$resultWeight,
        "flag"=>$resultFlag
      ));
    }
    return $result;
  }

  function createProblem($dbConnection,$title,$category,$description,$weight,$flag){
    $stmt = $dbConnection->mysqliObject->prepare("INSERT INTO saskatoonhsctf_problems (title,category,description,weight,flag) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssis",$title,$category,$description,$weight,$flag);
    $stmt->execute();
    if($stmt->affected_rows != 0){
      return true;
    } else {
      return false;
    }
  }

  function updateProblem($dbConnection,$title,$category,$description,$weight,$flag,$id){
    $stmt = $dbConnection->mysqliObject->prepare("UPDATE saskatoonhsctf_problems SET title=?, category=?, description=?, weight=?, flag=? WHERE id=?");
    $stmt->bind_param("sssisi",$title,$category,$description,$weight,$flag,$id);
    $stmt->execute();
    if($stmt->affected_rows != 0){
      return true;
    } else {
      return false;
    }
  }
?>
