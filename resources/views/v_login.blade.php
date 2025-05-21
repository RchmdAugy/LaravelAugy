<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Siakad - login</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background: linear-gradient(120deg, #e0e7ff 0%, #f8fafc 100%); min-height: 100vh;">
<div class="login-box">
  <div class="login-logo">
    <a href="/" style="font-size:2rem; letter-spacing:2px; color:#3b82f6;"><b>Siakad</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card shadow-lg border-0 rounded-lg">
    <div class="card-body login-card-body" style="border-radius: 1rem;">
      <p class="login-box-msg" style="font-size:1.1rem; color:#6366f1; font-weight:600;">Sign in to start your session</p>
      <form action="{{ route('login') }}" method="POST">
      @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required style="background:#f1f5f9; border-radius: 0.5rem 0 0 0.5rem;">
          <div class="input-group-append">
            <div class="input-group-text" style="background:#f1f5f9; border-radius: 0 0.5rem 0.5rem 0;">
              <span class="fas fa-envelope text-primary"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required style="background:#f1f5f9; border-radius: 0.5rem 0 0 0.5rem;">
          <div class="input-group-append">
            <div class="input-group-text" style="background:#f1f5f9; border-radius: 0 0.5rem 0.5rem 0;">
              <span class="fas fa-lock text-primary"></span>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember" style="font-size:0.95rem;">Remember Me</label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" style="border-radius:0.5rem; font-weight:600; background: linear-gradient(90deg, #6366f1 60%, #3b82f6 100%); border:none;">Sign In</button>
          </div>
        </div>
      </form>
      <br>
      <p class="mb-1">
        <a href="forgot-password.html" style="color:#6366f1;">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="/register" class="text-center" style="color:#3b82f6; font-weight:600;">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE-3.2.0')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE-3.2.0')}}/dist/js/demo.js"></script>
<!-- Page specific script -->

<!-- jQuery -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE-3.2.0')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE-3.2.0')}}/dist/js/demo.js"></script>



</body>
</html>
