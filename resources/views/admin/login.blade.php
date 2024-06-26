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
    .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .user-image {

        width: 100px;

    }

    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        min-width: 350px;
        max-width: 400px;
        padding: 10px;
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


                @if (Session::has('no'))
                    <div class="alert alert-success notification" id="error-alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('no') }}
                    </div>
                @endif
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="TÀI KHOẢN">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                        <small style="color:red" class="help-block text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="MẬT KHẨU">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <small style="color:red" class="help-block text-danger">{{ $message }}</small>
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


                </div>
            </form>

           

            

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{ url('auth/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập bằng google</a>
                <a href="{{ route('register') }}" class="btn btn-block btn-social btn-facebook btn-flat" style="text-align: center"> Đăng ký</a>
               
              </div>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->


</body>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#danger-alert").fadeOut("slow");
        }, 1000);

        setTimeout(function() {
            $("#error-alert").fadeOut("slow");
        }, 1000);
    });
</script>

</html>
