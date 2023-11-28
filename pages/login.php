<?php 
  require_once(__DIR__ . '/helpers/login_helper.php')
?>

<div class="container" id="login-page">
  <h1 class="mb-4 pb-2">Login or Register</h1>
  <div class="row">
    <div class="col-md-3">
      <form id="login-form" method="post" action="">
        <div class="form-group">
          <label for="login_email">Email address</label>
          <input type="email" class="form-control" id="login_email" name="email">
        </div>
        <div class="form-group">
          <label for="login_password">Password</label>
          <input type="password" class="form-control" id="login_password" name="password">
        </div>
        <button type="submit" name="login" value="1" class="btn btn-login">Login</button>
      </form>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-3">
      <form id="registration-form" method="post" action="">
        <div class="form-group">
          <label for="reg_email">Email address</label>
          <input type="email" class="form-control" id="reg_email" name="email">
        </div>
        <div class="form-group">
          <label for="reg_username">Username</label>
          <input type="text" class="form-control" id="reg_username" name="username">
        </div>
        <div class="form-group">
          <label for="reg_password">Password</label>
          <input type="password" class="form-control" id="reg_password" name="password">
        </div>
        <div class="form-group">
          <label for="reg_password_confirm">Confirm Password</label>
          <input type="password" class="form-control" id="reg_password_confirm"
          name="password_confirm">
        </div>
        <button type="submit" name="reg" value="1" class="btn btn-reg">Register</button>            
      </form>
    </div>
  </div>
</div>