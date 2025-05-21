<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Siakad - register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page" style="background: linear-gradient(120deg, #e0e7ff 0%, #f8fafc 100%); min-height: 100vh;">
<div class="register-box">
  <div class="register-logo">
    <a href="/" style="font-size:2rem; letter-spacing:2px; color:#3b82f6;"><b>Siakad</b></a>
  </div>
  <div class="card shadow-lg border-0 rounded-lg">
    <div class="card-body register-card-body" style="border-radius: 1rem;">
      <p class="login-box-msg" style="font-size:1.1rem; color:#6366f1; font-weight:600;">Register a new membership</p>
      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" style="background:#f1f5f9; border-radius: 0.5rem 0 0 0.5rem;">
          <div class="input-group-append">
            <div class="input-group-text" style="background:#f1f5f9; border-radius: 0 0.5rem 0.5rem 0;">
              <span class="fas fa-user text-primary"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" style="background:#f1f5f9; border-radius: 0.5rem 0 0 0.5rem;">
          <div class="input-group-append">
            <div class="input-group-text" style="background:#f1f5f9; border-radius: 0 0.5rem 0.5rem 0;">
              <span class="fas fa-envelope text-primary"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" style="background:#f1f5f9; border-radius: 0.5rem 0 0 0.5rem;">
          <div class="input-group-append">
            <div class="input-group-text" style="background:#f1f5f9; border-radius: 0 0.5rem 0.5rem 0;">
              <span class="fas fa-lock text-primary"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" style="background:#f1f5f9; border-radius: 0.5rem 0 0 0.5rem;">
          <div class="input-group-append">
            <div class="input-group-text" style="background:#f1f5f9; border-radius: 0 0.5rem 0.5rem 0;">
              <span class="fas fa-lock text-primary"></span>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms" style="font-size:0.95rem;">I agree to the <a href="#" style="color:#6366f1;">terms</a></label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" style="border-radius:0.5rem; font-weight:600; background: linear-gradient(90deg, #6366f1 60%, #3b82f6 100%); border:none;">Register</button>
          </div>
        </div>
      </form>
      <div class="social-auth-links text-center mt-3">
        <p style="color:#64748b;">- OR -</p>
        <a href="#" class="btn btn-block btn-primary" style="border-radius:0.5rem; background: linear-gradient(90deg, #6366f1 60%, #3b82f6 100%); border:none;">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger" style="border-radius:0.5rem;">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>
      <a href="/" class="text-center d-block mt-3" style="color:#3b82f6; font-weight:600;">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE-3.2.0')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE-3.2.0')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-3.2.0')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
