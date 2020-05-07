@extends('frontend.layouts.defaultport')

@section('title')Anketos „{{ $entry->title }}“ nustatymai - @stop

@section('content')

<section id="content">
    <div class="page page-profile">
        <div class="pageheader">
        <h2>{{ $entry->title }} @lang('frontend/common.Survey')</h2>
        </div>                   
        <div class="pagecontent">                    
            <div class="row">                         
                <div class="col-md-8">                               
                    <section class="tile tile-simple">
                        <div class="tile-body p-0">
                            <div role="tabpanel">                     
                                @include('frontend.campaigns.tabs')
                                @if (session('updated'))
                                    <div class="alert alert-success">
                                        @lang('frontend/campaigns.Survey_updated')
                                    </div>
                                @endif
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{session('message')}}
                                    </div>
                                @endif
                                <div class="tab-content">                     
                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">
                                        <div class="wrap-reset">
                                            {{ Form::open( ['route' => ['campaigns.update', $entry->id], 'class' => 'profile-settings', 'files' => true] ) }}
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                   <?php
                                                   $Title_txt = app('translator')->getFromJson('frontend/campaigns.Title');
                                                   $Description_txt = app('translator')->getFromJson('frontend/campaigns.Description');

                                                   ?>
                                                    <div class="form-group {{ $errors->first('title', 'has-error') }}" style="margin-bottom: 15px;">
                                                        {{ Form::label('title', $Title_txt, [ 'class' => 'col-sm-3']) }}
                                                        <div class="col-sm-12">
                                                            {{ Form::text('title', $entry->title, [ 'class' => 'form-control', 'placeholder' => 'Anketos pavadinimas']) }}
                                                            {!! $errors->first('title', '<label class="control-label">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group {{ $errors->first('description', 'has-error') }}" style="margin-bottom: 15px;">
                                                        {{ Form::label('description', $Description_txt, [ 'class' => 'col-sm-3']) }}
                                                        <div class="col-sm-12">
                                                            {{ Form::textarea('description', $entry->description, [ 'class' => 'form-control', 'placeholder' => 'Anketos aprašymas', "rows"=>(count(explode(",",$entry->description)) - 1) <= 10 ? (count(explode(",",$entry->description)) - 1) : 10 ]) }}
                                                            {!! $errors->first('description', '<label class="control-label">:message</label>') !!}
                                                        </div>
                                                    </div>

                                                     <?php
                                                        $Language_txt =  app('translator')->getFromJson('frontend/layouts.Lanugage');
                                                        ?>
                                                    <div class="form-group" style="margin-bottom: 15px; padding-bottom: 10px !important;">

                                                        {{ Form::label('language_text', $Language_txt, [ 'class' => 'col-sm-3']) }}
                                                        <div class = "poll-answer">
                                                            <label class="inline-block hint-text  col-sm-12">
                                                            {{Form::select('language', $language_list , $entry -> language, ['class' => 'form-control ','placeholder' => $Language_txt]) }}
                                                            </label>
                                                        </div>
                                                       
                                                    </div>
                                                   <!-- <div class="form-group {{ $errors->first('tags', 'has-error') }}">
                                                        {{ Form::label('tags', 'Žymės', [ 'class' => 'col-sm-3']) }}
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="bookmarks" value="asasas">
                                                            {{ Form::text('tags', $entry->tags, [ 'class' => 'form-control', 'placeholder' => 'Anketos žymės']) }}
                                                            <span class="label label-info">Žymes atskirkite tarpais.</span>                     
                                                            {!! $errors->first('tags', '<br><label class="control-label">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                     <div class="form-group {{ $errors->first('public', 'has-error') }}">
                                                       <div class="col-sm-9 col-sm-offset-3">
                                                            <div class="checkbox">
                                                                <label>
                                                                    {{ Form::checkbox('public', 1, $entry->public) }} Survey in public
                                                                </label>
                                                            </div>
                                                            {!! $errors->first('public', '<label class="control-label">:message</label>') !!}
                                                        </div>
                                                    </div>-->
                                                    <div class="form-group {{ $errors->first('active', 'has-error') }}">
                                                         <div class="form-group">
                                                       <div class="col-sm-9" >
                                                            <div class="checkbox">
                                                                <label>
                                                                    {{ Form::checkbox('respondents', 1, $entry->respondents) }} @lang('frontend/campaigns.Show_results_to_respondents')
                                                                </label>
                                                            </div>
                                                            {!! $errors->first('respondents', '<label class="control-label">:message</label>') !!}
                                                        </div>
                                                       <div class="col-sm-9">
                                                            <!--<div class="checkbox surveychk">
                                                                <label>
                                                                    {{ Form::checkbox('active', 1, $entry->active) }} Survey
                                                                    @if ($entry->active == 1)
                                                                        <span class="text-success"><strong>is ready to launch</strong></span>
                                                                    @else
                                                                        <span class="text-danger"><strong>is not ready to launch</strong></span>
                                                                    @endif
                                                                </label>
                                                            </div>  
                                                            {!! $errors->first('active', '<label class="control-label">:message</label>') !!}
                                                        </div>-->
                                                        
                                                    </div>

                                                   



                                               
                                                     

                                                    <!--<div class="form-group {{ $errors->first('send_email', 'has-error') }}">
                                                       <div class="col-sm-9 col-sm-offset-3">
                                                            <div class="checkbox">
                                                                <label>
                                                                    {{ Form::checkbox('send_email', 1, $entry->send_email) }} Send me replies by email
                                                                </label>
                                                            </div>
                                                            {!! $errors->first('send_email', '<label class="control-label">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group {{ $errors->first('same_computer', 'has-error') }}">
                                                       <div class="col-sm-9 col-sm-offset-3">
                                                            <div class="checkbox">
                                                                <label>
                                                                    {{ Form::checkbox('same_computer', 1, $entry->same_computer) }} Allow multiple responses from one computer
                                                                </label>
                                                            </div>
                                                            {!! $errors->first('same_computer', '<label class="control-label">:message</label>') !!}
                                                        </div>
                                                    </div>-->
                                                </div>
                                                <div class="row">
                                                    <!--<div class="form-group col-sm-6">
                                                        <label for="upload a picture">Upload Image</label>
                                                        <div class="form-group {{ $errors->first('photo', 'has-error') }}" style="margin-bottom: 15px;">
                                                            @if (!empty($entry->photo))
                                                                <span class="col-sm-3" style="display: inline;">
                                                                    <img width="75px;" src="{{ asset($entry->photo) }}" for="photo"/>
                                                                </span>
                                                            @endif
                                                            <div class="col-sm-9" style="display: inline;">
                                                              
                                                                {{ Form::file('photo', [ 'class' => 'form-control ', 'placeholder' => '']) }}
                                                                
                                                                {!! $errors->first('photo', '<br><label class="control-label">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                         <div class="form-group col-sm-12">
                                                            <h3>Vaizdo įrašas</h3>
                                                        </div>
                                                       <div class="form-group col-sm-12 {{ $errors->first('video', 'has-error') }}">
                                                            {{ Form::text('video', $entry->video, [ 'class' => 'form-control', 'placeholder' => 'http://']) }}
                                                            <span class="label label-info"><span class="hidden-sm hidden-xs">Nuoroda į <em>YouTube</em> vaizdo įrašą.</span> Bus rodomas po anketos aprašymu.</span>
                                                            {!! $errors->first('video', '<br><label class="control-label">:message</label>') !!}
                                                        </div>
                                                    </div>-->
                                                    <div class="form-group col-sm-6">
                                                        @if ($entry->active)
                                                        <div class="well">
                                                            <p class="lead">@lang('frontend/campaigns.Direct_link_to_survey')</p>

                                                            <p>
                                                                <a href="{{ route('campaigns.answer', $entry->id) }}" target="_blank">{{ route('campaigns.answer', $entry->id) }}</a>
                                                            </p>

                                                            <p><em>@lang('frontend/campaigns.Link_explain')</em></p>
                                                        </div>
                                                        
                                                         <!-- Modal Code Ranveer -->
                                                        @if ($entry->active)
                                                        <div class="modal fade" id="publicmodal" tabindex="-1" role="dialog" aria-labelledby="public" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" style="color: black;" id="publicmodalTitle">@lang('frontend/campaigns.Promote_survey')</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body" style="color: black;">
                                                                
                                                                <p>
                                                                    You have <strong>{{ $entry->advertise_credits - $entry->used_credits }}</strong> unused credits left and they can be used to promote your survey.
                                                                    You can minimum spend <strong>{{ config('settings.featured_credits') }}</strong> credits.
                                                                    Enter total number of responses you want to receive.
                                                                </p>                
                                                                <div class="form-inline">
                                                                    {{ Form::text('advertise_results', 0, [ 'class' => 'form-control', 'placeholder' => 'Atsakymų kiekis']) }}

                                                                    
                                                                </div>

                                                                {!! $errors->first('advertise_results', '<label class="label label-danger">:message</label>') !!}
                                                                
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('frontend/campaigns.Close')</button>
                                                                <button type="submit" name="btn_public" value="1" class="btn btn-primary">@lang('frontend/campaigns.Promote')</button>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        @else
                                                            <div class="modal fade" id="publicmodal" tabindex="-1" role="dialog" aria-labelledby="public" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" style="color: black;" id="publicmodalTitle">@lang('frontend/campaigns.Promote_survey')</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body" style="color: black;">
                                                                @lang('frontend/campaigns.Click_launch')
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('frontend/campaigns.Close')</button>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        @endif
                                                        <!-- Modal Code Ranveer -->
                                                        <!-- @if ($entry->public)
                                                        <div class="alert alert-{{ ( $errors->first('respondents') ? 'danger' : 'warning') }}">
                                                            <p class="lead">Promote survey</p>
                                                            
                                                            
                                                                <p>
                                                                    You have <strong>{{ $entry->credits }}</strong> unused credits left and they can be used to promote your survey.
                                                                    Price for one response of this survey is <strong>{{ config('settings.featured_credits') }}</strong>.
                                                                    Enter total number of responses you want to receive with our survey promotion tools.
                                                                </p>                
                                                                <div class="form-inline">
                                                                    {{ Form::text('advertise_results', 0, [ 'class' => 'form-control', 'placeholder' => 'Atsakymų kiekis']) }}

                                                                    <button type="submit" class="btn btn-default">Promote</button>
                                                                </div>

                                                                {!! $errors->first('advertise_results', '<label class="label label-danger">:message</label>') !!}
                                                                @if($entry->active)
                                                                <div class="clearfix"></div>
                                                                
                                                                    <hr>
                                                                    <p>
                                                                        Gavote reklamuotų atsakymų: <strong>{{ $entry->used_results }}</strong><br>
                                                                        Panaudota kreditų: <strong>{{ $entry->used_credits }}</strong>
                                                                    </p>
                                                                @endif
                                                            @else
                                                                <p>
                                                                    If you want to promote your survey, make it public.
                                                                </p>
                                                        </div> 
                                                        @endif -->
                                                        @if($entry->active)
                                                                <hr>
                                                                <!-- <p>
                                                                    Gavote reklamuotų atsakymų: <strong>{{ $entry->used_results }}</strong></p>
                                                                    <p>Panaudota kreditų: <strong>{{ $entry->used_credits }}</strong>
                                                                </p> -->
                                                                <!--p>Available Credits for the survey: <strong>{{$entry->advertise_credits - $entry->used_credits}}</strong></p-->
                                                        @endif
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="pull-left">
                                                 <a class="btn btn-primary"  style="margin-left:10px !important; margin-bottom:0px !important;border-color:#e6af2a!important; background-color: #e6af2a!important;"href="{{ route('campaigns.questions', $entry->id) }}">@lang('frontend/campaigns.Add_questions')</a>
<a href="{{ route('campaigns.results', $entry->id) }}" class="btn btn-primary" style="border-color:#16977d!important;; background-color: #16977d!important;">@lang('frontend/campaigns.Result')</a>
                                                
                                            </div>
                                           

                                            <div class="pull-right" style="margin-top:5px!important; margin-right:50px !important;">
                                                <!-- @if ($entry->active)  -->
                                                <!-- data-toggle="modal" data-target="#publicmodal" -->
                                                <button type="button"  name="btn_public" data-toggle="modal" data-target="#publicmodal" id="btn_public" class="btn btn-primary publicbutton" value="1">
                                                </span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 10px;"> @lang('frontend/campaigns.Promote') </font></font></button>
                                                <!-- @endif -->
                                                @if ($entry->active)
                                                <button type="submit" name="btn_launch" id="btn_launch" class="btn btn-danger disablebutton" value="0">
                                                </span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 10px;"> @lang('frontend/campaigns.Disabled')</font></font></button>
                                                @else
                                                <button type="submit" name="btn_launch" id="btn_launch" class="btn btn-primary launchbutton" value="1">
                                                </span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 10px;"> @lang('frontend/campaigns.Launch')</font></font></button>
                                                @endif
                                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> @lang('frontend/campaigns.Save')</font></button>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3>Survey Questions</h3>
                                                <ol class="navbar">
                                                    @foreach($questions as $k => $q)
                                                        <li>{{$q->title}}</li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div role="tabpanel" id="feedTab" class="tab-pane">
                                        <div class="wrap-reset">
                                            <div class="row">
                                                <div class="col-md-7 que">
                                                    <span class="heading">Question-1</span>
                                                    <div class="manipulation">
                                                        <a href="#" class="btn btn-default btn-ef btn-ef-3 btn-ef-3a mb-10" style="color: #000000 !important;"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                                        <a href="#" class="btn btn-default btn-ef btn-ef-3 btn-ef-3a mb-10" style="color: #000000 !important;"><i class="glyphicon glyphicon-trash"></i>Delete</a>
                                                    </div>
                                                    <div class="question">
                                                        How are you?
                                                        <img src="http://art.sdsu.edu/wp-content/uploads/2015/02/default-user-01.png" width="50%">
                                                    </div>
                                                </div>                
                                                <div class="col-md-4">
                                                    <ul class="tabs-menu">
                                                        <li class="active"><a href="#">One Option Choice</a></li>
                                                        <li><a href="#">Dropdown list of answers</a></li>
                                                        <li><a href="#">Multiple Choice Options</a></li>
                                                        <li><a href="#">Line Text Input</a></li>
                                                        <li><a href="#">Textbox For Entering</a></li>
                                                        <li><a href="#">The Matrix</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div role="tabpanel" id="resultTab" class="tab-pane">
                                        <div class="wrap-reset">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                   <div id="columnchart_material" style="width: 600px; height: 300px;"></div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-sm-12">
                                                    <div id="piechart" style="width: 600px; height: 300px;"></div>
                                                </div>
                                            </div>                                      
                                        </div>
                                    </div> -->
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

                @foreach ($entriesnew as $anketa)
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
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>    jQuery(document).ready(function(){ 
      
    jQuery(".launchbutton").click(function(){   
    
    if (jQuery('.surveychk input[type="checkbox"]').prop('checked')==true){
         alert("you have not to be launch this survey");
    return false;
    }
    else{
    return true; 
    }
    }); });</script>
     <script type="text/javascript">
        jQuery(document).ready(function(){
             jQuery('#publicmodal').on('shown.bs.modal', function (e) {
              jQuery('body').removeClass('aside-fixed');
            })
            jQuery('#publicmodal').on('hidden.bs.modal', function (e) {
              jQuery('body').addClass('aside-fixed');
            })
        });
    </script>
</section>
@stop