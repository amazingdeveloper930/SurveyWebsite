@extends('backend.layouts.default')

@section('title')
    Add Credits - Campaign
@endsection

@section('content')
    <div class="page-header">
        <h1>Add Credits - {{$survey->title}}</h1>
        <!-- {{$survey}} -->
        	<p class="text-info" style="margin-top:10px;margin-bottom: 10px;"><i class="glyphicon glyphicon-info-sign"></i> Credit will be added to existing credits</p>
        	<hr/>
        	{{ Form::open(['route' => 'addCredit.dashboard', 'method' => 'post']) }}
        	<div class="form-group">
        		<label>Existing Credit: {{$survey->advertise_credits}} </label>

        	</div>
        	<div class="form-group">
        		<input type="hidden" name="survey-id" name="survey-id" value="{{$survey->id}}" />
        		<input type="text" name="add-credit-box" name="add-credit-box" placeholder="Credit amount" />
        		<label>Credit Amount</label>
        	</div>
        	<button class="btn btn-sm btn-primary" type="submit">Save</button>
	        {{ Form::close()}}
    </div>
@stop