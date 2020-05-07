
@extends('frontend.layouts.default')

@include('frontend.layouts.navigation')

@section('title')Anketa užpildyta - @stop

@section('content')
	<div class="alert alert-success">
		<h4>@lang('frontend/campaigns.Survey_filled_out')</h4>
	</div>
@stop
