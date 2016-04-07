<div class="container">
  <h1>You have to authenticate before accessing the system</h1><br>
  <div class="alert alert-info" role="alert">
    <b>Before you begin, please read the following important messages</b><br>
    - This competition is legal, you will not commit a crime by doing this competition. You are allowed to hack!<br>
    - <b>However, hacking the online grader is NOT legal. You are commiting an offense by doing so, and we reserve all the rights to take legal actions against you.</b><br>
    - You are allowed to access the internet, and you are allowed to bring anything you might have on your own computer.<br>
    - However, you are <b>NOT</b> allowed to post questions to websites and gain help.<br>
    - Feel free to use the grader even after the competition ends.
    <br><br>
    <b>Good luck and have fun!</b>
  </div>

  <div class="alert alert-danger" id="incorrect-username-password" style="display:none;" role="alert">
    Incorrect username or password
  </div>

  <div class="alert alert-danger" id="incorrect-namespace" style="display:none;"  role="alert">
    Login successful for NUS, however, namespace is not correct, please login using another username
  </div>

  <div class="alert alert-success" id="login-successful" style="display:none;"  role="alert">
    Login successful, this page will be redirected in 2 seconds
  </div>

  <div class="form-group">
    <label for="username-textbox">Username</label>
    <input type="text" class="form-control" id="username-textbox" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password-textbox">Password</label>
    <input type="password" class="form-control" id="password-textbox" placeholder="Password">
  </div>
  <button type="button" class="btn btn-default" id="login-button">Login</button>
</div>
<script type="text/javascript">
  $("#login-button").click(function(){
    $.ajax({
      url:"ajax/login.php",
      type:"POST",
      data:{
        username:$("#username-textbox").val(),
        password:$("#password-textbox").val()
      },
      dataType:"json",
      success:function(data){
        if(data["status"] == "failed"){
          if(data["data"] == "namespace error"){
            $("#incorrect-namespace").slideDown();
            $("#incorrect-username-password").slideUp();
          } else {
            $("#incorrect-username-password").slideDown();
            $("#incorrect-namespace").slideUp();
          }
        } else {
          $("#login-successful").slideDown();
          $("#incorrect-namespace").slideUp();
          $("#incorrect-username-password").slideUp();
          setCookie("skhsctf-un",$("#username-textbox").val(),1);
          setCookie("skhsctf-tk",data["data"]["token_body"],1);
          setTimeout(function(){
            window.location = "?page=";
          },2000);
        }
      }
    })
  })
</script>
