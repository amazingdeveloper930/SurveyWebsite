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
                                                        @lang('frontend/campaigns.Create_new_survey')</font>
                                                    	</font>
                                                        
                                                    </h1>
                                                </div>    

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        
                                                        <div class="form-group {{ $errors->first('title', 'has-error') }}" style="margin-bottom: 15px;">
                                                            {{ Form::label('title', 'Title', [ 'class' => 'col-sm-3']) }}
                                                            <div class="col-sm-9">
                                                                {{ Form::text('title', '', [ 'class' => 'form-control',
                                                                'placeholder' => '']) }}
                                                                {!! $errors->first('title', '<label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{ $errors->first('description', 'has-error') }}" style="margin-bottom: 15px;">
                                                            {{ Form::label('description', 'Description', [ 'class' => 'col-sm-3']) }}
                                                            <div class="col-sm-9">
                                                                {{ Form::textarea('description', '', [ 'class' => 'form-control', 'placeholder' => '']) }}

																{!! $errors->first('description', '<label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{ $errors->first('respondents', 'has-error') }}">
                                                           <div class="col-sm-9 col-sm-offset-3">
                                                                <div class="checkbox">
                                                                    <label>
                                                                    	{{ Form::checkbox('respondents', 1) }} Show results to respondents
                                                                    </label>
                                                                </div>
                                                                {!! $errors->first('respondents', '<label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
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
                                                       <!-- <div class="form-group {{ $errors->first('tags', 'has-error') }}">    
                                                        	{{ Form::label('tags', 'Žymės', [ 'class' => 'col-sm-3']) }}
                                                            <div class="col-sm-9">
                                                            	{{ Form::text('tags', '', [ 'class' => 'form-control', 'placeholder' => 'Anketos žymės']) }}         
                                                                <span class="label label-info">Žymes atskirkite tarpais.</span>
                                                                {!! $errors->first('tags', '<br><label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label for="upload a picture">Upload Image</label>
                                                            <div class="form-group" style="margin-bottom: 15px;">
                                                                <div class="col-sm-9" style="display: inline;">
                                                                <input type="file" accept="image/*" onchange="loadFile(event)">
                                                                            <img id="output"/>
                                                                            <script>
                                                                            var loadFile = function(event) {
                                                                                var output = document.getElementById('output');
                                                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                                            };
                                                                            </script>
                                                                </div>
                                                            </div>

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
                                                <div class="pull-right hidden-sm hidden-xs">
                                                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Save</font></font></button>
                                                </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p style="margin-top: 100px;"></p>
                        <div class="well text-center">
                            <!-- @include('frontend.campaigns.advertisements') -->
                        </div>              
                    </section>
                </div>
                   <div class="col-md-4">

                    <div class="well col-sm-12" style="overflow-y: auto; height: 660px;min-width: 120px!important;">
                        <h4 style="color: grey; text-align: center;">@lang('frontend/common.Answer_survey')</h4>
                        

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
                            <a style="color: white;" type="button" class="btn btn-info extc" href="{{ route('campaigns.answer', $anketa->id) }}"><i class="fa fa-book"> </i>  @lang('frontend/common.Fill_out_survey')</a>
                            
                        @else
                            <a style="color: white;" type="button" class="btn btn-info extc" href="{{ route('campaigns.answer', $anketa->id) }}"><i class="fa fa-book"> </i>  @lang('frontend/common.Fill_out_survey')</a>
                            
                        @endif
                        
                        @php 
                            $a++
                        @endphp
                        
                        
                        
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