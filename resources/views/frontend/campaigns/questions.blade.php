@extends('frontend.layouts.defaultport')

@section('title')Anketos „{{ $entry->title }}“ klausimai - @stop

<!-- @section('scripts')
    <script type="text/javascript" src="{{ asset('Frontend') }}"></script>
@stop -->


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
                                @if (count($entry->results))
                                    <div class="alert alert-danger">
                                        <h4>@lang('frontend/campaigns.Cant_edit')</h4>

                                        <p>
                                            @lang('frontend/campaigns.Survey_has_answers')
                                        </p>

                                        <p>
                                            <a href="{{ route('campaigns.deactivate', $entry->id) }}" class="btn btn-danger">Delete results and deactivate survey.</a>
                                        </p>
                                    </div>
                                @elseif ($entry->active)
                                    <div class="alert alert-danger">
                                        <h4>@lang('frontend/campaigns.Cant_edit')</h4>

                                        <p>
                                            @lang('frontend/campaigns.Survey_actived')
                                        </p>

                                        <p>
                                            <a href="{{ route('campaigns.deactivate', $entry->id) }}" class="btn btn-danger">@lang('frontend/campaigns.Deactive_survey')</a>
                                        </p>
                                    </div>
                                @endif
                                <div class="tab-content">
                                    <div role="tabpanel" id="feedTab">
                                        <div class="wrap-reset">
                                            <div class="row" style="margin-right: 0px;">
                                            @if (count($entry->questions))
                                                @php
                                                    $a = 1;
                                                @endphp
                                                    
                                                <div class="col-md-12 que">
                                                @foreach ($entry->questions as $question)
                                                    <span class="heading">Question-{{$a++}}</span>
                                                    @if($entry->active == 0)
                                                    <div class="manipulation">
                                                        <a title="Edit" href="{{ route('campaigns.questions.edit', [$entry->id, $question->id]) }}" class="btn btn-default btn-ef btn-ef-3 btn-ef-3a mb-10" style="color: #000000 !important; padding: 15px 20px !important;"><i class="glyphicon glyphicon-pencil"></i> <i style="display: none;">Edit</i></a>
                                                        <a title="Delete" href="{{ route('campaigns.questions.destroy', [$entry->id, $question->id]) }}" class="btn btn-default btn-ef btn-ef-3 btn-ef-3a mb-10" style="color: #000000 !important; padding: 15px 20px !important;"><i class="glyphicon glyphicon-trash"></i><i style="display: none;">Delete</i></a>
                                                    </div>
                                                    @endif
                                                    <div class="question">
                                                        {{ $question->title }}
                                                        @if ($question->photo)
                                                        <img src="{{ asset($question->photo) }}" alt="{{ $question->title }}" width="50%">
                                                        @endif
                                                    </div>                                                    
                                                    <!-- <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            @if ($question->type == 'radio')
                                                                @foreach ($question->options as $option)
                                                                    <input disabled type="radio" name="question-{{ $question->id }}"> {{ $option->title }}<br>
                                                                @endforeach

                                                                @if ($question->custom_answer)
                                                                    <div class="form-inline">
                                                                        <input disabled type="radio" name="question-{{ $question->id }}"> <input disabled type="text" class="form-control" placeholder="Kitas variantas"><br>
                                                                    </div>
                                                                @endif
                                                            @elseif ($question->type == 'select')
                                                                <select disabled>
                                                                    @foreach ($question->options as $option)
                                                                        <option>{{ $option->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            @elseif ($question->type == 'check')
                                                                @foreach ($question->options as $option)
                                                                    <input disabled type="checkbox" name="question-{{ $question->id }}"> {{ $option->title }}<br>
                                                                @endforeach

                                                                @if ($question->custom_answer)
                                                                    <div class="form-inline">
                                                                        <input disabled type="checkbox" name="question-{{ $question->id }}"> <input disabled type="text" class="form-control" placeholder="Kitas variantas"><br>
                                                                    </div>
                                                                @endif
                                                            @elseif ($question->type == 'string')
                                                                <input disabled type="text" class="form-control" placeholder="">
                                                            @elseif ($question->type == 'text')
                                                                <textarea disabled name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                            @elseif ($question->type == 'matrix')
                                                                <table class="table table-condensed table-bordered">
                                                                    <tr>
                                                                        <th class="active"></th>

                                                                        @foreach ($question->options()->where('matrix', '=', 'x')->get() as $option_x)
                                                                            <th class="text-center active">{{ $option_x->title }}</th>
                                                                        @endforeach
                                                                    </tr>

                                                                    @foreach ($question->options()->where('matrix', '=', 'y')->get() as $option_y)
                                                                        <tr>
                                                                            <th class="text-center active">{{ $option_y->title }}</th>

                                                                            @foreach ($question->options()->where('matrix', '=', 'x')->get() as $option_x)
                                                                                <td class="text-center">
                                                                                    <input type="radio" disabled name="question-{{ $option_y->id }}" value="{{ $option_x->id }}">
                                                                                </td>
                                                                            @endforeach
                                                                        </tr>
                                                                    @endforeach
                                                                </table>
                                                            @endif
                                                        </div>
                                                    </div> -->
                                                @endforeach
                                                </div>
                                            @else
                                            <div class="col-md-12 que">
                                                <div class="alert alert-warning">
                                                    @lang('frontend/campaigns.No_questions')
                                                </div>
                                            </div>
                                            @endif

                                            <!-- Add Question Button -->
                                            <div class="col-md-12 add_question_btn_block">
                                                
                                                <div class="dropdown btn">
  <button class="dropbtn btn">@lang('frontend/campaigns.Add_questions')</button>
  <div class="dropdown-content">
    <a href="{{ route('campaigns.questions.add', [$entry->id, 'radio']) }}">@lang('frontend/campaigns.Single_choice')</a>
    <a href="{{ route('campaigns.questions.add', [$entry->id, 'select']) }}">@lang('frontend/campaigns.Dropdown')</a>
    <a href="{{ route('campaigns.questions.add', [$entry->id, 'check']) }}">@lang('frontend/campaigns.Multiple_choice')</a>
    <a href="{{ route('campaigns.questions.add', [$entry->id, 'string']) }}">@lang('frontend/campaigns.Single_textbox')</a>
    <a href="{{ route('campaigns.questions.add', [$entry->id, 'text']) }}">@lang('frontend/campaigns.Comment_box')</a>
    <a href="{{ route('campaigns.questions.add', [$entry->id, 'matrix']) }}">@lang('frontend/campaigns.Matrix')</a>
  </div>
</div> 
{{ Form::open( ['route' => ['campaigns.update', $entry->id], 'class' => 'btn']) }}
{{ Form::hidden('title', $entry->title, []) }}
{{ Form::hidden('description', $entry->description, []) }}
@if($entry->active)
<button type="submit" name="btn_launch" id="btn_launch" class="btn btn-danger" value="0">
                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@lang('frontend/campaigns.Disable')</font></font></button>
@else
<button type="submit" name="btn_launch" id="btn_launch" class="btn btn-primary launchbutton" value="1">
                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@lang('frontend/campaigns.Launch')</font></font></button>
@endif                                                                                        
  {{ Form::close() }}
                                            </div>
                                            <!-- END Add Question Button -->
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                                                                 
                    </section>

                    <div class="questionsblock well text-center">
                        <!-- @include('frontend.campaigns.advertisements') -->
                    </div>
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
</section>
@stop