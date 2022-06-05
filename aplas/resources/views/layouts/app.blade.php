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
    <link rel="stylesheet" href="lib/codemirror.css">
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel=stylesheet href="lib/codemirror.css">
    <link rel=stylesheet href="doc/docs.css">
    <script src="lib/codemirror.js"></script>
    <script src="mode/xml/xml.js"></script>
    <script src="mode/javascript/javascript.js"></script>
    <script src="mode/css/css.js"></script>
    <script src="mode/htmlmixed/htmlmixed.js"></script>
    <script src="addon/edit/matchbrackets.js"></script>

    <script src="doc/activebookmark.js"></script>

    <style>
        .CodeMirror {
            height: auto;
            border: 1px solid #ddd;
        }

        .CodeMirror-scroll {
            max-height: 200px;
        }

        .CodeMirror pre {
            padding-left: 7px;
            line-height: 1.25;
        }

        .banner {
            background: #ffc;
            padding: 6px;
            border-bottom: 2px solid silver;
            text-align: center
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @yield('content')


        <!-- Content Wrapper. Contains page content -->

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->

        <!-- Main Footer -->


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
