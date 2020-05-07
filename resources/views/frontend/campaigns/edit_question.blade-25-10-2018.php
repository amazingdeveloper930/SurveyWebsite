@extends('frontend.layouts.defaultport')

@section('title')Redaguoti klausimą „{{ $entry->title }}“ anketai - @stop


<script type="text/javascript" src="{{ asset('Frontend') }}"></script>


@section('content')
<section id="content">
    <div class="page page-profile">
        <div class="pageheader">
            <h2>Edit question to
				<small>"{{ $entry->title }}" survey</small></h2>
        </div>                   
        <div class="pagecontent">                    
            <div class="row">                         
                <div class="col-md-9">                               
                    <section class="tile tile-simple">
                        <div class="tile-body p-0">
                            <div role="tabpanel">
                                <div class="tab-content">                     
                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">
                                        <div class="wrap-reset">
                                        	{{ Form::open( ['route' => ['campaigns.questions.update', $entry->id, $question->id], 'class' => 'form-horizontal', 'files' => true] ) }}
                                            <div class="row">
                                                <div class="form-group col-sm-6" style="margin-left: 10px;">
                                                     <label style="padding: 0px 20px;" class="form-group" for="general-information">Questions</label>
                                                    <div class="form-group {{ $errors->first('title', 'has-error') }}" style="margin-bottom: 15px;">
                                                        <div class="col-sm-9">
                                                            {{ Form::text('title', $question->title, [ 'class' => 'form-control', 'placeholder' => 'Klausimo pavadinimas']) }}

															{!! $errors->first('title', '<label class="control-label">:message</label>') !!}
                                                        </div>
                                                    </div>

                                                    @if ($type == 'radio' || $type == 'select' || $type == 'check')
													 <label style="padding: 0px 20px;" class="form-group" for="general-information">Answers</label>
													<div class="variantai">
														@foreach ($question->options as $option)
														<div class="form-group option">
															<div class="col-sm-9">
																<input type="text" name="option[]" class="form-control" placeholder="" value="{{ $option->title }}">
															</div>

															<div class="col-sm-3 btn-spot">
																@if ($question->options->first() == $option)
																	<button type="button" class="btn btn-default add-more"><span class="glyphicon glyphicon-plus"></span> Add more</button>
																@else
																	<button type="button" class="btn btn-default remove-it"><span class="glyphicon glyphicon-minus"></span> Remove</button>
																@endif
															</div>
														</div>
														@endforeach
													</div>
													@elseif ($type == 'matrix')
													<div class="variantai">
														<label class="form-group" style="padding: 0px 20px;"  for="general-information">Answer variants</label>
														<p>Atsakymai (y)</p>

														@foreach ($question->options()->where('matrix', '=', 'y')->get() as $key => $option)
														<div class="form-group option">
															<div class="col-sm-9">
																<input type="text" name="option_y[]" class="form-control" placeholder="Reikšmė (y)" value="{{ $option->title }}">
															</div>

															<div class="col-sm-3 btn-spot">
																@if ($key == 0)
																	<button type="button" class="btn btn-default add-more"><span class="glyphicon glyphicon-plus"></span> Add more</button>
																@else
																	<button type="button" class="btn btn-default remove-it"><span class="glyphicon glyphicon-minus"></span> Remove</button>
																@endif
															</div>
														</div>
														@endforeach
													</div>

														<div class="variantai">
															<p>Reitingavimas (x)</p>

															@foreach ($question->options()->where('matrix', '=', 'x')->get() as $key => $option)
															<div class="form-group option">
																<div class="col-sm-9">
																	<input type="text" name="option_x[]" class="form-control" placeholder="Reikšmė (y)" value="{{ $option->title }}">
																</div>

																<div class="col-sm-3 btn-spot">
																	@if ($key == 0)
																		<button type="button" class="btn btn-default add-more"><span class="glyphicon glyphicon-plus"></span> Add more</button>
																	@else
																		<button type="button" class="btn btn-default remove-it"><span class="glyphicon glyphicon-minus"></span> Remove</button>
																	@endif
																</div>
															</div>
															@endforeach	
														</div>			
													@endif    
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-5" style="margin-left: 20px;">
														@if($type != 'matrix')
														@endif
														
													<div style="width:150%;">
														<div style="" class="form-group {{ $errors->first('required', 'has-error') }}">
															{{ Form::label('required', 'Compulsory Question', [ 'class' => 'col-sm-5 control-label']) }}

															<div class="col-sm-7">
																<div class="checkbox">
																	<label>
																		{{ Form::checkbox('required', '1', $question->required) }} &nbsp;&nbsp;
																	</label>
																</div>

																{!! $errors->first('required', '<label class="control-label">:message</label>') !!}
															</div>
														</div>
														
													@if($type != 'matrix')
														
														
														@endif

														@if ($type == 'radio' || $type == 'select' || $type == 'check')
															<div style="" class="form-group {{ $errors->first('custom_answer', 'has-error') }}">
																{{ Form::label('custom_answer', 'Allow to input answer', [ 'class' => 'col-sm-5 control-label']) }}

																<div class="col-sm-7">
																	<div class="checkbox">
																		<label>
																			{{ Form::checkbox('custom_answer', '1', $question->custom_answer) }} &nbsp;
																		</label>
																	</div>

																	{!! $errors->first('custom_answer', '<label class="control-label">:message</label>') !!}
																</div>
															</div>
														@endif
														</div>
														@if($type != 'matrix')
                                                      
														@endif
														

                                                        
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="pull-right hidden-sm hidden-xs">
                                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Update Question</font></font></button>
                                                <a href="{{ route('campaigns.questions', $entry->id) }}" class="btn btn-default add-question-cancel">Cancel</a>
                                            </div>
                                            {{ Form::close() }}
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
                <div class="col-md-3">
                    <div class="well col-sm-12" style="height: 660px;min-width: 120px!important;">
                    </div>
                </div>
            </div>
        </div>        
    </div>    
</section>
@stop