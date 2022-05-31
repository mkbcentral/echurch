<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="{{setting('app_logo_url')==null? asset('image.jpg'):asset('storage/'.setting('app_logo_url')) }}" id="logoImage"
            alt="Logo" class="profile-user-img img-circle" width="50px" style="opacity: .8">
    </div>
    @yield('content')
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script type="" src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
