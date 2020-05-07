@extends('frontend.layouts.default')



@section('title')Atkurti slaptažodį - @stop

@section('content')
	<section class="agent-single-welcome-section contact" id="welcome-section" style="background-image: url({{ ('images/img/single-page-welcome-bg.jpg') }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="agent-content-tbl">
						<div class="agent-content-tbl-c">
							<div class="agent-single-page-content">
								<h2>Reset password</h2>
							</div> <!-- .agent-single-page-content END -->
						</div>
					</div>
				</div>
			</div>
			 
		</div>
	</section>
		<div class="container" style="margin-top: 7rem;">
			


	{{ Form::open( ['route' => 'password.reset.post', 'class' => 'form-horizontal'] ) }}
		

		@if (Session::has('error'))
			<div class="alert alert-danger">
			{{ Session::get('error') }}
			</div>
		@elseif (Session::has('status'))
			<div class="alert alert-success">
				Instrukcija sėkmingai išsiųsta nurodytu el. paštu.
			</div>
		@endif

		{{ Form::text('token', $token, [ 'class' => 'form-control hide', 'placeholder' => 'El. pašto adresas']) }}

		<div class="form-group {{ ( $errors->first('email') ? 'has-error' : NULL) }}">
			{{ Form::label('email', 'El. paštas', [ 'class' => 'col-sm-3 control-label']) }}

			<div class="col-sm-9">
				{{ Form::email('email', '', [ 'class' => 'form-control', 'placeholder' => 'El. pašto adresas']) }}

				{{ $errors->first('email', '<label class="control-label">:message</label>') }}
			</div>
		</div>

		<div class="form-group {{ ( $errors->first('password') ? 'has-error' : NULL) }}">
			{{ Form::label('password', 'Slaptažodis', [ 'class' => 'col-sm-3 control-label']) }}

			<div class="col-sm-9">
				{{ Form::password('password', [ 'class' => 'form-control', 'placeholder' => 'Naujas slaptažodis']) }}

				{{ $errors->first('password', '<label class="control-label">:message</label>') }}
			</div>
		</div>

		<div class="form-group {{ ( $errors->first('password_confirmation') ? 'has-error' : NULL) }}">
			{{ Form::label('password_confirmation', 'Pakartokite', [ 'class' => 'col-sm-3 control-label']) }}

			<div class="col-sm-9">
				{{ Form::password('password_confirmation', [ 'class' => 'form-control', 'placeholder' => 'Pakartokite naują slaptažodį']) }}

				{{ $errors->first('password_confirmation', '<label class="control-label">:message</label>') }}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-9 col-sm-offset-3">
				<button class="btn btn-primary">Patvirtinti</button>
			</div>
		</div>
	{{ Form::close() }}
			</div>

@stop