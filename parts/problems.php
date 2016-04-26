<div class="container">
  <h1 class="problems-h1"><i class="fa fa-question-circle"></i> Problems</h1><br>
  <div class="problems-overview">
    <div class="label label-default" role="alert">
      <?php
        if(empty($userInfo["problems_solved"])){
          echo 0;
        } else {
          echo max(array_keys($userInfo["problems_solved"])) + 1;
        }
      ?> Problems Solved
    </div>
    <div class="label label-default" role="alert">
      <?php
        if(empty($problems)){
          echo 0;
        } else {
          if(empty($userInfo["problems_solved"])){
            echo max(array_keys($problems)) + 1;
          } else {
            echo max(array_keys($problems)) - max(array_keys($userInfo["problems_solved"]));
          }
        }
      ?> Remaining
    </div>
    <div class="label label-default" role="alert"><?php echo $userInfo["points"]; ?> Points Captured</div>
  </div>
  <table class="table table-hover problems-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Status</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($problems) || ($contestStatus["status"] == "closed" && $userInfo["group"] == $usernamePrefix . "competitor")){ ?>
        <tr>
          <td colspan="3">No problems found...</td>
        </tr>
      <?php } else { ?>
        <?php foreach ($problems as $problem){ ?>
          <tr>
            <td><a href="?page=problemview&id=<?php echo $problem["id"]; ?>"><?php echo $problem["category"] . " " . $problem["title"]; ?></a></td>
            <td>
              <?php if(arrayContains($userInfo["problems_solved"],$problem["id"])){ ?>
                <span class="label label-success">Solved</span></td>
              <?php } else { ?>
                <span class="label label-warning">Unsolved</span></td>
              <?php } ?>
            <td><?php echo $problem["weight"]; ?></td>
          </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
