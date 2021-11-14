<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CV GARSA SEJAHTERA</title>

  <!-- Google Font: Source Sans Pro -->
  @include('includes.styles')
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <!-- Main content -->
      @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@include('includes.scripts')
@stack('addon-script')
</body>
</html>
