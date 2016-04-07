<?php
  //First job here is to find the problem in array
  $problemData = array();
  foreach($problems as $problem){
    if($problem["id"] == $_GET["id"]){
      $problemData = $problem;
      break;
    }
  }
?>
<div class="container">
  <h2><?php echo $problemData["category"]; ?></h2>
  <h3><?php echo $problemData["title"]; ?>&nbsp;&nbsp;<span class="label label-default"><?php echo $problemData["weight"]; ?> Points</span></h3><br>
  <h4>Description</h4>
  <?php echo $problemData["description"]; ?><br>
  <h4>Your Answer</h4>
  <div class="form-group">
    <label for="flag-body-inpu">Flag</label>
    <input type="email" class="form-control" id="flag-body-input" placeholder="Flag body">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
