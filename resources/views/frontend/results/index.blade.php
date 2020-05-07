@extends('frontend.layouts.defaultcreate')
@section('title')Anketos „{{ $entry->title }}“ rezultatai - @stop

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@section('content')
<!-- Agent Single Welcome Section -->

<!-- Agent Fun Fact Section -->




<section id="content">
   <div class="page page-profile">
      <div class="pagecontent">
         <div class="row">
            <div class="col-md-8">
	@if(Session::has('message'))	
	<div class="alert alert-success"> 
  <strong>Success!</strong> {{ Session::get('message') }}
</div>
@endif

               <section class="tile tile-simple">
                  <div class="tile-body p-0">
                     <div role="tabpanel">
                        <div class="tab-content">
                           <div role="tabpanel" class="tab-pane active" id="settingsTab">
                              <div class="wrap-reset">
                                 <div class="page-header">
                                    <blockquote style='border-color:#f0ad4e'>
									<h3>Results</h3>
                                       <h2>{{ $entry->title }}</h2>
                                    </blockquote>
                                    <div class="row">
								 <div class="col-md-4">
				 <div class="col-md-4">
													
							<h5><i class="fa fa-tasks"></i> {{ count($entry->results) }}</h5>
							</div>
						
				
					 <div class="col-md-4">
											
							<h5><i class="fa fa-user"></i> {{ count($entry->username) }}</h5>
							</div>
							
								 <div class="col-md-4">
												
							<h5><i class="fa fa-user"></i> {{ count($entry->created_at) }}</h5>
							</div>
				
						</div>
						
						</div>
                                 </div>
								     
								 
                                 <div class="row">
                                    <div class="col-md-12">
									
									
									<div class="container">		
		<div class="row">
		@if (count($entry->questions) > 0)
			@foreach ($entry->questions as $question)
			<h2>{{ $question->title }}</h2>
			@if (in_array($question->type, ['radio', 'select', 'check']))
			<div class="col-md-12">
				<div id="piechart_3d-{{ $question->id }}"></div>
				<script type="text/javascript">
					google.charts.load("current", {packages:["corechart"]});
					google.charts.setOnLoadCallback(drawChart);
					function drawChart() {
					    var data = google.visualization.arrayToDataTable([
					    	['Option', 'Count'],
					    	@foreach ($question->options as $option)
								['{{ $option->title }}', {{ $question->answers()->where('option_id', $option->id)->count() }}],
							@endforeach
					    	['Kitas variantas', {{ $question->answers()->where('type', '=', 'custom')->count() }}],	      
					    ]);

					    var options = {
						    width: 600,
							height: 400,
							colors: ['#ffbc1b','#E6AF2A'],
						    is3D: true
					    };
					    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d-{{ $question->id }}'));
					    chart.draw(data, options);
					}
				</script>
			</div>
			@elseif ($question->type == 'matrix')
			<div class="col-md-12">
				<div id="columnchart_values"></div>
				<script type="text/javascript">
					google.charts.load("current", {packages:['corechart']});
					google.charts.setOnLoadCallback(drawChart);
					function drawChart() {
					  /*var data = google.visualization.arrayToDataTable([
					    ["Element", "Visitations", { role: "style" } ],
					    ["Yes", 2, "#ffbc1b"],
					    ["No", 1, "#E6AF2A"],
					  ]);*/

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
										{{ $question->answers()->where('option_id', '=', $option_y->id)->where('value', '=', $option_x->id)->count() }},
									@endforeach

									'',
								],
							@endforeach
						]);

						var view = new google.visualization.DataView(data);
					  	view.setColumns([0, 1,
					    { calc: "stringify",
					        sourceColumn: 1,
					        type: "string",
					        role: "annotation" },
					     2]);

					  var options = {
					   //title: "Total Yes & No.",
					    width: 600,
					    height: 400,
					    bar: {groupWidth: "90%"},
					    legend: { position: "none" },
					  };
					  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
					  chart.draw(view, options);
					}
				</script>
			</div>
			@elseif (in_array($question->type, ['string', 'text']))
				@foreach ($question->answers as $answer)
					<div class="label label-default">{{ $answer->value }}</div><br>
				@endforeach
			@endif
			@endforeach
		@endif
		</div>
	</div>
</div>
									
									
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
				  
				  <div class='col-md-4'>
				        <div class="well col-sm-12" style="overflow-y: auto; height: 660px;min-width: 120px!important;">
                        <h4 style="color: grey; text-align: center;">Answer these surveys - get responses to your questions</h4>
                        

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
                        
                        <!-- Disabled as per the request to make it similar to other views -->
                        <!-- <div class="tile-footer" >
                                <p><a href="{{ route('campaigns.answers', $anketa->id) }}" class="btn-rounded-10 btn btn-default  btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="fa fa-bars"></i> 
                                <a href="#" class="btn btn-default btn-rounded-10  btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  
                                <a href="#" class="btn-rounded-10 btn btn-default btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="glyphicon glyphicon-calendar"></i> {{ $anketa->created_at }}</a></p>
                        </div> -->
                    </section>
                </div>
                @endforeach
            </div>
				  </div>
				   
               </section>
            </div>
         </div>
      </div>
   </div>
</section>


							
							
							
			
		
@stop