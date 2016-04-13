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
        <tr>
          <td>1</td>
          <td>Vulputate Sollicitudin</td>
          <td>10</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Fermentum Adipiscing Tellus</td>
          <td>40</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Magna</td>
          <td>27</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Nullam Fringilla</td>
          <td>20</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Sit Magna</td>
          <td>49</td>
        </tr>
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
