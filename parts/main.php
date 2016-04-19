<div class="container">
  <h2>Welcome to Saskatoon HSCTF Contest System</h2>
  <h1><i class="fa fa-tachometer"></i> Dashboard</h1>
  <br><br>
  <?php if ($contestStatus["status"] == "closed") { ?>
    <div class="alert alert-danger" role="alert">Contest is closed. You are not allowed to submit new flags.</div>
  <?php } ?>
  <?php if ($contestStatus["status"] == "open" && $contestStatus["duration"] - time() + $contestStatus["begin-time"] <= 0) { ?>
    <div class="alert alert-danger" role="alert">Time up!, you are not allowed to submit any new flags. Thanks for your participation!</div>
  <?php } ?>
  <h2>Overview for <?php echo explode("-",$userInfo["username"])[1]; ?></h2><br>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-flag fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">
                <?php
                  if(empty($userInfo["problems_solved"])){
                    echo 0;
                  } else {
                    echo max(array_keys($userInfo["problems_solved"])) + 1;
                  }
                ?>
              </div>
              <div>Problems Solved</div>
            </div>
          </div>
        </div>
        <div class="panel-footer">Go to Problems List</div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-star fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge"><?php echo $userInfo["points"]; ?></div>
              <div>Total Score</div>
            </div>
          </div>
        </div>
        <div class="panel-footer">Go to Problems List</div>
      </div>
    </div>
    <?php if ($contestStatus["status"] == "closed") { ?>
      <div class="col-md-6 col-lg-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-clock-o fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">CLOSED</div>
                <div>Contest Closed</div>
              </div>
            </div>
          </div>
          <div class="panel-footer">&nbsp;</div>
        </div>
      </div>
    <?php } else if ($contestStatus["duration"] - time() + $contestStatus["begin-time"] >= 0) { ?>
      <div class="col-md-6 col-lg-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-clock-o fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge" id="time-remaining-label">40:35</div>
                <div>Time Remaining</div>
              </div>
            </div>
          </div>
          <div class="panel-footer">Go to Problems List</div>
        </div>
      </div>
    <?php } else { ?>
      <div class="col-md-6 col-lg-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-clock-o fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge" id="time-remaining-label">00:00:00</div>
                <div>Time Up!</div>
              </div>
            </div>
          </div>
          <div class="panel-footer">&nbsp;</div>
        </div>
      </div>
    <?php } ?>
  </div>
  <h2>Activity Feed</h2><br>
  <div class="panel panel-default">
    <div class="panel-body">
      Activity feed here....
    </div>
  </div>
  <script type="text/javascript">
    <?php if($contestStatus["status"] == "open" && ($contestStatus["duration"] - time() + $contestStatus["begin-time"]) >= 0){ ?>
      var secondsLeft = <?php echo $contestStatus["duration"] - time() + $contestStatus["begin-time"]; ?>;
      $("#time-remaining-label").html(secondsLeft.toString().toHHMMSS());
      setInterval(function(){
        secondsLeft -= 1;
        $("#time-remaining-label").html(secondsLeft.toString().toHHMMSS());
        if(secondsLeft <= 0){
          window.location.reload();
        }
      },1000);
    <?php } ?>
  </script>
