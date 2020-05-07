
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
                                        	
									
	@if (Session::has('message'))
   <div class="alert alert-success"><i class='fa fa-check'></i> {{ Session::get('message') }}</div>
<a href="{{ URL::previous() }}"><i class='fa fa-arrow-left'></i> Go Back</a>
@else
			<div class="page-header">
									<blockquote style='border-color:#f0ad4e'>
									<h2>{{ $entry->title }}</h2>
									</blockquote>
									@if ($entry->description)
									<h3 style='word-break: break-all;'>{{ $entry->description }}</h3>						
									@endif
									</div>    

                                                	<div class="row">
			<div class="col-md-12">
			
				
				<div class="form-group"><br>
					{{ Form::open( ['route' => ['campaigns.answer.store', $entry->id], 'class' => 'form', 'files' => true] ) }}
						@if (count($entry->questions) > 0)
							@php
							$a = 1;
							@endphp
							@foreach ($entry->questions as $key => $question)
								<div class="col-md-12">
									<label><strong>{{$a++}}. {{ $question->title }}</strong></label>
									@if ($question->type == 'radio')
									<div class="radio">
										@foreach ($question->options as $option)
											
											    <label>
											    	<input type="radio" name="i_{{ $question->id }}" value="{{ $option->id }}" required="" {{ request()->old($question->id) == $option->id ? 'checked' : NULL }}> {{ $option->title }}
											    </label>
										    							    
										@endforeach
									</div>	
										@if ($question->custom_answer)
											<div class="form-inline">
												<input type="radio" name="i_{{ $question->id }}" value="custom">

												<input type="text" name="custom-{{ $question->id }}" value="{{ request()->old('custom-' . $question->id) }}" class="form-control"><br>
											</div><br>
										@endif
									@elseif ($question->type == 'select')
									<div class="form-inline">
										<select name="i_{{ $question->id }}">
											@foreach ($question->options as $option)
												<option value="{{ $option->id }}" {{ request()->old($question->id) == $option->id ? 'selected' : NULL }}>{{ $option->title }}</option>
											@endforeach
										</select><br>
									</div><br>
									@elseif ($question->type == 'check')
										@foreach ($question->options as $option)
										
											<br><input type="checkbox" name="i_{{ $question->id }}[{{ $option->id }}]" value="1" {{ isset(request()->old($question->id)[$option->id]) ? 'checked' : NULL }}>  {{ $option->title }}
										@endforeach

										@if ($question->custom_answer)
											<br><div class="form-inline">
												<input type="checkbox" name="i_{{ $question->id }}[custom]" value="custom" {{ isset(request()->old($question->id)['custom']) ? 'checked' : NULL }}> <br> <input type="text" name="custom-{{ $question->id }}" value="{{ request()->old('custom-' . $question->id) }}" class="form-control"><br><br>
											</div><br><br>
										@endif
									@elseif ($question->type == 'string')
										<br><input type="text" name="i_{{ $question->id }}" value="{{ request()->old($question->id) }}" class="form-control" placeholder=""><br>
									@elseif ($question->type == 'text')
										<textarea name="i_{{ $question->id }}" cols="30" rows="10" class="form-control">{{ request()->old($question->id) }}</textarea><br>
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
								<input type="Submit" value="Submit" class="btn btn-warning" style="width: " name="">
							</div>
						@else
							<div class="alert alert-warning">
								Klausimų nėra.
							</div>
						@endif
					{{ Form::close() }}
				</div>
			</div>
		</div>

@endif						
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