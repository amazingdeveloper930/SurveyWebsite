@extends('backend.layouts.default')

@section('title')
    Admin Panel - Settings
@endsection

@section('content')
    <div class="page-header">
        <div class="pull-right">
            <button class="btn btn-primary" type="submit" form="form-settings"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
        </div>
        <h1>Settings</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session('status') }}
        </div>
    @endif
    {!! Form::open(['route' => 'settings.update', 'method' => 'put', 'id' => 'form-settings', 'class' => 'form-horizontal']) !!}
        <div class="row">
            <div class="col-md-8">
                <h4>Credits</h4>
                <div class="form-group">
                    <label class="col-md-3 control-label">Registration</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="settings[registration_credits]" value="{{ $settings['registration_credits'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Credits course</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="settings[one_credits]" value="{{ $settings['one_credits']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Answer</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="settings[campaigns_credits]" value="{{ $settings['campaigns_credits'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Promotion of survey</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="settings[featured_credits]" value="{{ $settings['featured_credits'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">
credits for Facebook share</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="settings[facebook_share_credit]" value="{{ $settings['facebook_share_credit'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">
credits for Twitter share</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="settings[twitter_share_credit]" value="{{ $settings['twitter_share_credit'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">
Buy credit starting price</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="settings[buy_credit_starting_price]" value="{{ $settings['buy_credit_starting_price'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">
Price per answer</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="settings[price_per_answer]" value="{{ $settings['price_per_answer'] }}">
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
