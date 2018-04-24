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
    <link href="{{url('/')}}/assets/css/main.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/css/font-awesome.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/css/sweetalert.css" rel="stylesheet">
</head>
<body>
    <div id="content" class="site-content">
        <header>
            <div class="main-menu large-trunk float-container">
                <div class="home-link-container">
                    <a href="http://www.mate.pe/es" class="home-link">
                        Home
                    </a>
                </div>
                <div class="col-md-3 pull-right" style="height: 60px; padding-top: 25px;">
                    <p style="text-align: right;">
                        <a href="{{url('/en')}}" style="color: #000 !important;">En</a>   | <a href="{{url('/es')}}" style="color: #000 !important;"> Es </a>
                    </p>
                </div>
            </div>
        </header>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{url('/')}}/assets/js/jquery.min.js"></script>
    <script src="{{url('/')}}/assets/js/jquery.easing.min.js"></script>
    <script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="{{url('/')}}/assets/js/custom.js"></script>

</body>
</html>
