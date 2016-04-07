<h1><i class="fa fa-th"></i> New Problem</h1><br>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="form-group">
      <label for="problem-title-textbox">Problem Title</label>
      <input type="text" class="form-control" id="problem-title-textbox" placeholder="Cras Ullamcorper">
    </div>
    <div class="form-group">
      <label for="problem-category-select">Problem Category</label>
      <select id="problem-category-select" class="form-control">
        <option value="Web Exploit">Web Exploit</option>
        <option value="Reverse Engineering">Reverse Engineering</option>
        <option value="Forensics/Recon">Forensics/Recon</option>
        <option value="Cryptography">Cryptography</option>
      </select>
    </div>
    <div class="form-group">
      <label for="problem-description-textbox">Problem Description</label>
      <textarea id="problem-description-textbox" class="form-control" rows="15"></textarea>
    </div>
    <div class="form-group">
      <label for="problem-title-textbox">Weight</label>
      <input type="text" class="form-control" id="problem-weight-textbox" placeholder="5">
    </div>
    <div class="form-group">
      <label for="problem-flag-textbox">Flag</label>
      <input type="text" class="form-control" id="problem-flag-textbox" placeholder="saskatoonhsctf{something}">
    </div>
    <button class="btn btn-primary" id="create-button">Create</button>
  </div>
</div>
<script type="text/javascript">
  $("#create-button").click(function(){
    $.ajax({
      url:"ajax/create_problem.php",
      type:"POST",
      data:{
        title:$("#problem-title-textbox").val(),
        category:$("#problem-category-select").val(),
        description:$("#problem-description-textbox").val(),
        weight:$("#problem-weight-textbox").val(),
        flag:$("#problem-flag-textbox").val()
      },
      success:function(data){
        alert(data);
      }
    })
  })
</script>
