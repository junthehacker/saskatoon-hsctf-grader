<div class="container">
  <h1 class="problems-h1"><i class="fa fa-question-circle"></i> Problems</h1><br>
  <div class="problems-overview">
    <div class="label label-default" role="alert">0 Problems Solved</div>
    <div class="label label-default" role="alert">0 Remaining</div>
    <div class="label label-default" role="alert">0 Points Captured</div>
  </div>
  <table class="table table-hover problems-table">
    <thead>
      <tr>
        <th>#id</th>
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
            <td><?php echo $problem["id"]; ?></td>
            <td><a href="?page=problemview&id=<?php echo $problem["id"]; ?>"><?php echo $problem["category"] . " " . $problem["title"]; ?></a></td>
            <td><span class="label label-warning">Unsolved</span></td>
            <td><?php echo $problem["weight"]; ?></td>
          </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
