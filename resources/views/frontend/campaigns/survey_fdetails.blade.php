
@extends('frontend.layouts.default')

@section('title')Sukurti naują anketą - @stop

@section('content')

<style type="text/css">

	

	
</style>
	<!-- Agent Single Welcome Section -->
	<section class="agent-single-welcome-section contact" id="welcome-section" style="background-image: url({{ ('images/img/single-page-welcome-bg.jpg') }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="agent-content-tbl">
						<div class="agent-content-tbl-c">
							<div class="agent-single-page-content">
								<h2>@lang('frontend/campaigns.Submit_survey')</h2>
							</div> <!-- .agent-single-page-content END -->
						</div>
					</div>
				</div>
			</div>
			 <!-- .agent-single-page-breadcumb END -->
		</div>
	</section> <!-- .agent-single-welcome-section END -->
	
	
		<div class="agent-contact-section contact-v-2" style="margin-bottom: 20px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
			

			@if (Session::has('message'))
			<div class="alert alert-success"><i class='fa fa-check'></i> {{ Session::get('message') }}</div>
			@else
			<div class="page-header">
			<blockquote style='border-color:#f0ad4e'>
			<h2>{{ $entry->title }}</h2>
			</blockquote>
			@if ($entry->description)
			<h3 style='word-break: break-all;'>{{ $entry->description }}</h3>						
			@endif
			</div> 
			@endif									

			
				
				<div class="form-group"><br>
					{{ Form::open( ['route' => ['campaigns.answer.store', $entry->id], 'class' => 'form', 'files' => true] ) }}
						@if (count($entry->questions) > 0)
						@php
								$a = 1;
							@endphp
							@foreach ($entry->questions as $key => $question)
								<div class="col-md-12">
									<label class = "question-title"><strong>{{$a++}}. {{ $question->title }}</strong></label>
									@if ($question->type == 'radio')
									<div class="radio" style="margin-left: 10px;">
										@foreach ($question->options as $option)
											
											    <label style="display: block;" class="question-answer-text">
											    	<input type="radio" name="i_{{ $question->id }}" value="{{ $option->id }}" required="" {{ request()->old($question->id) == $option->id ? 'checked' : NULL }}> {{ $option->title }}
											    </label>
										    							    
										@endforeach
									</div>	
										@if ($question->custom_answer)
											<div class="form-inline" style="margin-left: 10px;" class="question-answer-text">
												<input type="radio" name="i_{{ $question->id }}" value="custom">

												<input type="text" name="custom-{{ $question->id }}" value="{{ request()->old('custom-' . $question->id) }}" class="form-control input-lg"><br>
											</div><br>
										@endif
									@elseif ($question->type == 'select')
									<div class="form-inline" style="margin-left: 10px;">
										<select name="i_{{ $question->id }}">
											@foreach ($question->options as $option)
												<option value="{{ $option->id }}" {{ request()->old($question->id) == $option->id ? 'selected' : NULL }}>{{ $option->title }}</option>
											@endforeach
										</select><br>
									</div><br>
									@elseif ($question->type == 'check')
									<div style="margin-left: 10px;" class="question-answer-text">
										@foreach ($question->options as $option)
										
											<input class="question-answer-text" type="checkbox" name="i_{{ $question->id }}[{{ $option->id }}]" value="1" {{ isset(request()->old($question->id)[$option->id]) ? 'checked' : NULL }}>  {{ $option->title }}
											<br>
										@endforeach

										@if ($question->custom_answer)
											<div class="form-inline question-answer-text">
												<input class="question-answer-text" type="checkbox" name="i_{{ $question->id }}[custom]" value="custom" {{ isset(request()->old($question->id)['custom']) ? 'checked' : NULL }}> <br> <input type="text" name="custom-{{ $question->id }}" value="{{ request()->old('custom-' . $question->id) }}" class="form-control"><br><br>
											</div><br><br><br>
										@endif
											<br>
									</div>
									@elseif ($question->type == 'string')
										<br><input style="margin-left: 10px;" type="text" name="i_{{ $question->id }}" value="{{ request()->old($question->id) }}" class="form-control input-lg" placeholder=""><br>
									@elseif ($question->type == 'text')
										<textarea style="margin-left: 10px;" name="i_{{ $question->id }}" cols="30" rows="10" class="form-control input-lg">{{ request()->old($question->id) }}</textarea><br>
									@elseif ($question->type == 'matrix')
										<table style="margin-left: 10px;" class="table table-condensed table-bordered">
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
															<input type="radio" name="i_{{ $question->id }}[{{ $option_y->id }}]" value="{{ $option_x->id }}" {{ isset(request()->old($question->id)[$option_y->id]) && request()->old($question->id)[$option_y->id] == $option_x->id ? 'checked' : NULL }}>
														</td>
													@endforeach
												</tr>
											@endforeach
										</table>
									@endif									
								</div>
							@endforeach
							<div class="col-md-12">
								<input type="Submit" value="Submit" class="btn btn-primary btn-lg" style="width: " name="">
							</div>
						@else
							<div class="alert alert-warning">
								@lang('frontend/campaigns.No_questions')
							</div>
						@endif
					{{ Form::close() }}
				</div>
				
							
						</div>
					</div> <!-- .agent-contact-us-v-2 END -->
				</div>
			</div>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107521779-2"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-107521779-2');
</script>

@stop