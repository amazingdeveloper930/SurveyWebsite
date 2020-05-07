@extends('frontend.layouts.defaultport')

@section('title')Anketos „{{ $entry->title }}“ rezultatai - @stop

@section('scripts')
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
@stop
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@section('content')

<section id="content">
    <div class="page page-profile">
        <div class="pageheader">
            <h2>{{ $entry->title }} survey</h2>
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
										Anketa sėkmingai atnaujinta.
									</div>
								@endif
								@if (count($entry->results))
									<div class="alert alert-danger">
										<h4>Klausimų redaguoti negalima!</h4>
										<p>Jūsų anketa turi atsakymų, todėl klausimų koreguoti negalima.</p>
										<p><a href="{{ route('campaigns.deactivate', $entry->id) }}" class="btn btn-danger">Ištrinti rezultatus ir deaktyvuoti anketą</a></p>
									</div>
								@elseif ($entry->active)
									<div class="alert alert-danger">
										<h4>Klausimų redaguoti negalima!</h4>
										<p>Jūsų anketa yra pažymėta kaip <strong>aktyvi</strong>, todėl klausimų koreguoti negalima.</p>
										<p><a href="{{ route('campaigns.deactivate', $entry->id) }}" class="btn btn-danger">Deaktyvuoti anketą</a></p>
									</div>
								@endif
                                <div class="tab-content">                     
                                    <div role="tabpanel" id="resultTab" class="tab-pane active">
                                        <div class="wrap-reset">
                                        @if (count($entry->questions()->whereNotIn('id', $bad_questions)->get()))
                                            @foreach ($entry->questions()->whereNotIn('id', $bad_questions)->get() as $question)
                                                @if (in_array($question->type, ['radio', 'select', 'check']))
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div id="piechart-{{$question->id}}" style="width: 600px; height: 300px;"></div>
                                                            <script type="text/javascript">
                                                                google.charts.load('current', {'packages':['corechart']});
                                                                google.charts.setOnLoadCallback(drawChart);

                                                                function drawChart() {

                                                                    var data = google.visualization.arrayToDataTable([
                                                                    ['Option', 'Count'],
                                                                    @foreach ($question->options as $option)
                                                                        ['{{ $option->title }}', {{ $question->answers()->whereNotIn('result_id', $bad_results)->where('option_id', '=', $option->id)->count() }}],
                                                                    @endforeach
                                                                    ['Kitas variantas', {{ $question->answers()->whereNotIn('result_id', $bad_results)->where('type', '=', 'custom')->count() }}],
                                                                ]);

                                                                var options = {//'title':'How Much Pizza I Ate Last Night',
                                                                             'width':600,
                                                                             'height':300};
                                                                var chart = new google.visualization.PieChart(document.getElementById('piechart-{{$question->id}}'));
                                                                chart.draw(data, options);
                                                                }
                                                            </script>
                                                        </div>
                                                    </div> 
                                                @elseif ($question->type == 'matrix')
                                                    <div class="row">                        
                                                        <div class="col-sm-12">
                                                           <div id="columnchart_material-{{$question->id}}" style="width: 600px; height: 300px;"></div>
                                                           <script type="text/javascript">
                                                                google.charts.load('current', {'packages':['bar']});
                                                                google.charts.setOnLoadCallback(drawChart);

                                                                function drawChart() {
                                                                var data = google.visualization.arrayToDataTable([
                                                                  [
                                                                    'Option_x',
                                                                    @foreach ($question->options()->where('matrix', '=', 'x')->get() as $option_x)
                                                                        '{{ $option_x->title }}',
                                                                    @endforeach
                                                                    { role: 'annotation' }
                                                                ],

                                                                @foreach ($question->options()->where('matrix', '=', 'y')->get() as $option_y)
                                                                    [
                                                                        '{{ $option_y->title }}',
                                                                        @foreach ($question->options()->where('matrix', '=', 'x')->get() as $option_x)
                                                                            {{ $question->answers()->whereNotIn('result_id', $bad_results)->where('option_id', '=', $option_y->id)->where('value', '=', $option_x->id)->count() }},
                                                                        @endforeach
                                                                        '',
                                                                    ],
                                                                @endforeach
                                                                ]);

                                                                var options = {
                                                                  chart: {
                                                                    title: 'Company Performance',
                                                                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                                                                  }
                                                                };
                                                                  var options = {//'title':'How Much Pizza I Ate Last Night',
                                                                             'width':600,
                                                                             'height':300};
                                                                var chart = new google.charts.Bar(document.getElementById('columnchart_material-{{$question->id}}'));
                                                                chart.draw(data, google.charts.Bar.convertOptions(options));
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>                                       
                                                @elseif (in_array($question->type, ['string', 'text']))
                                                    @foreach ($question->answers()->whereNotIn('result_id', $bad_results)->get() as $answer)
                                                        <div class="label label-default">{{ $answer->value }}</div><br>
                                                    @endforeach
                                                @endif 
                                            @endforeach
                                        @else
                                            <div class="alert alert-warning">
                                                Klausimų nėra.
                                            </div>
                                        @endif                                    
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
                        
                        
                        <div class="tile-footer" >
                                <p><a href="{{ route('campaigns.answers', $anketa->id) }}" class="btn-rounded-10 btn btn-default  btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="fa fa-bars"></i> {{ count($anketa->results) }}</a>
                                <a href="#" class="btn btn-default btn-rounded-10  btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="fa fa-user"></i> {{ $anketa->user->username }}</a>
                                <a href="#" class="btn-rounded-10 btn btn-default btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="glyphicon glyphicon-calendar"></i> {{ $anketa->created_at }}</a></p>
                        </div>
                    </section>
                </div>
                @endforeach
            </div>
            </div>
        </div>        
    </div>    
</section>
@stop