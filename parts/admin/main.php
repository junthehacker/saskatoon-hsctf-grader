<h1><i class="fa fa-th"></i> Contest Overview &amp; Statistics</h1>
<br>
<div class="label label-default huge label-inline-block">
  <?php if($contestStatus["status"] == "closed"){ ?>
    Contest Closed
  <?php } else { ?>
    <span id="time-remaining-label"></span> Left
  <?php } ?>
</div>
<br><br>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Teams</h3>
  </div>
  <div class="panel-body">
    <table class="table">
      <thead>
        <tr>
          <th>#id</th>
          <th>Team Name</th>
          <th>Team Score</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0; foreach($users as $user) { ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $user["username"]; ?></td>
          <td><?php echo $user["points"]; ?></td>
        </tr>
        <?php $i++; } ?>
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
  <?php if($contestStatus["status"] == "open"){ ?>
    var secondsLeft = <?php echo $contestStatus["duration"] - time() + $contestStatus["begin-time"]; ?>;
    $("#time-remaining-label").html(secondsLeft.toString().toHHMMSS());
    setInterval(function(){
      secondsLeft -= 1;
      $("#time-remaining-label").html(secondsLeft.toString().toHHMMSS());
    },1000);
  <?php } ?>
</script>
