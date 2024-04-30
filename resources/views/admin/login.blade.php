<!DOCTYPE html>
<html>

<head>
  <base href="/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">


</head>
<style>
  .logo{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
  }
  .user-image{
    
    width: 100px;

  }
  
</style>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Đăng nhập</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

      <!-- <p class="login-box-msg">Sign in to start your session</p> -->
      <div class="logo">
        <img src="assets/dist/img/logo/logo-small.png" class="user-image" alt="User Image">
      </div>

      <form action="" method="post">
        @csrf

        @if (Session::has('no'));
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('no')}}
        </div>
        @endif
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="TÀI KHOẢN">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @error('email')
          <small class="help-block text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="MẬT KHẨU">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @error('password')
          <small class="help-block text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="row">
          <div class="col-xs-8">
            <!-- <div class="checkbox">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->


</body>

</html>