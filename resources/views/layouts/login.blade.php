<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token">
    <link rel="icon" type="img/png" href="{{url('/')}}/assets/img/mate-logo.png" />

    <title>MATE</title>

    <!-- Styles -->
    <link href="{{url('/')}}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/css/admin.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/css/font-awesome.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/css/sweetalert.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/css/animate.css" rel="stylesheet">
</head>
<body class="login">
<div id="content" class="site-content">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{url('/')}}/assets/js/jquery.min.js"></script>
<script src="{{url('/')}}/assets/js/jquery.easing.min.js"></script>
<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/assets/js/sweetalert.min.js"></script>
<script src="{{url('/')}}/assets/js/admin.js"></script>

</body>
</html>