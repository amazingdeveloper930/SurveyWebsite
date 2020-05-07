@extends('frontend.layouts.default')

@include('frontend.layouts.navigation')

@section('title')Anketa nerasta - @stop

@section('content')
	<div class="alert alert-warning">
		<h4>@lang('frontend/campaigns.Survey_not_found')</h4>

		@lang('frontend/campaigns.Survey_not_exist')
	</div>
@stop