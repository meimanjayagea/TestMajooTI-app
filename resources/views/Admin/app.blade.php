<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('storage/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('storage/assets/dist/css/adminlte.min.css')}}">

 <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('storage/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('storage/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('storage/assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('storage/assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('storage/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('storage/assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('storage/assets/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrab 4.6-->
  <link rel="stylesheet" href="{{asset('storage/assets/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('storage/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('storage/assets/css/bootstrap-grid.css')}}">
  <link rel="stylesheet" href="{{asset('storage/assets/css/bootstrap-grid.min.css')}}">
  <link rel="stylesheet" href="{{asset('storage/assets/css/bootstrap-reboot.css')}}">
  <link rel="stylesheet" href="{{asset('storage/assets/css/bootstrap-reboot.min.css')}}">
</head>

<body>
  <!--Content-->
  @include('template.navbar');
  @include('template.sidebar');
  @yield('content');

  <!--Content-->


  <!-- jQuery -->
  <script src="{{asset('storage/assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('storage/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('storage/assets/dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('storage/assets/dist/js/demo.js')}}"></script>

  <script>
    $(document).ready(function() {
      $(document).on('change', '#foto_profile', function() {
        let ft = $('#foto_profile').val()
        $('.custom-file-label').text(foto_profile)
      })
    });
  </script>

  <!-- JS Bootstrap 4.6 -->
  <script src="{{asset('storage/assets/js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('storage/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('storage/assets/js/bootstrap.js')}}"></script>
  <script src="{{asset('storage/assets/js/bootstrap.min.js.map')}}"></script>

  <!-- OPTIONAL SCRIPTS -->
<script src="{{asset('storage/assets/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('storage/assets/dist/js/demo.js')}}"></script>
<script src="{{asset('storage/assets/dist/js/pages/dashboard3.js')}}"></script>

 <!-- daterangepicker -->
<script src="{{asset('storage/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('storage/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('storage/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('storage/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('storage/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

@stack('scrips')

</body>

</html>