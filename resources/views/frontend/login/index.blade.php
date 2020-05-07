@extends('frontend.layouts.defaultlog')

@section('content')
	<div id="wrap" class="animsition">
	    <div class="page page-core page-login">
	       
	        <div class="container w-420 p-15 bg-white text-center">
	        	<div class="text-center brand">
					 <a href="{{ route('home') }}" title=""><img src="{{ asset('images/logo.png') }}"></a>
		        </div>
	            <h2 class="text-light text-greensea mfran">@lang('frontend/login.Signin')</h2>
				
				@if (session('login_error'))
					<div class="alert alert-danger">
						<h4>Error!</h4>

						@if ((int)session('login_error') == 1)
							Login details are incorrect.
						@endif
					</div>
				@endif
				@if(Session::has('success'))
				<p class="alert alert-success"><i class='fa fa-check'></i> {{ Session::get('success') }}</p>
				@endif

				@if(Session::has('error'))
				<p class="alert alert-danger"><i class='fa fa-times'></i> {{ Session::get('error') }}</p>
				@endif
				<?php
					$Email_txt = app('translator')->getFromJson('frontend/login.Email');
					$Password_txt = app('translator')->getFromJson('frontend/login.Password');
				?>
				{{ Form::open([ 'route' => 'login.session', 'class' => 'form-validation mt-20' ]) }}
				<div class="form-group">
					{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => $Email_txt]) }}	
					<div class="clearfix"></div>
				</div>

				<div class="form-group">
					{{ Form::password('password', ['class' => 'form-control', 'placeholder' => $Password_txt]) }}		
					<div class="clearfix"></div>
				</div>

				<div class="form-group text-left mt-20">
					<div class="row">
					<div class="col-md-6">
                    <label class="checkbox checkbox-custom-alt checkbox-custom-sm inline-block">
                        <input type="checkbox"><i></i><font style="color: black;"> @lang('frontend/login.Remember_me')</font>
                    </label>
                	</div>
                    <div class="col-md-6">
                    	<a href="{{ route('password.remind') }}" class="pull-right mt-10">@lang('frontend/login.Forgot_pwd')</a>
                    </div>
                	</div>
                	<div class="row">
                		<div class="col-sm-12">
                    	<button class="btn btn-md btn-greensea">@lang('frontend/login.Signin')</button>
                		</div>
                	</div>
                </div>	

					{{ Form::close() }}

				<div class="or-seperator"><b>@lang('frontend/login.Or')</b></div>
				<!-- <hr/> -->
				<p class="hint-text">@lang('frontend/login.Signin_with_socialsite')</p>
				<div class="social-btn text-center btn-stacked"> 
					<!-- social-button -->
	            <a href="{{ url('auth/facebook') }}" class="btn btn-primary btn-lg" > 
	            	<i class="fa fa-facebook"></i>
	            	<!-- <span>Connect with Facebook</span> -->
	            </a>
	            <a href="{{ url('auth/google') }}" class="btn btn-danger btn-lg" > 
	            	<i class="fa fa-google"></i>
	            	<!-- <span>Connect with Facebook</span> -->
	            </a>
	            <a href="{{ url('auth/twitter') }}" class="btn btn-info btn-lg" > 
	            	<i class="fa fa-twitter"></i>
	            	<!-- <span>Connect with Facebook</span> -->
	            </a>
	            <div class="clearfix"></div>
	            <!-- <a href="{{ url('auth/google') }}" class="social-button mfran" id="google-connect"> <span>Connect with Google</span></a> -->
	            <!-- <a href="{{ url('auth/twitter') }}" class="social-button mfran" id="twitter-connect"> <span>Connect with Twitter</span></a> -->
		        </div>
	            <div class="bg-slategray lt wrap-reset mt-40 mfran">
	                <p class="m-0">
	                    <a href="{{ route('login.registration') }}" class="text-uppercase">@lang('frontend/login.Signup_now')</a>
	                </p>
	            </div>	            
			</div>
		</div>
	</div>
@stop