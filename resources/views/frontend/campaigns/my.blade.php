@extends('frontend.layouts.defaultprofile')

@section('title')Mano anketos - @stop


@section('content')
<style type="text/css">
         .blink{
        font-size: 240px;
        color: rgb (0, 137, 226);

        animation: blink 1s infinite;
     }

     @keyframes blink{
        0%{opacity: 1;}
        75%{opacity: 1;}
        76%{ opacity: 0;}
        100%{opacity: 0;}
     }
     .nostyleform{
        display: inline-block;
     }
     .nostyleform #btn_launch {
     width: 70px; 
     font-size: 15px;
 }

 .inactivesurvey .btn-danger, .inactivesurvey .btn-success, .inactivesurvey .btn-warning, .btn-gray{
    background-color: gray !important;
    color: white !important;
 }

.post-link {
    text-decoration: none;
    width: 40%;
    margin:10px 30%;
    display: block;
}

.fb-share-button, .tw-share-button {

    border-radius: 3px;
    font-weight: 600;
    padding: 5px 8px;
    display: inline-block;
    position: static;
    width: 100%;
}
.fb-share-button span, .tw-share-button span {
    margin-left: 20px;
}
.fb-share-button {
    background: #3b5998;
}
.fb-share-button:hover {
    cursor: pointer;
    background: #213A6F;
}

.tw-share-button {
    background: #1dcaff;
}

.tw-share-button:hover {
    cursor: pointer;
    background: #00aced;
}

.fb-share-button span, .tw-share-button span {
    vertical-align: middle;
    color: white;
    font-size: 14px;
    padding: 0 3px
}
.post-link i {
    color: white !important;
}
</style>
<section id="content">
    <div class="page page-dashboard">
        <div class="row" style="clear: both;"></div>
        @if (session('created'))
        <div class="row">
            <div class="col-md-12 alert login-success">
                @lang('frontend/campaigns.Survey_added_successfully')
            </div>
        </div>
        @endif

        @if (session('copied'))
        <div class="row">
            <div class="col-md-12 alert login-success">
                @lang('frontend/campaigns.Copy_survey_created')
            </div>
        </div>
        @endif

        @if (session('deleted'))
        <div class="row">
            <div class="col-md-12 alert login-success">
                @lang('frontend/campaigns.Survey_deleted_successfully')
            </div>
        </div>
        @endif


        <!-- OK 4 -->
        <div class="row">
            <div class="col-md-8">
                <section class="tile">
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font">@lang('frontend/campaigns.My_survey')</h1>
                    </div>
                    <div class="tile-body table-custom">
                        @if (session('message'))
                            <div class="alert alert-info">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="table-responsive">
                            @if (count($entries) > 0)
                            <table class="table table-bordered table-striped" id="project-progress" style="color: black">
                                <thead>
                                    <tr>
                                        <th>@lang('frontend/campaigns.Suvey_title')</th>
                                        <th>@lang('frontend/campaigns.Date')</th>
                                        <th>@lang('frontend/campaigns.Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($entries as $entry)
                                <tr>
                                    <td><a title="{{ $entry->title }}" href="{{ route('campaigns.edit', $entry->id) }}">{{ $entry->title }}</a></td>
                                    <td>{{ $entry->created_at }}</td>
                                    @if($entry->active)
                                    <td class="social-btn btn-stacked" title="{{($entry->active) ? 'Active Survey' : 'Inactive Survey'}}">
                                    @else
                                    <td class="social-btn btn-stacked inactivesurvey" title="{{($entry->active) ? 'Active Survey' : 'Inactive Survey'}}"
                                        style="min-width: 318px;">
                                    @endif
                                        <!-- <a title="Survey management" href="{{ route('campaigns.edit', $entry->id) }}" class="btn btn-primary btn-lg"><i class="fa fa-asterisk"></i></a> -->

                                        <!-- Test -->  
                                        <div class="btn-group pull-right">
                                          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            ...
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right">
                                            <a title="Results" href="{{ route('campaigns.results', $entry->id) }}" class="btn btn-success btn-lg dropdown-item"><i class="fa fa-eye"></i></a>
                                            <a title="Delete" href="{{ route('campaigns.destroy', $entry->id) }}" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-trash dropdown-item"></i></a>
                                            
                                          </div>
                                        </div>
                                        @if ($entry->shared == 0)
                                        <button title="Share" data-toggle="modal" data-target="#sharemodal{{$entry->id}}" class="btn btn-warning btn-lg"><i class="fa fa-facebook"></i></button>
                                        <div class="modal fade" id="sharemodal{{$entry->id}}" tabindex="-1" role="dialog" aria-labelledby="public" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color: black;" id="publicmodalTitle">Share survey</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -10px;">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black;">
                                                        <p>
                                                            @lang('frontend/campaigns.Post_to_facebook_explain_1')<br/>
                                                            @lang('frontend/campaigns.Post_to_facebook_explain_2')
                                                        </p>
                                                        <div class = "post-link-content">
                                                            <a href="http://www.facebook.com/dialog/feed?app_id=211155679642927&link=https://pollanimal.com/survey/{{$entry->id}}&message=hello : {{$entry->title}} \n how are you : {{$entry->description}} \n survey id : {{$entry->id}}&redirect_uri=https://pollanimal.com/facebookreport/{{$entry->id}}" title="share to facebook" class="post-link facebook-post-link" onclick="$('#sharemodal{{$entry->id}}').modal('hide')">
                                                            
                                                                <div class="fb-share-button">
                                                                    <i class="fa fa-facebook"></i>
                                                                    <span>@lang('frontend/campaigns.Post_facebook')</span>
                                                                </div>
                                                            </a>
                                                            
                                                        </div>
                                                       
                                                        <div class="button-stacked pull-right" style="margin-top: -20px">
                                                            <button type="button" class="btn sq-buttons btn-secondary" data-dismiss="modal">@lang('frontend/campaigns.Close')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <span class="btn btn-gray btn-lg"><i class="fa fa-facebook"></i></span>
                                        @endif
                                        <!-- End -->

                                        @if($entry->active)
                                        <button title="Promote" data-toggle="modal" data-target="#publicmodal{{$entry->id}}" class="btn btn-info btn-lg"><i class="glyphicon glyphicon-share"></i></button>
                                        <div class="modal fade" id="publicmodal{{$entry->id}}" tabindex="-1" role="dialog" aria-labelledby="public" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" style="color: black;" id="publicmodalTitle">Promote survey</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body" style="color: black;">
                                                 {{ Form::open( ['route' => ['campaigns.update', $entry->id], 'class' => 'profile-settings', 'files' => true] ) }}
                                                <p>
                                                    You have <strong>{{$credits}}</strong> unused credits left and they can be used to promote your survey.
                                                    You can minimum spend <strong>{{ config('settings.featured_credits') }}</strong> credits.
                                                    Enter total number of responses you want to receive.
                                                </p>
                                                <!-- Restrict user to add credits to the sruvery if he/she has not credits left -->
                                                @if($credits > 0)
                                                <div class="form-inline">
                                                    {{ Form::text('advertise_results', 0, [ 'class' => 'form-control', 'placeholder' => 'Atsakymų kiekis']) }}
                                                     {{ Form::hidden('title', $entry->title, []) }}
                                                      {{ Form::hidden('description', $entry->description, []) }}
                                                </div>
                                                @endif

                                                {!! $errors->first('advertise_results', '<label class="label label-danger">:message</label>') !!}
                                                 <div class="button-stacked pull-right" style="margin-top: -15px">
                                                     <button type="button" class="btn sq-buttons btn-secondary" data-dismiss="modal">@lang('frontend/campaigns.Close')</button>
                                                <!-- No credits remove submit button -->
                                                @if($credits > 0)
                                                <button type="submit" name="btn_public" value="1" class="btn btn-primary">@lang('frontend/campaigns.Promote')</button>
                                                @endif
                                                 </div>
                                                {{ Form::close() }}
                                              </div>
                                              <!-- <div class="modal-footer">

                                              </div> -->
                                            </div>
                                          </div>
                                        </div>
                                        <a style="line-height: ;vertical-align: middle;padding: 5px 1px!important;" class="bg-success pull-right" title="Active Survey">&nbsp;</a>
                                        @else
                                        {{ Form::open( ['route' => ['campaigns.update', $entry->id], 'class' => 'nostyleform' ] ) }}
                                        <input type="hidden" name="title" value="{{$entry->title}}" />
                                        <input type="hidden" name="description" value="{{$entry->description}}"/>
                                        <button type="submit" name="btn_launch" id="btn_launch" class="btn btn-primary blink btn-lg" value="1"><i class="fa fa-rocket" title="Click to launch survey public"></i></button>
                                        {{ Form::close() }}
                                            <a style="line-height: ;vertical-align: middle;padding: 5px 1px!important;" class="bg-danger pull-right" title="Inactive Survey">&nbsp;</a>
                                        @endif
                                        

                                        <span class="badge bg-info pull-right ml-2 mr-5" title="number of promoted answers ordered by you">{{$entry->advertise_credits}}</span>
                                        <span class="badge bg-success pull-right ml-2 mr-5" title="Total Respondents">Total {{$entry->totalrespondents}}</span>
                                        <span class="badge bg-primary pull-right ml-2 mr-5" title="New Respondents since last login">New {{$entry->newrespondents}}</span>


                                        <!-- <span class="bg-success"><i class=""></i></span> -->

                                        <!-- btn-border btn-rounded-20 btn-ef btn-ef-4 btn-ef-4d mb-10 -->
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                            <!-- <div class="alert alert-warning">
                                <h4>Empty!</h4>
                                <a href="{{ route('campaigns.create') }}">Add</a> now.

                            </div> -->
                            <ul>
                                <li>@lang('frontend/campaigns.Create_survey_step_1')</li>
                                <li>@lang('frontend/campaigns.Create_survey_step_2')</li>
                                <li>@lang('frontend/campaigns.Create_survey_step_3')</li>
                                <li>@lang('frontend/campaigns.Create_survey_step_4')</li>
                                <li>@lang('frontend/campaigns.Create_survey_step_5')</li>
                            </ul>

                            @endif
                            <div class="btn-block-create-new-survey"><a href="{{ route('campaigns.create') }}" class="btn btn-primary mb-10 btn-cns"><i class="fa fa-plus">&nbsp;</i>@lang('frontend/campaigns.Create_new_survey')</a></div>

                        </div>


                    </div>
                </section>
            </div>

              <div class="col-md-4">

                    <div class="well col-sm-12" style="overflow-y: auto; height: 660px;min-width: 120px!important;">
                        <h4 style="color: grey; text-align: center;">@lang('frontend/common.Answer_survey')</h4>


                        @php
                    $a = 0
                @endphp

                @foreach ($anketos as $anketa)
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
        </div><!-- OK 4 -->
<!--         <section class="tile">
            <div class="tile-header dvd dvd-btm advertise">
                @include('frontend.campaigns.advertisements')
            </div>
        </section> -->
    </div>
</section>
@sto
<script data-cfasync="false" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
        jQuery(document).ready(function(){
             jQuery('.modal').on('shown.bs.modal', function (e) {
              jQuery('body').removeClass('aside-fixed');
            })
            jQuery('.modal').on('hidden.bs.modal', function (e) {
              jQuery('body').addClass('aside-fixed');
            })


        });
    </script>
    <script data-cfasync="false" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script data-cfasync="false" src="{{ asset('js/share.js') }}"></script>
