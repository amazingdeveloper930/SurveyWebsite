<!doctype html>
 <html class="no-js" lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/backend/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/main.css') }}">
    <script src="{{ asset('js/backend/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Poll Animal</title>
    <link rel="icon" type="image/ico" href="{{ asset('images/backend/images/favicon.ico') }}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="minovate" class="appWrapper">

    @include('frontend.layouts.sidebar')
    @yield('content')

    <script src="{{ asset('js/backend/ajax.googleapis.min.js')}}"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/backend/vendor/jquery/jquery-1.11.2.min.js')}}"><\/script>')</script>
    <script src="{{ asset('js/backend/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/jRespond/jRespond.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/animsition/js/jquery.animsition.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/screenfull/screenfull.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/chosen/chosen.jquery.min.js')}}"></script>
    <script src="{{ asset('js/backend/vendor/filestyle/bootstrap-filestyle.min.js')}}"></script>    
    <script src="{{ asset('js/backend/main.js')}}"></script>
              <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107521779-2"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-107521779-2');
</script>
</body>
</html>