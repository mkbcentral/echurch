<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{setting('name_app')}}</title>
  <link rel="icon" type="image/png" sizes="96x96" href="{{setting('app_logo_url')==null? asset('image.jpg'):asset('storage/'.setting('app_logo_url')) }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @livewireStyles
  @stack('styles')
</head>
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layouts.partials.navabar')
        @include('layouts.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper py-2 px-2">
            {{$slot}}
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.partials.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/toast.js') }}" defer></script>
    <script src="{{ mix('js/dialog.js') }}" defer></script>
    @livewireScripts
    @stack('js')
</body>
</html>
