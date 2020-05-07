<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
<head>  
        <link rel="stylesheet" href="{{ asset('css/backend/vendor/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/backend/vendor/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/backend/vendor/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/backend/vendor/animsition/css/animsition.min.css') }}">

        
        <link rel="stylesheet" href="{{ asset('css/backend/main.css') }}">
       
        <script src="{{ asset('js/backend/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Poll Animal</title>
        <link rel="icon" type="image/ico" href="{{ asset('images/img/favicon.ico') }}" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
<body id="minovate" class="appWrapper">
	<div id="wrap" class="animsition">
        <div class="page page-core page-login">
            <div class="text-center"><a href="{{ route('home') }}" title=""><img src="http://pollanimal.com/images/logo.png" ></a></div>
            <div class="container w-420 p-15 bg-white mt-40 text-center">
                <h2 class="text-light text-greensea">@lang('frontend/password.Reset_password')</h2>	

				@if (Session::has('error'))
					<div class="alert alert-danger">
                        Error - no user with this email.
					</div>
				@elseif (Session::has('status'))
					<div class="alert alert-success">
						@lang('frontend/password.Reset_your_password')
					</div>
				@endif

			{{ Form::open( ['route' => 'password.remind.post', 'method' => 'post', 'class' => 'form-validation mt-20'] ) }}
				<p class="help-block text-left">
                    @lang('frontend/password.Enter_email')
                </p>

			<div class="form-group {{ ( $errors->first('email') ? 'has-error' : NULL) }}">
				{{ Form::email('email', null, [ 'class' => 'form-control underline-input', 'placeholder' => 'Email']) }}
				{!! $errors->first('email', '<label class="control-label">:message</label>') !!}				
			</div>

			<div class="bg-slategray lt wrap-reset mt-40 text-left">
                <p class="m-0">
                    <button class="btn btn-greensea b-0 text-uppercase pull-right">@lang('frontend/password.Confirm')</button>
                    <a href="{{ route('login') }}" class="btn btn-lightred b-0 text-uppercase">@lang('frontend/password.Back')</a>
                </p>
            </div>
			{{ Form::close() }}
			</div>
        </div>
    </div>

		<script src="{{ asset('js/backend/ajax.googleapis.min.js') }}"></script>
        <script>window.jQuery || document.write('<script src="asset{{ ('js/backend/vendor/jquery/jquery-1.11.2.min.js') }}"><\/script>')</script>
        <script src="{{ asset('js/backend/vendor/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/jRespond/jRespond.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/animsition/js/jquery.animsition.min.js') }}"></script>
        <script src="{{ asset('js/backend/vendor/screenfull/screenfull.min.js') }}"></script>        
        <script src="{{ asset('js/backend/main.js') }}"></script>
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