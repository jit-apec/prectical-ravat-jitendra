<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> test</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dist/img/favicon.ico')}}">
    @include('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.0.0/css/font-awesome.css" integrity="sha512-tDTC2Fysq0JMAc//BBwfmSC2pSFlkMVSC5oX4OvBrEr7R0k9t6QGMVeD2cjQQNyhyWrKtamVtWPMJKezLkRKSA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .error {
      color: red;
   }
</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        <!-- /.navbar -->
        @include('admin.header')
        @include('admin.sidebar')

        @yield('content')

        @include('admin.footer')

    </div>
    <!-- ./wrapper -->

    @include('admin.jquery')
    @yield('scripts')
</body>

</html>
