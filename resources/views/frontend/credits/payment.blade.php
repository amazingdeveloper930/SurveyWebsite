
<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">    
<head>
    <link rel="stylesheet" href="{{ asset('css/backend/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css')}}"">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/chosen/chosen.css')}}">  
    <link rel="stylesheet" href="{{ asset('css/backend/main.css')}}">   
    <script src="{{ asset('js/backend/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Poll Animal</title>
    <link rel="icon" type="image/ico" href="{{ asset('images/backend/images/favicon.ico')}}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">        

</head>
<body id="minovate" class="appWrapper">
<style type="text/css">
body{
  background-color: white  !important;
  color: black !important;
}
</style>

@section('title')Mano kreditai - @stop

@include('frontend.layouts.sidebar')
<section id="content" style="margin-top: 25px;">
		    <div class="page page-profile">                   
		        <div class="pagecontent">            

<form class="needs-validation"  id="payment-form" action="{!! URL::to('cardinity') !!}" method="POST">
  {{ csrf_field() }}
	            <div class="row">
            	<div class="col-md-6 mb-3">
                <label for="cc-name">Total Amount {{$amount}}</label>
                <input type="hidden" name="amount" id="amount" value="{{$amount}}" />
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                <input type="hidden" name="currency_code" value="EUR">
                <input type="hidden" name="credit_quantity" value="{{$credit_quantity}}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" name="cc-name" placeholder="Full name as displayed on card" required="true">
                <!-- <small class="text-muted">Full name as displayed on card</small> -->
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" name="cc-number" placeholder="xxxx-xxxx-xxxx-xxxx" required="true">
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration Month</label>
                <input type="text" class="form-control" id="cc-expiration-month" name="cc-expiration-month" placeholder="xx" required="true">
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration Year</label>
                <input type="text" class="form-control" id="cc-expiration-year" name="cc-expiration-year" placeholder="xxxx" required="true">
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="CVV" required="true">
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add Credit</button>
          </form>
<!-- 
		            <section class="tile credit_block_ads">                                
		                <div class="tile-header dvd dvd-btm advertise">
		                    @include('frontend.campaigns.advertisements')
		                </div>
		            </section>       -->                           
		        </div>
		    </div>
		</section>
		<script src="{{ asset('js/backend/ajax.googleapis.min.js')}}"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('js/backend/vendor/jquery/jquery-1.11.2.min.js')}}"><\/script>')</script>
        <script src="{{ asset('js/backend/vendor/bootstrap/bootstrap.min.js')}}""></script>
        <script src="{{ asset('js/backend/vendor/jRespond/jRespond.min.js')}}""></script>
        <script src="{{ asset('js/backend/vendor/sparkline/jquery.sparkline.min.js')}}""></script>
        <script src="{{ asset('js/backend/vendor/slimscroll/jquery.slimscroll.min.js')}}""></script>
        <script src="{{ asset('js/backend/vendor/animsition/js/jquery.animsition.min.js')}}""></script>
        <script src="{{ asset('js/backend/vendor/screenfull/screenfull.min.js')}}""></script>
        <script src="{{ asset('js/backend/vendor/chosen/chosen.jquery.min.js')}}""></script>
        <script src="{{ asset('js/backend/vendor/filestyle/bootstrap-filestyle.min.js')}}""></script>      
        <script src="{{ asset('js/backend/main.js')}}""></script>
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