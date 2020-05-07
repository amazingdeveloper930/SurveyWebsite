@extends('frontend.layouts.default')
@section('title')Anketos „{{ $entry->title }}“ rezultatai - @stop

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@section('content')

	<section class="agent-single-welcome-section contact" id="welcome-section" style="background-image: url({{ ('images/img/single-page-welcome-bg.jpg') }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="agent-content-tbl">
						<div class="agent-content-tbl-c">
							<div class="agent-single-page-content">
								<h2>Results</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section> 
	
	
	<div class="agent-contact-section contact-v-2" style="margin-bottom: 20px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				
				@if (Session::has('message'))
			<div class="alert alert-success"><i class='fa fa-check'></i> {{ Session::get('message') }}</div>
			@else
			<div class="page-header">
			<blockquote style='border-color:#f0ad4e'>
			<h3>Results</h3>
			<h2>{{ $entry->title }}</h2>
			</blockquote>
			@if ($entry->description)
			<h3 style='word-break: break-all;'>{{ $entry->description }}</h3>						
			@endif
			
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
			@endif		
			
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

			
				
				
				<!-- col wrpperend -->
				</div>
			</div>
		</div>
	</div>



							
							
							
			
		
@stop