<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->

    <title></title>
</head>
<body class="skin-blue sidebar-mini">


<div id="app">
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')

    <script src="{{asset('/plugins/select2/select2.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/plugins/select2/select2.css')}}">
    <script src="{{asset('/plugins/select2/i18n/es.js')}}"></script>

    <script>
    $(document).ready(function() {
      $("#s1").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s2").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s3").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s4").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s5").select2();
    });
    </script>

    <script>
    $(document).ready(function() {
      $("#s6").select2();
    });
    </script>

    <link rel="stylesheet" href="{{asset('/plugins/datepicker/datepicker3.css')}}">
    <script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js')}}"></script>
    <script>
        $(document).ready(function() {
          //Date picker
          $('#dateEntrance').datepicker({
            autoclose: true,
            language: "es",
            format: 'yyyy-mm-dd'
          });
          $('#lastUpdate').datepicker({
            autoclose: true,
            language: "es",
            format: 'yyyy-mm-dd'
          });
          $('#from').datepicker({
            autoclose: true,
            language: "es",
            format: 'yyyy/mm/dd'
          });
          $('#to').datepicker({
            autoclose: true,
            language: "es",
            format: 'yyyy/mm/dd'
          });
      });
  </script>

@show

</body>
</html>
