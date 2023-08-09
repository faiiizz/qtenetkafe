<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Qte-net Cafe | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./adminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="{{asset('AdminLTE')}}/dist/img/gambarqte.jpeg" class="brand-image img-circle elevation-2" width="60px" height="60px">
      <a href="/login" class="h2 p-1"><b>  Qte-net</b> Kafe</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login aja dulu</p>
      <form action="/loginProses" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{old('email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="nav-icon fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password"  value="{{old('password')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="nav-icon fas fa-lock"></span>
            </div>
          </div>
          @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="/menufe" class="btn btn-block btn-danger">
          <i class="nav-icon fas fa-solid fa-chevron-down mr-2"></i> Back to Menu
        </a>
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./adminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
