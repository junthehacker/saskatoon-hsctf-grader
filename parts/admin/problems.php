<h1><i class="fa fa-th"></i> Problems</h1><br>
<div class="panel panel-default">
  <div class="panel-body">
    <a href="?page=admin&tab=newproblem"><button class="btn btn-default">Create a New Problem</button></a>
  </div>
</div>
<div class="problems-overview">
  <div class="label label-default" role="alert">0 Problems</div>
</div>
<table class="table table-hover problems-table">
  <thead>
    <tr>
      <th>#id</th>
      <th>Category</th>
      <th>Name</th>
      <th>Weight</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($problems)){ ?>
      <tr>
        <td colspan="5">No problems found...</td>
      </tr>
    <?php } else { ?>
      <?php foreach ($problems as $problem){ ?>
        <tr>
          <td><?php echo $problem["id"]; ?></td>
          <td><?php echo $problem["category"]; ?></td>
          <td><a href="?page=problemview&id=<?php echo $problem["id"]; ?>"><?php echo $problem["title"]; ?></a></td>
          <td><?php echo $problem["weight"]; ?></td>
          <td>Delete / <a href="?page=admin&tab=editproblem&id=<?php echo $problem["id"]; ?>">Edit</a></td>
        </tr>
      <?php } ?>
    <?php } ?>
  </tbody>
</table>
