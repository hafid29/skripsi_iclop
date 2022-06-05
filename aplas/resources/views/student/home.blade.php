<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>APLAS - Administrator Site</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- yield for script -->
  @yield('script')

  <link rel=stylesheet href="lib/codemirror.css">
<link rel=stylesheet href="doc/docs.css">
<script src="lib/codemirror.js"></script>
<script src="mode/xml/xml.js"></script>
<script src="mode/javascript/javascript.js"></script>
<script src="mode/css/css.js"></script>
<script src="mode/htmlmixed/htmlmixed.js"></script>
<script src="addon/edit/matchbrackets.js"></script>
<script src="resources/js/code-mirror.js"></script>
<script src="doc/activebookmark.js"></script>

<style>
  .CodeMirror { height: auto; border: 1px solid #ddd; }
  .CodeMirror-scroll { max-height: 200px; }
  .CodeMirror pre { padding-left: 7px; line-height: 1.25; }
  .banner { background: #ffc; padding: 6px; border-bottom: 2px solid silver; text-align: center }
</style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
	@include('student/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('student/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
    @if (isset($status))
    @if ($status!='active')
    <div class="content">
        <center>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h1>Sorry, you can not use this features yet!!</h1>
            <h2>Your account need to be validated by the teacher, please kindly wait to be validated.</h2>
            <p>&nbsp;</p>
            <img src="{{asset('lte/dist/img/logo-aplas.png')}}" alt="APLAS logo" class="brand-image elevation-3"
                 style="opacity: .8">
        </center>
    </div>
    @endif
    @endif
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('student/footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>