@extends('frontend.layouts.defaultlog')

@section('content')

	<div id="wrap" class="animsition">
        <div class="page page-core page-login">
            <div class="text-center"><a href="{{ route('home') }}" title=""> <img src="{{ asset('images/logo.png') }}"></a></div>
                <div class="container w-420 p-15 bg-white mt-40 text-center">
                    <h2 class="text-light text-greensea">Sign up</h2>
					{{ Form::open([ 'route' => 'login.register', 'class' => 'form-validation mt-20' ]) }}
						<p class="help-block text-left">
                            Enter your personal details below:
                        </p>
                        <div class="form-group {{ $errors->first('username', 'has-error') }}">
							{{ Form::text('username', '', ['class' => 'form-control underline-input', 'placeholder' => 'Username']) }}
							{!! $errors->first('username', '<br><label class="control-label">:message</label>') !!}
						</div>
						<div class="form-group {{ $errors->first('email', 'has-error') }}">	
							{{ Form::email('email', '', ['class' => 'form-control underline-input', 'placeholder' => 'Email']) }}
							{!! $errors->first('email', '<br><label class="control-label">:message</label>') !!}							
						</div>
						<div class="form-group {{ ( $errors->first('password') || $errors->first('password_confirmation') ? 'has-error' : NULL) }}">
							{{ Form::password('password', ['class' => 'form-control underline-input', 'placeholder' => 'Create a password']) }}
							{!! $errors->first('password', '<label class="control-label">:message</label>') !!}
						</div>
						<div class="form-group {{ ( $errors->first('password') || $errors->first('password_confirmation') ? 'has-error' : NULL) }}">	
							{{ Form::password('password_confirmation', ['class' => 'form-control underline-input', 'placeholder' => 'Confirm your password']) }}

							{!! $errors->first('password_confirmation', '<label class="control-label">:message</label>') !!}
						</div>	
						<div class="form-group text-left">
                            <label class="checkbox checkbox-custom-alt checkbox-custom-sm inline-block">
                                <input required type="checkbox"><i></i> <a href="javascript:;">I agree to the terms and conditions</a> &amp;<!-- <a href="javascript:;">Privacy Policy</a>-->
                            </label>
                        </div>
					<h4 style="color: black;">or</h4></hr>                        
                    <a href="{{ url('auth/facebook') }}" class="social-button" id="facebook-connect"> <span>Connect with Facebook</span></a>
                    <a href="{{ url('auth/google') }}" class="social-button" id="google-connect"> <span>Connect with Google</span></a>
                    <a href="{{ url('auth/twitter') }}" class="social-button" id="twitter-connect"> <span>Connect with Twitter</span></a>
                    <div class="bg-slategray lt wrap-reset mt-20 text-left">
                        <p class="m-0">
                            <button class="btn btn-greensea b-0 text-uppercase pull-right">Submit</button>
                            <a href="{{ route('home') }}" class="btn btn-lightred b-0 text-uppercase">Back</a>
                        </p>
                    </div>
                    {{ Form::close() }}
				</div>				
		</div>
	</div>
@stop