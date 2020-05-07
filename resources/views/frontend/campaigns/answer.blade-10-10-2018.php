@extends('frontend.layouts.default')

@section('title')Anketos „{{ $entry->title }}“ pildymas - @stop

@section('content')

<style type="text/css">
	.agent-single-fun-fact-content {
	    width: 120px;
    	height: 120px;
	}
	.agent-content-tbl-c {
		font-size: 15px;
	}
	.agent-single-welcome-section > div >div> div> div {
    height: 300px !important;
    width: 100%;
	}
</style>

<!-- Agent Single Welcome Section -->
<section class="agent-single-welcome-section" id="welcome-section" style="background-image: url({{ asset('images/img/single-page-welcome-bg.jpg') }} );">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="agent-content-tbl">
					<div class="agent-content-tbl-c">
						<div class="agent-single-page-content">
							<h2>Answer Questions</h2>
						</div> <!-- .agent-single-page-content END -->
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section> <!-- .agent-single-welcome-section END -->

<br><br>
<!-- Agent Fun Fact Section -->
<section class="agent-about-page-fun-fact ">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<blockquote>
					
					<h2>{{ $entry->title }}</h2>
				</blockquote>
			</div> <!-- .agent-right-side-fun-fact-txt END -->
			<div class="col-md-6">
				<!-- .agent-single-fun-fact END -->
				<!-- <div class="agent-single-fun-fact">
					<div class="agent-single-fun-fact-content">
						<div class="agent-content-tbl-c">
							<i class="fa fa-calendar"></i>							
							<h5>{{ $entry->created_at }}</h5>
						</div>
					</div>
				</div> -->
				<div title="Results" class="agent-single-fun-fact">
					<div class="agent-single-fun-fact-content">
						<div class="agent-content-tbl-c">
							<i class="fa fa-tasks"></i>							
							<h5 title="Results">{{ $entry->results->count() }}</h5>
						</div>
					</div>
				</div> <!-- .agent-single-fun-fact END -->
				<div title="Creator of survey" class="agent-single-fun-fact">
					<div class="agent-single-fun-fact-content">
						<div class="agent-content-tbl-c">
							<i class="fa fa-user"></i>							
							<h5 title="Creator of survey">{{ $entry->user->username }}</h5>
						</div>
					</div>
				</div> 
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-12">
				@if ($entry->description)
					<h3>{{ $entry->description }}</h3>						
				@endif
				
				<div class="form-group"><br>
					{{ Form::open( ['route' => ['campaigns.answer.store', $entry->id], 'class' => 'form', 'files' => true] ) }}
						@if (count($entry->questions) > 0)
							@foreach ($entry->questions as $key => $question)
								<div class="col-md-12">
									<label>1. Lorem ipsum</label>
									@if ($question->type == 'radio')
									<div class="radio">
										@foreach ($question->options as $option)
											
											    <label>
											    	<input type="radio" name="{{ $question->id }}" value="{{ $option->id }}" required="" {{ request()->old($question->id) == $option->id ? 'checked' : NULL }}> {{ $option->title }}
											    </label>
										    							    
										@endforeach
									</div>	
										@if ($question->custom_answer)
											<div class="form-inline">
												<input type="radio" name="{{ $question->id }}" value="custom">

												<input type="text" name="custom-{{ $question->id }}" value="{{ request()->old('custom-' . $question->id) }}" class="form-control"><br>
											</div><br>
										@endif
									@elseif ($question->type == 'select')
									<div class="form-inline">
										<select name="{{ $question->id }}">
											@foreach ($question->options as $option)
												<option value="{{ $option->id }}" {{ request()->old($question->id) == $option->id ? 'selected' : NULL }}>{{ $option->title }}</option>
											@endforeach
										</select><br>
									</div><br>
									@elseif ($question->type == 'check')
										@foreach ($question->options as $option)
										
											<br><input type="checkbox" name="{{ $question->id }}[{{ $option->id }}]" value="1" {{ isset(request()->old($question->id)[$option->id]) ? 'checked' : NULL }}>  {{ $option->title }}
										@endforeach

										@if ($question->custom_answer)
											<br><div class="form-inline">
												<input type="checkbox" name="{{ $question->id }}[custom]" value="custom" {{ isset(request()->old($question->id)['custom']) ? 'checked' : NULL }}> <br> <input type="text" name="custom-{{ $question->id }}" value="{{ request()->old('custom-' . $question->id) }}" class="form-control"><br><br>
											</div><br><br>
										@endif
									@elseif ($question->type == 'string')
										<br><input type="text" name="{{ $question->id }}" value="{{ request()->old($question->id) }}" class="form-control" placeholder=""><br>
									@elseif ($question->type == 'text')
										<textarea name="{{ $question->id }}" cols="30" rows="10" class="form-control">{{ request()->old($question->id) }}</textarea><br>
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
															<input type="radio" name="{{ $question->id }}[{{ $option_y->id }}]" value="{{ $option_x->id }}" {{ isset(request()->old($question->id)[$option_y->id]) && request()->old($question->id)[$option_y->id] == $option_x->id ? 'checked' : NULL }}>
														</td>
													@endforeach
												</tr>
											@endforeach
										</table>
									@endif									
								</div>
							@endforeach
							<div class="col-md-12">
								<input type="Submit" value="Pateikti atsakymus" class="btn btn-warning" style="width: " name="">
							</div>
						@else
							<div class="alert alert-warning">
								No questions.
							</div>
						@endif
					{{ Form::close() }}
				</div>
			</div>
		</div>
		<br />
		<br />
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2 align="center">Advertisement</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop