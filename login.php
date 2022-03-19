<!DOCTYPE html>
<html lang="en">
<?php 
// session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
  $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
  foreach($system as $k => $v){
    $_SESSION['system'][$k] = $v;
  }
}
ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:home");
?>
<?php include 'header.php' ?>
<body class="hold-transition login-page login-bg">
<div class="login-box">
  <div class="login-title">
    <a href="#" class="login-title-link text-black">
      <img src="assets/img/work-on-logo.png" class="logo-img" alt="Logo">
      <b class="login-title-name text-black"><?php echo $_SESSION['system']['name'] ?></b>
    </a>
  </div>
  <div class="login-body">
    <div class="card card-primary">
      <div class="card-body login-card-body">      
        <form action="" id="login-form">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" required placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" required placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember" class="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  
</div>
<!-- /.login-box -->
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    // start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
      $.ajax({
        url:'ajax.php?action=login',
        method:'POST',
        data:$(this).serialize(),
        error:err=>{
          console.log(err)
          end_load();

        },
        success:function(resp){
          if(resp == 1){
            location.href ='home';
          }else{
            $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
            end_load();
          }
        }
      })
    })
  })
</script>
<?php include 'footer.php' ?>

</body>
</html>
