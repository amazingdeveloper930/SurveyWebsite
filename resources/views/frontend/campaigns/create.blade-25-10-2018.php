@extends('frontend.layouts.defaultcreate')

@section('title')Sukurti naują anketą - @stop

@section('content')
<section id="content">
    <div class="page page-profile">
        <div class="pagecontent">
            <div class="row">
                <div class="col-md-8">
                    <section class="tile tile-simple">
                        <div class="tile-body p-0">
                            <div role="tabpanel">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">
                                        <div class="wrap-reset">
                                        	{{ Form::open(['route' => 'campaigns.store', 'class' => 'profile-settings', 'files' => true]) }}
                                                <div class="page-header">
                                                    <h1>
                                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                        Create new survey</font>
                                                    	</font>
                                                        
                                                    </h1>
                                                </div>    

                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        
                                                        <div class="form-group {{ $errors->first('title', 'has-error') }}" style="margin-bottom: 15px; >
                                                            {{ Form::label('title', 'Title', [ 'class' => 'col-sm-3']) }}
                                                            <div class="col-sm-12">
                                                                {{ Form::text('title', '', [ 'class' => 'form-control',
                                                                'placeholder' => '']) }}
                                                                {!! $errors->first('title', '<label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{ $errors->first('description', 'has-error') }}" style="margin-bottom: 15px; padding-bottom: 10px !important;>
                                                            {{ Form::label('description', 'Description', [ 'class' => 'col-sm-3']) }}
                                                            <div class="col-sm-12">
                                                                {{ Form::textarea('description', '', [ 'class' => 'form-control', 'placeholder' => '']) }}

																{!! $errors->first('description', '<label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{ $errors->first('respondents', 'has-error') }}">
                                                           <label for="upload a picture" style="margin-left: 0px !important;">Upload Image</label>
                                                            <div class="form-group {{ $errors->first('photo', 'has-error') }}" style="margin-bottom: 15px;">
                                                                <div class="col-sm-12" style="display: inline; margin-left: 0px !important;">
                                                                        {{ Form::file('photo', [ 'class' => 'form-control', 'placeholder' => 'Paveikslėlis']) }}
                                                                    
                                                                    {!! $errors->first('photo', '<br><label class="control-label">:message</label>') !!}
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group {{ $errors->first('respondents', 'has-error') }}">
                                                           <div class="col-sm-9 col-sm-offset-3" style="margin-left: 2% !important;
}">
                                                                <div class="checkbox"> 
                                                                    <label>
                                                                    	{{ Form::checkbox('respondents', 1) }} Show results to respondents
                                                                    </label>
                                                                </div>
                                                                {!! $errors->first('respondents', '<label class="control-label">:message</label>') !!}
                                                                 <div class="pull-left">
                                                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Save</font></font></button>
                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group">
                                                           <div class="col-sm-9 col-sm-offset-3">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        {{ Form::checkbox('send_email', 1) }} Send me replies by email
                                                                    </label>
                                                                </div>
                                                                {!! $errors->first('send_email', '<label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                           <div class="col-sm-9 col-sm-offset-3">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        {{ Form::checkbox('same_computer', 1) }} Allow multiple responses from one computer
                                                                    </label>
                                                                </div>
                                                                {!! $errors->first('same_computer', '<label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                       <div class="form-group {{ $errors->first('tags', 'has-error') }}">    
                                                        	{{ Form::label('tags', 'Žymės', [ 'class' => 'col-sm-3']) }}
                                                            <div class="col-sm-9">
                                                            	{{ Form::text('tags', '', [ 'class' => 'form-control', 'placeholder' => 'Anketos žymės']) }}         
                                                                <span class="label label-info">Žymes atskirkite tarpais.</span>
                                                                {!! $errors->first('tags', '<br><label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-9 col-sm-offset-3">
                                                            <!--<label for="upload a picture">Upload Image</label>
                                                            <div class="form-group {{ $errors->first('photo', 'has-error') }}" style="margin-bottom: 15px;">
                                                                <div class="col-sm-9" style="display: inline; margin-left: -19px !important;">
                                                                        {{ Form::file('photo', [ 'class' => 'form-control', 'placeholder' => 'Paveikslėlis']) }}
                                                                    
                                                                    {!! $errors->first('photo', '<br><label class="control-label">:message</label>') !!}
                                                                </div>
                                                            </div>-->

                                                           <!-- <div class="form-group col-sm-12">
                                                                <h3>Vaizdo įrašas</h3>
                                                            </div>
                                                            <div class="form-group col-sm-12 {{ $errors->first('video', 'has-error') }}">
                                                            	{{ Form::text('video', '', [ 'class' => 'form-control', 'placeholder' => 'http://']) }}
																<span class="label label-info">Nuoroda į <em>YouTube</em> vaizdo įrašą. Bus rodomas po anketos aprašymu.</span>
																{!! $errors->first('video', '<br><label class="control-label">:message</label>') !!}
                                                            </div>-->
                                                        </div>
                                                    </div>    
                                                </div>
                                               
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p style="margin-top: 100px;"></p>
                        <div class="well text-center">
                            <h1>Advertisement</h1>
                        </div>              
                    </section>
                </div>
                   <div class="col-md-4">

                    <div class="well col-sm-12" style="overflow-y: auto; height: 660px;min-width: 120px!important;">
                        <h4 style="color: grey; text-align: center;">Answer these surveys - get responses to your questions</h4>
                        

                        @php
                    $a = 0
                @endphp

                @foreach ($entries as $anketa)
                <div class="col-md-12">
                    <section class="tile tile-simple bg-dutch">
                        <div class="tile-header">
                            <span class="title-img"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE0LjMzNTkzNzUiIHk9IjE2IiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEycHg7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+wqA8L3RleHQ+PC9nPjwvc3ZnPg==" alt="title-img" class="survey-title-img "/></span>&nbsp;&nbsp;&nbsp;
                            <h1 class="custom-font" style="color: #337ab7;"><strong>{{ $anketa->title }}</strong></h1>                       
                        </div>                   
                        <div class="tile-body">
                            <p>{{ $anketa->title }}</p>
                        </div>
                        @if( $a > 0 )
                            <a style="color: white;" type="button" class="btn btn-info extc" href="{{ route('campaigns.answer', $anketa->id) }}"><i class="fa fa-book"> </i>  Fill out survey</a>
                            
                        @else
                            <a style="color: white;" type="button" class="btn btn-info extc" href="{{ route('campaigns.answer', $anketa->id) }}"><i class="fa fa-book"> </i>  Fill out survey</a>
                            
                        @endif
                        
                        @php 
                            $a++
                        @endphp
                        
                        
                        <!--<div class="tile-footer" >
                                <p><a href="{{ route('campaigns.answers', $anketa->id) }}" class="btn-rounded-10 btn btn-default  btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="fa fa-bars"></i> {{ count($anketa->results) }}</a>
                                <a href="#" class="btn btn-default btn-rounded-10  btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="fa fa-user"></i> {{ $anketa->user->username }}</a>
                                <a href="#" class="btn-rounded-10 btn btn-default btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="glyphicon glyphicon-calendar"></i> {{ $anketa->created_at }}</a></p>
                        </div>-->
                    </section>
                </div>
                @endforeach
            </div>
                </div>
            </div>
        </div>
    </div>
</section>	
@stop