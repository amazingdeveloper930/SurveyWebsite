<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Pollanimal</title>
    <link rel="icon" type="image/ico" href="{{ asset('images/backend/images/favicon.ico')}}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/animsition/css/animsition.min.css')}}">
    <!-- project main css files -->
    <link rel="stylesheet" href="{{ asset('css/backend/main.css')}}">
    <!--/ stylesheets -->
    <script src="{{ asset('css/backend/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
</head>
<body id="minovate" class="appWrapper">
    <div id="wrap" class="animsition">
        <div class="page page-core page-404">
            <div class="text-center"><h3 class="text-light text-white">Your Site</div>
            <div class="container w-420 p-15 bg-white mt-40 text-center">
                <h2 class="text-light text-greensea">Error <strong>404</strong></h2>
                <h4 class="mb-0 mt-40">something's not right here</h4>
                <p class="text-muted">the page you are looking for cannot be found</p>
                <form class="mt-40 ng-pristine ng-valid">
                    <div class="input-group w-md m-auto">
                        <input type="text" class="form-control" placeholder="search...">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </span>
                        </div>
                    <!-- /input-group -->
                </form>
                <div class="bg-slategray lt wrap-reset mt-40 text-center">
                    <button class="btn btn-default btn-sm b-0"><i class="fa fa-refresh"></i> Try again</button>
                    <button class="btn btn-greensea btn-sm b-0"><i class="fa fa-home"></i> Return to home</button>
                    <button class="btn btn-lightred btn-sm b-0"><i class="fa fa-envelope-o"></i> Contact support</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/backend/ajax.googleapis.min.js')}}"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/backend/vendor/jquery/jquery-1.11.2.min.js')}}"><\/script>')</script>
    <script src="{{ asset('js/backend/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/jRespond/jRespond.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/animsition/js/jquery.animsition.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/screenfull/screenfull.min.js')}}"></script>
    <!--/ vendor javascripts -->
    <script src="{{ asset('js/backend/main.js')}}"></script>
    <!--/ custom javascripts -->
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='../../www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
</body>
</html>