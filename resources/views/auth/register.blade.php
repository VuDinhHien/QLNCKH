<!DOCTYPE html>
<html>

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng ký</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a><b>Đăng Ký</b></a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Đăng ký cho người dùng mới</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group has-feedback">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Họ và Tên"
                        value="{{ old('name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @error('name')
                        <small style="color:red" class="help-block text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                        value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                        <small style="color:red" class="help-block text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <small style="color:red" class="help-block text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        placeholder="Nhập lại mật khẩu">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @error('password_confirmation')
                        <small style="color:red" class="help-block text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Thêm các trường thông tin nhà khoa học (tuỳ chọn) -->
                <div class="form-group has-feedback">
                    <input type="text" id="profile_id" name="profile_id" class="form-control"
                        placeholder="Mã nhà khoa học" value="{{ old('profile_id') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <!-- Các trường khác nếu cần thiết -->

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">

                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- HOẶC -</p>

                <a href="{{ url('auth/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i
                        class="fa fa-google-plus"></i> Đăng nhập bằng Google</a>
                <a href="{{ route('login') }}" class="btn btn-block btn-social btn-facebook btn-flat"
                    style="text-align: center"> Quay lại đăng nhập</a>

            </div>
        </div>
    </div>

    <script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>
