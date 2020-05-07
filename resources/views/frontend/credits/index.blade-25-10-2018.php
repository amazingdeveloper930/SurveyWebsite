
<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">    
<head>
    <link rel="stylesheet" href="{{ asset('css/backend/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/bootstrap.min.css')}}"">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/animate.css')}}"">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/font-awesome.min.css')}}"">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/animsition/css/animsition.min.css')}}"">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css')}}"">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/chosen/chosen.css')}}"">  
    <link rel="stylesheet" href="{{ asset('css/backend/main.css')}}"">   
    <script src="{{ asset('js/backend/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js')}}""></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Poll Animal</title>
    <link rel="icon" type="image/ico" href="{{ asset('images/backend/images/favicon.ico')}}"" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">        
</head>
<body id="minovate" class="appWrapper">
<style type="text/css">
    .nblock{
       background-color: white;
    color: #616f77;
    }
    .sblock{
       background-color: white;
    color: #616f77;
    }
    .nsblock{
        background-color: white;
    color: #616f77;
    }
    .newbtn{
        background-color: #329ab1;
    border-color: #329ab1;
    color: white;
    }
    .newbtn:hover{
        background-color: #3c8494;
         border-color: #3c8494;
         color: white;
    }
	/* The Modal (background) */
	.modal {
	    display: none; /* Hidden by default */
	    position: fixed; /* Stay in place */
	    z-index: 1; /* Sit on top */
	    padding-top: 100px; /* Location of the box */
	    left: 0;
	    top: 0;
	    width: 100%; /* Full width */
	    height: 100%; /* Full height */
	    overflow: auto; /* Enable scroll if needed */
	    background-color: rgb(0,0,0); /* Fallback color */
	    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}
	/* Modal Content */
	.modal-content {
	    background-color: #fefefe;
	    margin: auto;
	    padding: 20px;
	    border: 1px solid #888;
	    width: 33%;
	}
	/* The Close Button */
	.close {
	    color: #aaaaaa;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}
	.close:hover,
	.close:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
	}
	@media only screen and (max-width:767px) and (min-width:320px){ 
		.modal-content {
		    background-color: #fefefe;
		    margin: auto;
		    padding: 20px;
		    border: 1px solid #888;
		    width: 70%;
		}
	}
</style>

@section('title')Mano kreditai - @stop

@include('frontend.layouts.sidebar')

		<section id="content" style="margin-top: 25px;">
		    <div class="page page-profile">                   
		        <div class="pagecontent">                    
		            <div class="row">                         
		                <div class="col-md-8">
		                    <section class="tile">
		                        <div class="tile-header dvd dvd-btm">
		                            <h1 class="custom-font"><strong>About credits</strong></h1>
		                        </div>
		                        <div class="tile-widget">
		                            <p style="text-align: justify;">You can buy our services using credits. Buy credits using Paypal or bank card. Having credits will allow you to boost your survey and get more answers.</p>
		                        </div>
		                    </section>
		                    <section class="tile">   
							
							@if (Session::has('done'))

							<div class="alert alert-info">
							<strong><i class='fa fa-check'></i> Success!</strong> Payment accepted and credited successfully.
							</div>
							@endif
							
							@if (Session::has('errors'))

							<div class="alert alert-danger">
							<strong><i class='fa fa-times'></i> Error!</strong> Payment failed please try later !
							</div>
							@endif
								
								
		                        <div class="tile-header dvd dvd-btm">
		                            <h1 class="custom-font"><strong>Buy credits</strong></h1>
		                        </div>
		                        <!-- The Modal -->
		                        <div id="myModal" class="modal">
		                            <div class="modal-content">
		                               	<span class="close">&times;</span>
		                               	<h3 class="headingTop text-center">Select Your Payment Method</h3>
		                                <div>
		                                    <ul class="cd-payment-gateways" style="list-style:none;">
		                                        <li>
		                                            <input type="radio" name="payment-method" id="paypal" value="paypal" checked>
		                                            <label for="paypal">Paypal</label>
		                                        </li>                                        
		                                        <li>
		                                            <input type="radio" name="payment-method" id="card" value="card" >
		                                            <label for="card">Credit / Debit Card</label>
		                                        </li>
		                                        <li>
		                                        	<button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c mb-10"><i class="fa fa-arrow-right"></i> Pay Now</button>
		                                        </li>
		                                    </ul>
		                                </div>
		                            </div>
		                            <!-- Modal content -->
		                        </div>
		                        <div class="tile-widget credit_block">
		                            <form method="POST" id="payment-form" action="{!! URL::to('paypal') !!}" style="margin: 0;">
		                            	{{ csrf_field() }}
		                            <table class="table">
		                                <thead class="nblock">
		                                    <th>Price</th>
		                                    <th>Amount of answers</th>
		                                    <th></th>
		                                </thead>
		                                <tbody class="sblock">
		                                	<tr>
		                                		<td id="credit_amount">10.00 EUR</td>
		                                		<td><input type="number" name="credit_quantity" id="credit_quantity" min="20" max="1400" value="20" onchange='calccredits();'></td>
		                                		<td>
		                                			<!--<select name="payment_type" id="payment_type">
		                                				<option value="paypal">Paypal</option>
		                                				<option value="bankcard">Bank Card</option>
		                                			</select>-->

		                                			<!-- Payment details -->
														<input type="hidden" name="item_name" value="Payment credits">
														<input type="hidden" name="amount" id="final_amount" value="10.00">
														<input type="hidden" name="currency_code" value="EUR">
														<!-- User info -->
														<input type="hidden" name="email" value="{{ auth()->user()->email }}">

														<!-- Button -->
														<!--<input type="image" name="submit" border="0" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png" alt="Buy Now">-->
														<button id="btn_payment" type="button" class="btn btn-primary" onclick="changeFormAction();"><font style="vertical-align: inherit;">Purchase</font></button>
													
		                                        </td>
		                                	</tr>
		                                	<tr id="payment_options" style="display:none;">
		                                		<td colspan="3" style="text-align:center"><button id="btn_paypal" type="submit" class="btn btn-primary"><font style="vertical-align: inherit;">Paypal</font></button>
		                                			<button id="btn_bankcard" type="button" class="btn btn-primary"><font style="vertical-align: inherit;">Bank Card</font></button>
		                                		</td>
		                                	</tr>                                   
		                                </tbody>
		                            </table>
		                            </form>
		                        </div>
		                    </section>
		                </div>
		                <div class="col-md-4">
		                    <section class="tile">                               
		                        <div class="tile-header dvd dvd-btm nblock">
		                            <h1 class="custom-font"><strong>Balance of credits </strong></h1>                           
		                        </div>
		                        <div class="tile-widget" style="border-bottom: 1px solid; border-bottom-color: #329ab1;">
		                            <h4>{{ auth()->user()->credits()->sum('credits') }}</h4>
		                            <p>Total credits</p>
		                        </div>
		                        <!-- /tile widget -->
		                        <!-- tile body -->
		                        <div class="tile-body" style="border-bottom: 1px solid; border-bottom-color: #329ab1; border-top: 1px solid; border-top-color: #329ab1;">
		                            <h4>{{ auth()->user()->credits()->sum('credits') - auth()->user()->campaigns()->sum('advertise_credits') }}</h4>
		                            <p>Unused credits</p>
		                        </div>
		                        <!-- /tile body -->
		                        <!-- tile footer -->
		                        <div class="tile-footer" style="border-top: 1px solid; border-top-color: #329ab1;">
		                            <h4>{{ auth()->user()->campaigns()->sum('advertise_credits') }}</h4>
		                            <p>Used credits</p>
		                        </div>
		                    </section>
		                    <table class="table">
		                        <thead class="nblock">
		                            <th>Date</th>
		                            <th>Actions</th>
		                            <th>Credits</th>
		                        </thead>
		                        <tbody class="nsblock">
		                        	@foreach (auth()->user()->credits()->orderBy('id', 'desc')->take(10)->get() as $entry)
		                            <tr style="border-bottom: 2px solid; border-bottom-color: #329ab1;">
		                                <td>{{ $entry->created_at }}</td>
		                                <td>{{ $entry->description }}</td>
		                                <td>{{ $entry->credits }}</td>
		                            </tr>
		                            @endforeach                            
		                        </tbody>
		                    </table>
		                </div>
		            </div>
		            <section class="tile credit_block_ads">                                
		                <div class="tile-header dvd dvd-btm advertise">
		                    <h1 class="custom-font">Advertisement</h1>
		                </div>
		            </section>                                 
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

         <script>
			// Get the modal
			var modal = document.getElementById('myModal');

			// Get the button that opens the modal
			var btn = document.getElementById("myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn.onclick = function() {
			    modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			    modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
			}
			</script>


		<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn1");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		</script>


		<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn2");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		</script>
		<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn3");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		</script>


		<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn4");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		
		function calccredits() {
			var x = document.getElementById('credit_quantity');
			var defaultPrice = 0.20;
			var finalPrice = 0;
			var minPrice = 10;
			if(x.value > 20) {
				var extraAnswers = (x.value - 20);
				var total = (defaultPrice * extraAnswers);
				finalPrice = (minPrice + total);
			} else {
				finalPrice = minPrice;
			}
			finalPrice = finalPrice.toFixed(2);
			document.getElementById('credit_amount').innerHTML = finalPrice + ' EUR';
			document.getElementById('final_amount').value = finalPrice;
			
		}
		function changeFormAction() {
			var pType = document.getElementById('payment_options');
			if (pType.style.display === "none") {
				pType.style.display = "";
			} else {
				pType.style.display = "none";
			}

		}
		</script>       
    </body>
</html>