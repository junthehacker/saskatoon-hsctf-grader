<div class="container">
  <h1><i class="fa fa-tachometer"></i> Dashboard</h1>
  <br><br>
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
              <div class="huge">0</div>
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
              <div class="huge">0</div>
              <div>Total Score</div>
            </div>
          </div>
        </div>
        <div class="panel-footer">Go to Problems List</div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-clock-o fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">40:35</div>
              <div>Time Remaining</div>
            </div>
          </div>
        </div>
        <div class="panel-footer">Go to Problems List</div>
      </div>
    </div>
  </div>
  <h2>Activity Feed</h2><br>
  <div class="panel panel-default">
    <div class="panel-body">
      Activity feed here....
    </div>
  </div>
