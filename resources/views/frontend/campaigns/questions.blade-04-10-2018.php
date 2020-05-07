@extends('frontend.layouts.defaultport')

@section('title')Anketos „{{ $entry->title }}“ klausimai - @stop

<!-- @section('scripts')
	<script type="text/javascript" src="{{ asset('Frontend') }}"></script>
@stop -->


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
										Survey updated successfully.
									</div>
								@endif
								@if (count($entry->results))
									<div class="alert alert-danger">
										<h4>Questions cannot be edited!</h4>

										<p>
											Jūsų anketa turi atsakymų, todėl klausimų koreguoti negalima.
										</p>

										<p>
											<a href="{{ route('campaigns.deactivate', $entry->id) }}" class="btn btn-danger">Ištrinti rezultatus ir deaktyvuoti anketą</a>
										</p>
									</div>
								@elseif ($entry->active)
									<div class="alert alert-danger">
										<h4>Klausimų redaguoti negalima!</h4>

										<p>
											Jūsų anketa yra pažymėta kaip <strong>aktyvi</strong>, todėl klausimų koreguoti negalima.
										</p>

										<p>
											<a href="{{ route('campaigns.deactivate', $entry->id) }}" class="btn btn-danger">Deaktyvuoti anketą</a>
										</p>
									</div>
								@endif
                               
                                <div class="tab-content">
                                    <div role="tabpanel" id="feedTab">
                                    	
                                        <div class="wrap-reset"> 
                                            <div  class="dropdown">
                                            	<span style="width:40%; height:50px!important; font-size:20px; color: #fff!important;margin-left:270px !important; margin-bottom:0px !important;border-color:#e6af2a!important; background-color: #e6af2a!important; min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); padding: 10px 29px; z-index: 1;">Add Question</span>
                                                 <select  class="tabs-menu form-control dropdown-content" onchange="location = this.value;">
                                                       
                                                        <option value="{{ route('campaigns.questions.add', [$entry->id, 'radio']) }}" class="active"><a href="{{ route('campaigns.questions.add', [$entry->id, 'radio']) }}">Single Choice</a></option>
                                                        <option value="{{ route('campaigns.questions.add', [$entry->id, 'select']) }}"><a href="{{ route('campaigns.questions.add', [$entry->id, 'select']) }}">Dropdown</a></option>
                                                        <option value="{{ route('campaigns.questions.add', [$entry->id, 'check']) }}"><a href="{{ route('campaigns.questions.add', [$entry->id, 'check']) }}">Multiple Choice</a></option>
                                                        <option value="{{ route('campaigns.questions.add', [$entry->id, 'string']) }}"><a href="{{ route('campaigns.questions.add', [$entry->id, 'string']) }}">Single Textbox</a></option>
                                                        <option value="{{ route('campaigns.questions.add', [$entry->id, 'text']) }}"><a href="{{ route('campaigns.questions.add', [$entry->id, 'text']) }}">Comment box</a></option>
                                                        <option value="{{ route('campaigns.questions.add', [$entry->id, 'matrix']) }}"><a href="{{ route('campaigns.questions.add', [$entry->id, 'matrix']) }}">Matrix</a></option>
                                                    </select><br><br>
                                        	@if (count($entry->questions))
                                        		@php
                                        			$a = 1;
                                        		@endphp
                                        			
                                        		<div class="col-md-12 que" >
												@foreach ($entry->questions as $question)
                                                    <span class="heading">Question-{{$a++}}</span>
                                                    @if($entry->active == 0)
                                                    <div class="manipulation">
                                                        <a title="Edit" href="{{ route('campaigns.questions.edit', [$entry->id, $question->id]) }}" class="btn btn-default btn-ef btn-ef-3 btn-ef-3a mb-10" style="color: #000000 !important; padding: 15px 20px !important;"><i class="glyphicon glyphicon-pencil"></i> <i style="display: none;">Redaguoti</i></a>
                                                        <a title="Delete" href="{{ route('campaigns.questions.destroy', [$entry->id, $question->id]) }}" class="btn btn-default btn-ef btn-ef-3 btn-ef-3a mb-10" style="color: #000000 !important; padding: 15px 20px !important;"><i class="glyphicon glyphicon-trash"></i><i style="display: none;">Ištrinti</i></a>
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
                                                <a class="btn btn-primary"  style="display:none;font-size:20px;margin-left:270px !important; margin-bottom:0px !important;border-color:#e6af2a!important; background-color: #e6af2a!important;"href="{{ route('campaigns.questions.add', [$entry->id, 'radio']) }}">Add Questions</a>

												<!--<div class="alert alert-warning">
													No Questions
												</div>-->
                                            </div>
											@endif
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                                                                 
                    </section>

                    <div class="well text-center" style="margin-top:150px!important;">
                        <h1 style="color: black;">Advertisement</h1>
                    </div>
                 </div>

              
                <div class="col-md-4">

                    <div class="well col-sm-12" style="overflow-y: auto; height: 660px;min-width: 120px!important;">
                    	<h4 style="color: grey; text-align: center;">Answer these surveys - get responses to your questions</h4>
                    	

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
    </div>    
</section>
@stop