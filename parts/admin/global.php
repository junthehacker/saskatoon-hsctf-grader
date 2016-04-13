<h1><i class="fa fa-cog"></i> Global Config</h1><br>
<div class="panel panel-default">
  <div class="panel-body">
    Status : <?php echo $contestStatus["status"]; ?> (status.json)<br>
    Begin Time : <?php echo $contestStatus["begin-time"]; ?> (status.json)<br>
    Duration : <?php echo $contestStatus["duration"]; ?> (status.json)<br>
    Username Prefix (NUS) : <code><?php echo $usernamePrefix; ?></code> (config.php)
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-body">
    <label for="contest-duration">Contest Duration (in seconds)</label>
    <input class="form-control" id="contest-duration" placeholder="Duration"><br>
    <button class="btn btn-default" id="start-contest-button">Start Contest</button>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $("#start-contest-button").click(function(){
      $.ajax({
        url:"ajax/begin_contest.php",
        type:"POST",
        data:{
          duration:$("#contest-duration").val()
        },
        success:function(data){
          alert(data);
          if(data == "success"){
            window.location.reload();
          } else {
            alert("Failed to update contest status");
          }
        }
      })
    })
  })
</script>
