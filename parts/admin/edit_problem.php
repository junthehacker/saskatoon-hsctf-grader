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
<h1><i class="fa fa-th"></i> Edit Problem</h1><br>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="form-group">
      <label for="problem-title-textbox">Problem Title</label>
      <input type="text" class="form-control" id="problem-title-textbox" value="<?php echo $problemData["title"]; ?>" placeholder="Cras Ullamcorper">
    </div>
    <div class="form-group">
      <label for="problem-category-select">Problem Category</label>
      <select id="problem-category-select" class="form-control" value="<?php echo $problemData["category"]; ?>">
        <option value="Web Exploit">Web Exploit</option>
        <option value="Reverse Engineering">Reverse Engineering</option>
        <option value="Forensics/Recon">Forensics/Recon</option>
        <option value="Cryptography">Cryptography</option>
      </select>
    </div>
    <div class="form-group">
      <label for="problem-description-textbox">Problem Description</label>
      <textarea id="problem-description-textbox" class="form-control" rows="15"><?php echo $problemData["description"]; ?></textarea>
    </div>
    <div class="form-group">
      <label for="problem-title-textbox">Weight</label>
      <input type="text" class="form-control" id="problem-weight-textbox" value="<?php echo $problemData["weight"]; ?>" placeholder="5">
    </div>
    <div class="form-group">
      <label for="problem-flag-textbox">Flag</label>
      <input type="text" class="form-control" id="problem-flag-textbox" value="<?php echo $problemData["flag"]; ?>" placeholder="saskatoonhsctf{something}">
    </div>
    <button class="btn btn-primary" id="create-button">Update</button>
  </div>
</div>
<script type="text/javascript">
  $("#create-button").click(function(){
    $.ajax({
      url:"ajax/update_problem.php",
      type:"POST",
      data:{
        title:$("#problem-title-textbox").val(),
        category:$("#problem-category-select").val(),
        description:$("#problem-description-textbox").val(),
        weight:$("#problem-weight-textbox").val(),
        flag:$("#problem-flag-textbox").val(),
        id:<?php echo $_GET["id"]; ?>
      },
      success:function(data){
        alert(data);
      }
    })
  })
</script>
