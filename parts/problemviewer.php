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
  <button type="submit" onclick="submitFlag();" class="btn btn-default">Submit</button>
<script type="text/javascript">
  function submitFlag(){
    $.ajax({
      url:"ajax/flag_submission.php",
      data:{
        id:<?php echo $problem["id"]; ?>,
        flag:$("#flag-body-input").val()
      },
      type:"POST",
      success:function(data){
        if(data == "success"){
          alert("Flag submission successful\nYou have solved the problem");
          window.location = "?page=problems";
        } else {
          alert(data);
        }
      }
    })
  }
</script>
